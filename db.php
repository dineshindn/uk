<?php
session_start();
error_reporting(E_ALL);
@ini_set('display_errors', 1);
$conn = new mysqli('localhost', 'root', '', 'uk');
date_default_timezone_set("Asia/Kolkata");
$datetime = date("Y-m-d-h:i:s");
$ymd = date("Y-m-d");
$date = date("d/m/Y");
$time = date("H:i:s");
$newDate = date('d/m/Y h:i:s A');
// Create connection

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // echo "connection Successful";
}

function encrypt_decrypt($action, $string) {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'No One Can Hack Me'; //This is my secret key
    $secret_iv = 'If You Have Dare Touch Me'; //This is my secret key
    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}

mysqli_query($conn, "set character_set_server='utf8'");
mysqli_query($conn, "set character_set_client='utf8'");
mysqli_query($conn, "set character_set_results='utf8'");
mysqli_query($conn, "set collation_connection='utf8mb4_general_ci'");
$conn->set_charset('utf8mb4');

?>
