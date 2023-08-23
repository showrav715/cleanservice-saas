<?php

namespace App\Http\Controllers\SellerPayment;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

class AuthorizeController extends Controller
{
    public function store(Request $request)
    {
        $data = PaymentGateway::whereKeyword('authorize')->first();
        $support_currencies = $data->currency_id ?? [];
        if (landingCheckCurrency($support_currencies) == false) {
            return back()->with('error', __('This gateway does not support your currency.'));
        }

        $paydata = $data->convertAutoData();
        $validator = Validator::make($request->all(),[
            'card' => 'required',
            'cvc' => 'required',
            'month' => 'required',
            'year' => 'required',
        ]);

            if (!$validator->passes()) {
                return redirect()->route('seller.front.checkout.index')->with('error', 'Payment Unsuccessful');
            }

            $package = Package::findOrFail($request->package_id);

            $item_number = Str::random(4).time();
            $paydata = $data->convertAutoData();
            $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
            $merchantAuthentication->setName($paydata['login_id']);
            $merchantAuthentication->setTransactionKey($paydata['txn_key']);

            // Set the transaction's refId
            $refId = 'ref' . time();

            // Create the payment data for a credit card
            $creditCard = new AnetAPI\CreditCardType();
            $creditCard->setCardNumber($request->card);
            $year = $request->year;
            $month = $request->month;
            $creditCard->setExpirationDate($year.'-'.$month);
            $creditCard->setCardCode($request->cvc);

            // Add the payment data to a paymentType object
            $paymentOne = new AnetAPI\PaymentType();
            $paymentOne->setCreditCard($creditCard);
        
            // Create order information
            $order = new AnetAPI\OrderType();
            $order->setInvoiceNumber($item_number);
            $order->setDescription($package->name);

            // Create a TransactionRequestType object and add the previous objects to it
            $transactionRequestType = new AnetAPI\TransactionRequestType();
            $transactionRequestType->setTransactionType("authCaptureTransaction"); 
            $transactionRequestType->setAmount(landingShowAmount($package->price,true));
            $transactionRequestType->setOrder($order);
            $transactionRequestType->setPayment($paymentOne);
            // Assemble the complete transaction request
            $requestt = new AnetAPI\CreateTransactionRequest();
            $requestt->setMerchantAuthentication($merchantAuthentication);
            $requestt->setRefId($refId);
            $requestt->setTransactionRequest($transactionRequestType);
        
            // Create the controller and get the response
            $controller = new AnetController\CreateTransactionController($requestt);
            if($paydata['sandbox_check'] == 1){
                $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
            }
            else {
                $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);                
            }
        
            if ($response != null) {
                // Check to see if the API request was successfully received and acted upon
                if ($response->getMessages()->getResultCode() == "Ok") {
                    $tresponse = $response->getTransactionResponse();
                    if ($tresponse != null && $tresponse->getMessages() != null) {
                         $subscription = subscriptionStore($request->all(), $package->id, $tresponse->getTransId(),[ 'payment_method' => 'Authorize.net','payment_status' => 1]);
                         if($subscription){
                             return redirect()->route('seller.dashboard')->with('success', __('Payment Successfully.'));
                         }else{
                              return back()->with('error', __('Something is wrong.'));
                         }
                       

                    } else {
                        return back()->with('error', __('Payment Failed.'));
                    }
                    // Or, print errors if the API request wasn't successful
                } else {
                    return back()->with('error', __('Payment Failed.'));
                }      
            } else {
                return back()->with('error', __('Payment Failed.'));
            }


    }
}
