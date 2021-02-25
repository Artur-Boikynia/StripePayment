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
</head>
<body>
    <div id="main">
        <div id="container">
            <div id="panel">
                <h1>Buy</h1>
            </div>
        </div>
        <button type="button" id="checkout-button">Send</button>
    </div>


    <script type="text/javascript">
        // Create an instance of the Stripe object with your publishable API key
        var stripe = Stripe('pk_test_51IK8ySC7TRGrENFZF3LpAQ4ejldZRnqT5ca22wT9TMeKWc4jVTHlssyIml8Vc33H9taoCDRRRD0HyN8IMqX6Au0t00PgDUAXQp');
        var checkoutButton = document.getElementById('checkout-button');

        checkoutButton.addEventListener('click', function() {

            fetch('/create-checkout-session', {
                method: 'POST',
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
