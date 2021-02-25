<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://stripe-samples.github.io/developer-office-hours/demo.css" rel="stylesheet" type="text/css">
    <script src="https://js.stripe.com/v3"></script>
    <style>
        div.field{
            padding: 8px 15px;
        }
        #checkout-button {
            max-width: 200px;
            margin: 0 auto;
            padding: 10px 10px;
        }
    </style>
</head>
<body>
<div id="main">
    <div id="container">
        <div id="panel">
            <h1>Buy</h1>
            <div class="field">
                <label for="amount">Amount</label>
                <input type="number" id="amount" step="0.01" value="5.00">
            </div>
            <div class="field">
                <label for="currency">Currency</label>
                <select class="field" id="currency">
                    <option value="usd">USD</option>
                    <option value="eur">EUR</option>
                    <option value="pln">PLN</option>
                </select>
            </div>
            <div class="field">
                <label for="cause">Cause</label>
                <select class="field" id="cause">
                    <option value="Cause1">Cause 1</option>
                    <option value="Cause2">Cause 2</option>
                    <option value="Cause3">Cause 3</option>
                </select>
            </div>
        </div>
    </div>
    <button class="container" type="button" id="checkout-button">Pay</button>
</div>
<script type="text/javascript">
    // Create an instance of the Stripe object with your publishable API key
    var stripe = Stripe('pk_test_51IK8ySC7TRGrENFZF3LpAQ4ejldZRnqT5ca22wT9TMeKWc4jVTHlssyIml8Vc33H9taoCDRRRD0HyN8IMqX6Au0t00PgDUAXQp');
    var checkoutButton = document.getElementById('checkout-button');
    var amount = document.getElementById('amount');
    var currency = document.getElementById('currency');
    var cause = document.getElementById('cause');
    checkoutButton.addEventListener('click', function() {
        fetch('/create-checkout-session', {
            method: 'POST',
            headers:{
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                amount: parseInt(amount.value * 100, 10),
                currency: currency.value,
                cause: cause.value,
            }),
        })
            .then(function(response) {
                return response.json();
            })
            .then(function(session) {
                return stripe.redirectToCheckout({ sessionId: session.id });
            })
            .then(function(result) {
                // If `redirectToCheckout` fails due to a browser or network
                // error, you should display the localized error message to your
                // customer using `error.message`.
                if (result.error) {
                    alert(result.error.message);
                }
            })
            .catch(function(error) {
                console.error('Error:', error);
            });
    });
</script>
</body>
</html>
