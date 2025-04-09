<?php
include '../db.php';
error_reporting(0);
if (!isset($_SESSION['userid'])) {
    header("Location: index");
}
$user_id = $_SESSION['userid'];

$sql = mysqli_query($conn, "SELECT count(id) as total FROM `products`;");
$row1 = mysqli_fetch_array($sql);

$sql2 = mysqli_query($conn, "SELECT count(id) as totalOrders FROM `payment` ");
$row2 = mysqli_fetch_array($sql2);

$sql3 = mysqli_query($conn, "
  SELECT 
    COUNT(CASE WHEN orderStatus = 'Failed' THEN 1 END) AS failed,
    COUNT(CASE WHEN orderStatus = 'success' THEN 1 END) AS success
  FROM `payment`
");
$row3 = mysqli_fetch_array($sql3);

$sql4 = mysqli_query($conn, "SELECT SUM(amount) AS totalAmount FROM `payment` WHERE orderStatus='success'");
$row4 = mysqli_fetch_array($sql4);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="UK" />
    <meta property="og:title" content="UK" />
    <meta property="og:description" content="UK" />
    <meta name="format-detection" content="telephone=no">
    <title>UK - Dashboard</title>
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    <link href="./vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="./vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
</head>

<body>

    <div id="preloader">
        <div class="lds-ripple">
            <div></div>
            <div></div>
        </div>
    </div>

    <div id="main-wrapper">

        <?php include('includes/headers.php') ?>

        <?php include('includes/sidebar.php') ?>

        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">



                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">

                            <div class="col-xl-3 col-xxl-3 col-lg-3 col-sm-3">
                                <div class="widget-stat card">
                                    <div class="card-body p-4">
                                        <div class="media ai-icon">
                                            <span class="me-3 bgl-primary text-primary">
                                                <svg id="icon-customers" xmlns="http://www.w3.org/2000/svg" width="30"
                                                    height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-user">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                            </span>
                                            <div class="media-body">
                                                <p class="mb-1">Total Product</p>
                                                <h4 class="mb-0"><?= $row1['total']; ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-3 col-xxl-3 col-lg-3 col-sm-3">
                                <div class="widget-stat card">
                                    <div class="card-body p-4">
                                        <div class="media ai-icon">
                                            <span class="me-3 bgl-warning text-warning">
                                                <svg id="icon-database-widget" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-database">
                                                    <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                                                    <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
                                                    <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
                                                </svg>
                                            </span>
                                            <div class="media-body">
                                                <p class="mb-1">Total Orders</p>
                                                <h4 class="mb-0"><?= $row2['totalOrders']; ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-xxl-6 col-sm-6">
                                <div class="card overflow-hidden">
                                    <div class="social-graph-wrapper widget-facebook">
                                        <span class="s-icon">Payment Status</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-4 border-end">
                                            <div class="pt-3 pb-3 ps-0 pe-0 text-center">
                                                <h4 class="m-1"><span
                                                        class="counter"><?= $row3['success']; ?></span>
                                                </h4>
                                                <p class="m-0">Paid</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="pt-3 pb-3 ps-0 pe-0 text-center">
                                                <h4 class="m-1"><span
                                                        class="counter"><?= $row3['failed']; ?></span>
                                                </h4>
                                                <p class="m-0">Failed</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="pt-3 pb-3 ps-0 pe-0 text-center">
                                                <h4 class="m-1"><span
                                                        class="counter"><?= $row4['totalAmount'] . " INR"; ?></span>
                                                </h4>
                                                <p class="m-0">Total Paid Amount</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div>

    <script src="./vendor/global/global.min.js"></script>
    <script src="./vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
    <script src="./vendor/apexchart/apexchart.js"></script>
    <script src="./vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="./vendor/peity/jquery.peity.min.js"></script>
    <script src="./js/dashboard/dashboard-1.js"></script>
    <script src="./vendor/owl-carousel/owl.carousel.js"></script>
    <script src="./js/custom.min.js"></script>
    <script src="./js/dlabnav-init.js"></script>
    <script src="./vendor/raphael/raphael.min.js"></script>
    <script src="./vendor/morris/morris.min.js"></script>

    <script>
        function storeYear() {
            var selectedYear = document.getElementById('passedoutYear').value;
            localStorage.setItem('passedoutYear', selectedYear); // Store the selected year
            document.getElementById('passedoutYearInput').value = selectedYear; // Set the value in the hidden input
            document.getElementById('yearForm').submit();
            // window.location.href = window.location.href; // Reload the page
        }
    </script>
</body>

</html>