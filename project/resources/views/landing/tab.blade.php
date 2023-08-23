<html>

<head>
    <title>{{ $gs->title }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <link rel="shortcut icon" href="{{ getPhoto($gs->favicon) }}" />
    <link href="https://goSellJSLib.b-cdn.net/v2.0.0/css/gosell.css" rel="stylesheet" />
</head>

<body>

    <div id="root"></div>
    <button style="display:none" id="openLightBox" onclick="goSell.openLightBox()">Payment Now</button>
    <script src="{{ asset('assets/landing') }}/js/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://goSellJSLib.b-cdn.net/v2.0.0/js/gosell.js"></script>
    <script>
        $(document).ready(function() {
            $('#openLightBox').click();
        });

        goSell.config({
            containerID: "root",
            gateway: {
                publicKey: "{{ $paydata['public_key'] }}",
                language: "en",
                contactInfo: true,
                supportedCurrencies: "all",
                supportedPaymentMethods: "all",
                saveCardOption: false,
                customerCards: true,
                notifications: 'standard',
                callback: (response) => {
                    console.log('response', response);
                },
                onClose: () => {
                    console.log("onClose Event");
                    window.location.href = "{{ $previous }}"
                },
                backgroundImg: {
                    url: "https://goSellJSLib.b-cdn.net/v2.0.0/imgs/tap-bg.png",
                    opacity: '0.5'
                },
                labels: {
                    cardNumber: "Card Number",
                    expirationDate: "MM/YY",
                    cvv: "CVV",
                    cardHolder: "Name on Card",
                    actionButton: "Pay"
                },
                style: {
                    base: {
                        color: '#535353',
                        lineHeight: '18px',
                        fontFamily: 'sans-serif',
                        fontSmoothing: 'antialiased',
                        fontSize: '16px',
                        '::placeholder': {
                            color: 'rgba(0, 0, 0, 0.26)',
                            fontSize: '15px'
                        }
                    },
                    invalid: {
                        color: 'red',
                        iconColor: '#fa755a '
                    }
                }
            },
            customer: {
                id: null,
                first_name: "{{ $information['name'] }}",
                middle_name: "",
                last_name: "",
                email: "{{ $information['email'] }}",
                phone: null
            },
            order: {
                amount: "{{ $price }}",
                currency: "{{ $currency }}",
                items: null,
                shipping: null,
                taxes: null
            },
            transaction: {
                mode: 'charge',
                charge: {
                    saveCard: false,
                    threeDSecure: true,
                    description: "Tap Payment",
                    statement_descriptor: "Tap Payment",
                    reference: {
                        transaction: null,
                        order: null
                    },
                    metadata: {},
                    receipt: {
                        email: false,
                        sms: true
                    },
                    redirect: "{{ $redirect_url }}",
                    post: null,
                }
            }
        });
    </script>
</body>

</html>
