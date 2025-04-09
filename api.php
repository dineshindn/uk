<?php
include 'db.php';

$limit = isset($_POST['limit']) ? (int)$_POST['limit'] : 2;
$offset = isset($_POST['offset']) ? (int)$_POST['offset'] : 0;
$action = isset($_POST['action']) ? $_POST['action'] : "";
$productId = isset($_POST['productId']) ? (int)$_POST['productId'] : 0;

require('vendor/autoload.php');

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

// Razorpay Test Keys
$keyId = "rzp_test_3tV4NjIskNC1iz";
$keySecret = "wtaRCaaOAtHH6auBxtQKRzxo";

$api = new Api($keyId, $keySecret);

switch ($action){

    case 'getProducts':
        $query = "SELECT p.id,p.name, round(p.price) as price, p.quantity,p.tag,p.unit,p.description,
if(p.image_url > 0,concat('admin/uploads/',(SELECT pm.name from product_image pm where pm.id=p.image_url)),'') as image
FROM products p LIMIT $limit OFFSET $offset";
        $result = mysqli_query($conn,$query);

        $data = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
      break;
    case 'getSingleProduct':
        $query = 'SELECT 
    p.id,
    p.name, 
    p.price, 
    p.quantity,
    p.tag,
    p.unit,
    CONCAT(
        \'<h1 class="display-5 mb-4 productTitle">\', 
        p.name, 
        \'</h1>\', 
        REPLACE(
            p.description, 
            \'<p>\', 
            \'<p class="mb-4" style="text-align: justify;">\'
        )
    ) AS description,
    IF(
        p.image_url > 0, 
        CONCAT(
            \'admin/uploads/\', 
            (SELECT pm.name FROM product_image pm WHERE pm.id = p.image_url LIMIT 1)
        ), 
        \'\'
    ) AS image 
FROM products p 
WHERE p.id = ' .$productId;

        $result = mysqli_query($conn,$query);

        $data = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        break;
    case 'getPrice':
        $cartItems = json_decode($_POST['cartItems'], true);
        $productIds = [];
        $quantityMap = [];
        foreach ($cartItems as $item) {
            if (is_array($item) && isset($item['productId']) && isset($item['quantity'])) {
                $productIds[] = $item['productId'];
                $quantityMap[$item['productId']] = $item['quantity'];
            }
        }

        $idsString = implode(',', array_map('intval', $productIds));
        $query = "SELECT 
                p.id,
                p.name,
                ROUND(p.price) AS price
              FROM products p
              WHERE p.id IN ($idsString)";
//        echo $query;
        $result = mysqli_query($conn, $query);
        $data = [];
        $total = 0;

        while ($row = mysqli_fetch_assoc($result)) {
            $pid = $row['id'];
            $qty = $quantityMap[$pid] ? $quantityMap[$pid] : 1;
            $total += $row['price'] * $qty;

            $data = $total;
        }
        break;
    case 'placeOrder'://not check
        $name = $_POST['name'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        $state = $_POST['state'];
        $district = $_POST['district'];
        $city = $_POST['city'];
        $landmark = $_POST['landmark'];
        $pincode = $_POST['pincode'];
        $paytype = $_POST['paytype'];
        $cartItems = json_decode($_POST['cartItems'], true);
//        $cdate = date("Y-m-d H:i:s");
        $totalAmount = 0;
        foreach ($cartItems as $item) {
            $pid = (int)$item['productId'];
            $qty = (int)$item['quantity'];

            // Get price of product
            $query = "SELECT ROUND(price) AS price FROM products WHERE id = $pid";
            $res = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($res);
            $priceEach = $row['price'];
            $totalAmount += $priceEach * $qty;
        }

        $amount = $totalAmount;

        // 2. Insert into payment table
        $insertPayment = "INSERT INTO payment (name, mobile, email, country, state, district, city, landmark, pincode, amount, payment_type)
                      VALUES ('$name', '$mobile', '$email', '$country', '$state', '$district', '$city', '$landmark', '$pincode', '$amount', '$paytype')";
        mysqli_query($conn, $insertPayment);
        $paymentId = mysqli_insert_id($conn);

        $orderId="razor_".$paymentId;

        // Convert to paise
        $amountInPaise = $amount * 100;

        // If payment type is online, create Razorpay order
        if ($paytype == 1) {
            $orderData = [
                'receipt'         => $orderId,
                'amount'          => $amountInPaise,
                'currency'        => 'INR',
                'payment_capture' => 1
            ];

            try {
                $order = $api->order->create($orderData);
                $razorpay_order_id = $order['id'];
            } catch (Exception $e) {
                $data = array("status" =>'failed',"message" => "Razorpay Error: " . $e->getMessage());
                break;
            }
        }

        // 3. Insert each cart item into orders table
        foreach ($cartItems as $item) {
            $pid = (int)$item['productId'];
            $qty = (int)$item['quantity'];

            // Get price of product
            $query = "SELECT ROUND(price) AS price FROM products WHERE id = $pid";
            $res = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($res);
            $priceEach = $row['price'];
            $totalAmount = $priceEach * $qty;

            $insertOrder = "INSERT INTO orders (pid, pqty, totalAmount,payId) 
                        VALUES ('$pid', '$qty', '$totalAmount',$paymentId)";
            mysqli_query($conn, $insertOrder);
        }
        $data = array("status" =>'failed');
        if($paymentId > 0){
            $sql="UPDATE `payment` SET `order_id`='$razorpay_order_id' WHERE id=$paymentId";
            mysqli_query($conn, $sql);
            $data = array("status" =>'success',"orderId"=>$razorpay_order_id,"amount"=>$amount,"keyId"=>$keyId);
        }
        break;
    case 'verifyPayment':
        $order_id = $_POST['razorpay_order_id'];
        $payment_id = $_POST['razorpay_payment_id'];
        $signature = $_POST['razorpay_signature'];
        $attributes = [
            'razorpay_order_id' => $order_id,
            'razorpay_payment_id' => $payment_id,
            'razorpay_signature' => $signature
        ];

        try {
            $api->utility->verifyPaymentSignature($attributes);
            echo '<pre>';
            print_r($api);
            $sql="UPDATE `payment` SET `orderStatus`='success',txn_status='success' WHERE order_id='$order_id'";
            mysqli_query($conn, $sql);
            echo json_encode([
                "status" => "success",
                "message" => "Payment verified"
            ]);
            exit;
        } catch (SignatureVerificationError $e) {
            echo json_encode([
                "status" => "failure",
                "message" => "Signature verification failed: " . $e->getMessage()
            ]);exit;
        }
        break;
    default:
        $data = array("status" =>'default');

}
echo json_encode($data);
?>
