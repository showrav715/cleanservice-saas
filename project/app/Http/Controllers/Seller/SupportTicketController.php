<?php

namespace App\Http\Controllers\Seller;


use App\Http\Controllers\Controller;
use App\Http\Helpers\MediaHelper;
use Illuminate\Http\Request;
use App\Models\SupportTicket;
use App\Models\TicketMessage;
use Illuminate\Support\Facades\Auth;

class SupportTicketController extends Controller
{
    public function index()
    {
        if(getPackage('support') == 0){
            return back()->with('error','Support package is not available');
        }
        
        $type = 'seller';
        $user = Auth::user();
        $tickets = SupportTicket::where('user_id',Auth::id())->where('user_type',$type)->latest()->paginate(15);
        $messages = TicketMessage::when(request('messages'),function($q){
            return $q->where('ticket_num',request('messages'));
        })->where('user_id',Auth::id())->where('user_type',$type)->get();

        return view('seller.ticket.index',compact('tickets','messages','user'));
    }

    public function openTicket(Request $request)
    {
        if(getPackage('support') == 0){
            return back()->with('error','Support package is not available');
        }
        $request->validate(['subject'=>'required']);
        
        $user = Auth::user();

        $tkt = 'TKT'.randNum(8);
        SupportTicket::create([
            'user_id' => $user->id,
            'user_type' => 'seller',
            'ticket_num' => $tkt,
            'subject'  => $request->subject,
        ]);

        return redirect(url('seller/support/tickets?messages='.$tkt))->with('success','New ticket has been opened');
    }

    public function replyTicket(Request $request,$ticket_num)
    {
        if(getPackage('support') == 0){
            return back()->with('error','Support package is not available');
        }
        $request->validate(['message'=>'required','file'=>'mimes:pdf,jpeg,jpg,png,PNG,JPG']);
        $type = 'seller';
        $user = Auth::user();

        $ticket = SupportTicket::where('ticket_num',$ticket_num)->where('user_id',$user->id)
        ->where('user_type',$type)->firstOrFail();
       
        $message = new TicketMessage();
        $message->ticket_id = $ticket->id;
        $message->ticket_num = $ticket->ticket_num;
        $message->user_id = $user->id;
        $message->user_type = $type;
        $message->message = $request->message;
        if($request->file){
            $message->file = MediaHelper::sellerHandleMakeFile($request->file);
        }
        $message->save();

        $ticket->status = 0;
        $ticket->save();
        return back()->with('success','Replied successfully');
    }
}


