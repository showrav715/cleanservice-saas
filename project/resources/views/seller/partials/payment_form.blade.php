@if (in_array($gateway->keyword, ['stripe', 'authorize']))
    <div class="row offset-md-1 offset-lg-1 offset-sm-0">
        <div class="col-md-4">
            <div class="form-group">
                <label>@lang('Card Number')</label>
                <input class="form-control" type="text" name="card" placeholder="Enter Card Number">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>@lang('Month')</label>
                <input class="form-control" type="text" name="month" placeholder="Month">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>@lang('Year')</label>
                <input class="form-control" type="text" name="year" placeholder="Year">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <label>@lang('CVC')</label>
                <input class="form-control" type="text" name="cvc" placeholder="Enter CVC">
            </div>
        </div>
    </div>
@endif

@if ($gateway->keyword == 'mercadopago')
    <div id="cardNumber"></div>
    <div id="expirationDate"></div>
    <div id="securityCode"> </div>


    <div class="form-group ">
        <input class="form-control" type="text" id="cardholderName" data-checkout="cardholderName"
            placeholder="{{ __('Card Holder Name') }}" required />
    </div>
    <div class="form-group ">
        <input class="form-control" type="text" id="docNumber" data-checkout="docNumber"
            placeholder="{{ __('Document Number') }}" required />
    </div>
    <div class="form-group">
        <select id="docType" class="form-control" name="docType" data-checkout="docType" type="text"></select>
    </div>


    <script>
        const mp = new MercadoPago("{{ $paydata['public_key'] }}");
        const cardNumberElement = mp.fields.create('cardNumber', {
            placeholder: "Card Number"
        }).mount('cardNumber');

        const expirationDateElement = mp.fields.create('expirationDate', {
            placeholder: "MM/YY",
        }).mount('expirationDate');

        const securityCodeElement = mp.fields.create('securityCode', {
            placeholder: "Security Code"
        }).mount('securityCode');


        (async function getIdentificationTypes() {
            try {
                const identificationTypes = await mp.getIdentificationTypes();

                const identificationTypeElement = document.getElementById('docType');

                createSelectOptions(identificationTypeElement, identificationTypes);

            } catch (e) {
                return console.error('Error getting identificationTypes: ', e);
            }
        })();

        function createSelectOptions(elem, options, labelsAndKeys = {
            label: "name",
            value: "id"
        }) {

            const {
                label,
                value
            } = labelsAndKeys;

            //heem.options.length = 0;

            const tempOptions = document.createDocumentFragment();

            options.forEach(option => {
                const optValue = option[value];
                const optLabel = option[label];

                const opt = document.createElement('option');
                opt.value = optValue;
                opt.textContent = optLabel;


                tempOptions.appendChild(opt);
            });

            elem.appendChild(tempOptions);
        }
        cardNumberElement.on('binChange', getPaymentMethods);
        async function getPaymentMethods(data) {
            const {
                bin
            } = data
            const {
                results
            } = await mp.getPaymentMethods({
                bin
            });
            console.log(results);
            return results[0];
        }

        async function getIssuers(paymentMethodId, bin) {
            const issuears = await mp.getIssuers({
                paymentMethodId,
                bin
            });
            console.log(issuers)
            return issuers;
        };

        async function getInstallments(paymentMethodId, bin) {
            const installments = await mp.getInstallments({
                amount: document.getElementById('transactionAmount').value,
                bin,
                paymentTypeId: 'credit_card'
            });

        };

        async function createCardToken() {
            const token = await mp.fields.createCardToken({
                cardholderName,
                identificationType,
                identificationNumber,
            });

        }
        let doSubmit = false;
        $(document).on('submit', '#mercadopago', function(e) {
            getCardToken();
            e.preventDefault();
        });
        async function getCardToken() {
            if (!doSubmit) {
                let $form = document.getElementById('mercadopago');
                const token = await mp.fields.createCardToken({
                    cardholderName: document.getElementById('cardholderName').value,
                    identificationType: document.getElementById('docType').value,
                    identificationNumber: document.getElementById('docNumber').value,
                })
                setCardTokenAndPay(token.id)
            }
        };

        function setCardTokenAndPay(token) {
            let form = document.getElementById('mercadopago');
            let card = document.createElement('input');
            card.setAttribute('name', 'token');
            card.setAttribute('type', 'hidden');
            card.setAttribute('value', token);
            form.appendChild(card);
            doSubmit = true;
            form.submit();
        };
    </script>
@endif
