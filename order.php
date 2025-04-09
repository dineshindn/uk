<?php
require('vendor/autoload.php');
use Razorpay\Api\Api;

//$keyId = "rzp_live_3HZRoX18scJRhh";
//$keySecret = "rzp_live_g8o1Zn6Kuj64Oi";

$keyId = "rzp_live_g8o1Zn6Kuj64Oi";
$keySecret = "rzp_live_3HZRoX18scJRhh";

$api = new Api($keyId, $keySecret);

try {
    $api = new \Razorpay\Api\Api($keyId, $keySecret);
    $api->payment->all(); // Simple test call
    echo "Connected to Razorpay successfully.";
} catch(Exception $e) {
    echo "Connection failed: " . $e->getMessage();
}
exit;
$orderData = [
    'receipt'         => '1234',
    'amount'          => 1000, // 1 INR
    'currency'        => 'INR',
    'payment_capture' => 1
];

$order = $api->order->create($orderData);
$order_id = $order['id'];
?>

<!-- Pass this ID to Razorpay checkout -->
<script src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="<?php echo $keyId; ?>"
        data-amount="<?php echo $orderData['amount']; ?>"
        data-currency="INR"
        data-order_id="<?php echo $order_id; ?>"
        data-buttontext="Pay Now"
        data-name="Your Website"
        data-description="Razorpay Test"
        data-prefill.name="Arun"
        data-prefill.email="test@example.com"
        data-theme.color="#F37254">
</script>
