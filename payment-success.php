<?php
require('vendor/autoload.php');
use Razorpay\Api\Api;

$keyId = "rzp_live_3HZRoX18scJRhh";
$keySecret = "rzp_live_g8o1Zn6Kuj64Oi";

$api = new Api($keyId, $keySecret);

$attributes = [
    'razorpay_order_id' => $_POST['razorpay_order_id'],
    'razorpay_payment_id' => $_POST['razorpay_payment_id'],
    'razorpay_signature' => $_POST['razorpay_signature']
];

try {
    $api->utility->verifyPaymentSignature($attributes);
    echo "Payment verified successfully!";
} catch (Exception $e) {
    echo "Signature verification failed: " . $e->getMessage();
}
?>
