<?php
include '../db.php';
error_reporting(0);
if (!isset($_SESSION['userid'])) {
   header("Location: index");
} 
 
if(isset($_GET['ids'])){
    $ids = $_GET['ids'];
    $result = mysqli_query($conn, "SELECT * FROM payment WHERE id='$ids'"); 
    $Get_all_details = array();
    $edit_array = mysqli_fetch_assoc($result);
    $Get_all_details = $edit_array;
}
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
    <title>UK - Order Details</title>
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    <link href="./vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="./vendor/bootstrap-datepicker-master/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./vendor/select2/css/select2.min.css">
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
                <div class="d-flex align-items-center mb-4">
                    <h4 class="fs-20 font-w600 mb-0 me-auto">Order Details</h4>

                </div>

                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="n-single-detail">

                                <h4><b><?php echo $Get_all_details['name']; ?> </b> <span style="float: right;"> Payment
                                        Status :
                                        <?php if($Get_all_details['orderStatus'] =="success"){ echo '<span class="badge light badge-primary">Paid</span>'; } else { echo '<span class="badge light badge-danger">Failed</span>';} ?>
                                    </span></h4>

                                <h1 style="font-size: 18px;color: #37a588;"><?php echo $company_name1; ?></h1>

                                <ul style="display: inline-flex;">
                                    <li><i class="fa fa-cube"></i> <?php echo $Get_all_details['amount']." INR" ; ?> |
                                    </li>
                                    <li style="margin-left:15px;"><i class="fa fa-map-marker"></i><a>
                                            <?php echo $Get_all_details['country'] . ' - ' . $Get_all_details['state']. ' - ' . $Get_all_details['district']. ' - ' . $Get_all_details['city']. ' - ' . $Get_all_details['lanmark']. ' - ' . $Get_all_details['pincode']; ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Product Name</th>
                                            <th>Unit</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $sql = "SELECT * FROM orders a JOIN products b ON a.pid=b.id where a.payId='$ids';";

                                            $result = mysqli_query($conn, $sql);
                                            $i = 1;
                                            while ($rows = mysqli_fetch_array($result)) {
                                                $id = $rows['id'];

                                            ?>
                                        <tr id="row_<?php echo $rows['id']; ?>">
                                            <td> <?php echo $i; ?></td>
                                            <td>
                                                <div style="width: 40vh; "><?php echo $rows['name']; ?> </div>
                                            </td>
                                            <td><?php echo $rows['quantity']. " ". $rows['unit']; ?></td>
                                            <td> <?php echo $rows['pqty']; ?> </td>
                                            <td> <?php echo $rows['totalAmount']. " INR"; ?> </td>
                                        </tr>

                                        <?php $i++;  } ?>

                                        <tr>
                                            <th></th>
                                            <td></td>
                                            <td></td>
                                            <td><b>Total Amount</b></td>
                                            <td class="color-primary">
                                                <b><?php echo $Get_all_details['amount']. " ". "INR"; ?></b></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
                </div>






            </div>



        </div>

        <!-- Required vendors -->
        <script src="./vendor/global/global.min.js"></script>
        <script src="./vendor/chart.js/Chart.bundle.min.js"></script>
        <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
        <script src="./vendor/apexchart/apexchart.js"></script>
        <script src="./vendor/datatables/js/jquery.dataTables.min.js"></script>
        <script src="./js/plugins-init/datatables.init.js"></script>
        <script src="./vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js"></script>
        <script src="./js/custom.min.js"></script>
        <script src="./js/dlabnav-init.js"></script>
        <script src="./vendor/select2/js/select2.full.min.js"></script>
        <script src="./js/plugins-init/select2-init.js"></script>
        <script src="./vendor/ckeditor/ckeditor.js"></script>
        <script>
        $(".form_datetime").datepicker({
            format: 'yyyy-mm-dd'
        });
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
        </script>

</body>

</html>