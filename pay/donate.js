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