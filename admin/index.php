<?php
 session_start();
if (isset($_SESSION['userid'])) {
    header("Location: dashboard");
    exit;
}  
header("Location: login");
exit;
?>

