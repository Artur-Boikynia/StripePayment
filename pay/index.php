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
    </style>
</head>
<body>
<div id="main">
    <div id="container">
        <div id="panel">
            <h1>Donation</h1>
        </div>
    </div>
    <div class="field">
        <label for="cause">Cause</label>
        <select class="field" id="cause">
            <option value="1">Cause 1</option>
            <option value="2">Cause 2</option>
            <option value="3">Cause 3</option>
        </select>
    </div>
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
    <button type="submit" id="btn">Send</button>
</div>

<script>
    (function() {

        var stripe = Stripe('pk_test_51IK8ySC7TRGrENFZF3LpAQ4ejldZRnqT5ca22wT9TMeKWc4jVTHlssyIml8Vc33H9taoCDRRRD0HyN8IMqX6Au0t00PgDUAXQp');
        var cause = document.getElementById('cause');
        var amount = document.getElementById('amount');
        var currency = document.getElementById('currency');
        var btn = document.getElementById('btn');

        btn.addEventListener('click', async (e) =>{
            e.preventDefault();
            fetch('/checkout_session', {
                method: 'POST',
                headers:{
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    cause: cause.value,
                    currency: currency.value,
                    amount: parseInt(amount.value * 100, 10),
                }),
            })
                .then((response) => response.json())
                .then((session) => {
                    stripe.redirectToCheckout({ sessionId: session.id });
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        });

    })();
</script>
</body>
</html>

