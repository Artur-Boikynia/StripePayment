<?php
require_once __DIR__ . '/../vendor/autoload.php';

\Stripe\Stripe::setApiKey('sk_test_51IK8ySC7TRGrENFZDscbCb8YvQvzrABQDmNHvjU14VRaIsRubEgLD1l6xbJN4LaPlShoSd7HUYGWakFRoEj4ZjWa00iCXoPuUo');
$session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => [[
        'price_data' => [
            'currency' => 'usd',
            'product_data' => [
                'name' => 'T-shirt',
            ],
            'unit_amount' => 2000,
        ],
        'quantity' => 1,
    ]],
    'mode' => 'payment',
    'success_url' => 'https://example.com/success',
    'cancel_url' => 'https://example.com/cancel',
]);

?>


<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://stripe-samples.github.io/developer-office-hours/demo.css" rel="stylesheet" type="text/css">
    <script src="https://js.stripe.com/v3"></script>
</head>
<body>
<div id="main">
    <div id="checkout">
        <div id="payment-form">
            <h1>Donation</h1>
        </div>
    </div>
    <button id="checkout-button">Send</button>
</div>
<script>
    var stripe = Stripe('pk_test_51IK8ySC7TRGrENFZF3LpAQ4ejldZRnqT5ca22wT9TMeKWc4jVTHlssyIml8Vc33H9taoCDRRRD0HyN8IMqX6Au0t00PgDUAXQp');
    const btn = document.getElementById("checkout-button");
    btn.addEventListener('click', function (e){
        e.preventDefault();
        stripe.redirectToCheckout({ sessionId: "<?php echo $session->id; ?>" });
    });
</script>
</body>
</html>