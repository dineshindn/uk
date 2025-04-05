<?php
include '../db.php';
error_reporting(0);
if (!isset($_SESSION['userid'])) {
    header("Location: index");
}

if($_SESSION['role']==3){
    header("Location: campus-dashboard");
}
$user_id = $_SESSION['userid'];
$role = $_SESSION['role'];
$grant_user = $_SESSION['grant_user'];
$enterprise_type = $_SESSION['enterprise_type'];

 
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