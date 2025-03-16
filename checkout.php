<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width. initial-scale=1.0">
        <title>Checkout</title>
        <script src="https://js.stripe.com/v3/"></script>
    </head>
    <body>
        <h2>Complete Your Purchace</h2>
        <form id="payment-form">
            <div id="card-element"></div>
            <button type="submit">Pay Now</button>
        </form>

        <script>
            var stripe = Stripe("pk_test_51R3N3GCWJwL7zXhXoHFaHlqnwAAs04hlEHpRk5GZk2PUGzOgZMV7ZBjrweAKM6YPRMuuzshA8q9xPBXmejRYhk3N008er1c0y4");
            var elements = stripe.elements();
            var card = elements.create("card");
            card.mount("#card-element");

            var form = document.getElementById("payment-form");
            form.addEventListener("submit", function(event) {
                event.preventDefault();
                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        alert(result.error.message);
                    } else {
                        fetch("backend/charge.php", {
                            method: "POST",
                            headers: {"Content-Type": "application/json"},
                            body: JSON.stringify({token: result.token.id})
                        }).then(response => response.json())
                        .then(data => alert(data.message));
                    }
                });
            });
        </script>
    </body>
</html>