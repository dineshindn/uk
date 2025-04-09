<?php

include '../db.php';
error_reporting(0);
if (!isset($_SESSION['userid'])) {
   header("Location: index");
} 

$role = $_SESSION['role'];


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
    <title>UK - Order List</title>
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    <link href="./vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="./vendor/bootstrap-datepicker-master/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./vendor/select2/css/select2.min.css">
    <link href="./css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

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
                    <h4 class="fs-20 font-w600 mb-0 me-auto">Order List</h4>

                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12" style="text-align: center;">

                                    <div class="table-responsive">
                                        <table id="example3" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>S.No</th>
                                                    <!-- <th></th> -->
                                                    <th>Name</th>
                                                    <th>Phone Number</th>
                                                    <th>Email</th>
                                                    <th>Order Amount</th>
                                                    <th>Payment Status</th>
                                                    <th>Payment Mode</th>
                                                    <th>Country</th>
                                                    <th>State</th> 
                                                    <th>District</th>
                                                    <th>City</th>
                                                    <th>Landmark</th>
                                                    <th>Pincode</th>
                                                    <th>Created Date</th>
                                                </tr>
                                            </thead>
                                            <?php 
                                            $sql = "SELECT * FROM `payment` ORDER BY id DESC";

                                            $result = mysqli_query($conn, $sql);
                                            $i = 1;
                                            while ($rows = mysqli_fetch_array($result)) {
                                                $id = $rows['id'];

                                            ?>
                                            <tr id="row_<?php echo $rows['id']; ?>">
                                            <td><?php echo $i; ?></td>
                                                <td> <div style="width: 40vh; "><a href="order-details?ids=<?php echo $rows['id']; ?>"> <?php echo $rows['name']; ?>  </a></div> </td>
                                                <td><?php echo $rows['mobile']; ?></td>
                                                <td> <?php echo $rows['email']; ?> </td>
                                                <td> <?php echo $rows['amount']. " INR"; ?> </td>
                                                <td> <?php if($rows['orderStatus'] =="success"){ echo '<span class="badge light badge-primary">Paid</span>'; } else { echo '<span class="badge light badge-danger">Failed</span>';} ?> </td>
                                                <td> <?php if($rows['payment_type'] == 1 ){ echo "Online";}else { echo "COD"; }  ?> </td>
                                                <td> <?php echo $rows['country']; ?> </td>
                                                <td> <div style="width: 25vh; "><?php echo $rows['state']; ?> </div> </td>
                                                <td> <?php echo $rows['district']; ?> </td>
                                                <td> <?php echo $rows['city']; ?> </td>
                                                <td> <?php echo $rows['landmark']; ?> </td>
                                                <td> <?php echo $rows['pincode']; ?> </td> 
                                                <td> <div style="width: 30vh; "><?php echo $rows['created_date']; ?> </div> </td>
                                            </tr>



                                            <?php $i++;  } ?>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

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