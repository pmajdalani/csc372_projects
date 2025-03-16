<?php
require '../stripe-php-master/stripe-php-master/init.php';
require '../config/config.php';

\Stripe\Stripe::setApiKey(STRIPE_API_KEY);

$data = json_decode(file_get_contents("php://input"));

if (!isset($data->token)) {
    echo json_encode(["error" => "Payment failed"]);
    exit;
}

try {
    $charge = \Stripe\Charge::create([
        "amount" => 2000, // Amount in cents (20 dollars)
        "currency" => "usd",
        "source" => $data->token,
        "description" => "E-commerce Purchace"
    ]);

    echo json_encode(["message" => "Payment Successful!"]);
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>

