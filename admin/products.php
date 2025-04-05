<?php
include '../db.php';
error_reporting(0);
if (!isset($_SESSION['userid'])) {
    header("Location: index");
}
$user_id = $_SESSION['userid'];

if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    $sql_edit = "SELECT p.*, m.name as images FROM `products` p LEFT JOIN product_image m ON m.id=p.image_url where p.`id`='$id' order by p.`id` desc";
    $result = mysqli_query($conn, $sql_edit);
    $Get_all_details = array();
    $edit_array = mysqli_fetch_assoc($result);
    $Get_all_details = $edit_array;
}


if (isset($_POST['save_submit'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = (float)$_POST['price'];
    $status = (int)$_POST['status'];
    $quantity = (float)$_POST['quantity'];
    $editId = mysqli_real_escape_string($conn, $_POST['editId']);
    $unit = mysqli_real_escape_string($conn, $_POST['unit']);
    $tag = mysqli_real_escape_string($conn, $_POST['tag']);
    $product_image_id = mysqli_real_escape_string($conn, $_POST['product_image_id']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);


    if ($editId && $editId != '') {
        $sql = "UPDATE `products` SET 
                    `name` = '$name', 
                    `price` = '$price', 
                    `quantity` = '$quantity', 
                    `unit` = '$unit', 
                    `description` = '$description',
                    `status` = '$status',
                    `tag` = '$tag',
                    `image_url` = '$product_image_id'
                WHERE `id` = '$editId'";
        $message = "Product updated successfully!";
    } else {
        $sql = "INSERT INTO products 
                    (name, price, status, quantity, unit, tag, image_url, description, user_id)
                VALUES 
                    ('$name', '$price', '$status', '$quantity', '$unit', '$tag', '$product_image_id' ,'$description', '$user_id')";
        $message = "Product inserted successfully!";
    }

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('$message');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
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
    <title>UK</title>
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    <link href="./vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="./vendor/bootstrap-datepicker-master/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./vendor/select2/css/select2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Style css -->
    <link href="./css/style.css" rel="stylesheet">

    <style type="text/css">
        .select2-container--default .select2-selection--single,
        .select2-selection--multiple {
            border-radius: 10px !important;
            border: 0.0625rem solid #c8c8c8;
            height: 2.5rem;
            background: #fff;
        }

        .form-control {
            height: 2.5rem;
        }

        .form-control {
            background: #fff;
            border: 0.0625rem solid #cec6c6 !important;
        }

        .select2-container--default .select2-selection--single,
        .select2-selection--multiple {
            height: auto !important;
        }

        .col-sm-4,
        .col-sm-6 {
            margin-top: 15px;
        }

        li {
            list-style: disc !important;
        }

        .form-control {
            background: #fff;
            border: 0.0625rem solid #aaaaaa;
            padding: 0.3125rem 1.25rem;
            color: #6e6e6e;
            height: 38px;
            border-radius: 5px;
        }


        @media only screen and (max-width: 600px) {

            .col-sm-4,
            .col-sm-6 {
                margin-top: 0px;
            }
        }
    </style>

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
                    <h4 class="fs-20 font-w600 mb-0 me-auto">
                        <?php if ($id) {
                            echo 'Edit Products';
                        } else {
                            echo 'Add Products';
                        } ?></h4>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">

                                <form id="product-form" class="form form-validation form-validate" role="form" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="row normal_form">

                                        <div class="row col-md-12">

                                            <div class="col-xl-6  col-md-6 mb-4">
                                                <label class="form-label font-w600">Product Name<span
                                                        class="text-danger scale5 ms-2">*</span></label>
                                                <input type="text" name="name" id="name" class="form-control"
                                                    value="<?php echo $Get_all_details['name'] ?>" required
                                                    placeholder="Enter Product Name">

                                                <input type="hidden" name='editId' id="editId" value="<?php echo $id; ?>" />
                                            </div>

                                            <div class="col-xl-3  col-md-3 mb-4">
                                                <label class="form-label font-w600">Product Price<span
                                                        class="text-danger scale5 ms-2">*</span></label>
                                                <input type="number" name="price" id="price" class="form-control"
                                                    value="<?php echo $Get_all_details['price'] ?>" required
                                                    placeholder="Enter product price">
                                            </div>


                                            <div class="col-md-3">
                                                <label for="name" class="form-label font-w600">Product Status <span
                                                        class="text-danger scale5 ms-2">*</span></label>
                                                <select id="status" name="status" class="select-2 form-control wide"
                                                    required>
                                                    <option value=''>Select Job Status</option>
                                                    <option value="0"
                                                        <?php echo $id > 0 ? ($Get_all_details['status'] == 0 ? 'selected' : '') : 'selected' ?>>
                                                        Active</option>
                                                    <option value="1"
                                                        <?php echo $id > 0 ? ($Get_all_details['status'] == 1 ? 'selected' : '') : '' ?>>
                                                        In Active</option>
                                                </select>
                                            </div>

                                            <div class="col-xl-3  col-md-3 mb-4">
                                                <label class="form-label font-w600">Product Quantity<span
                                                        class="text-danger scale5 ms-2">*</span></label>
                                                <input type="number" name="quantity" id="quantity" class="form-control"
                                                    value="<?php echo $Get_all_details['quantity'] ?>" required
                                                    placeholder="Enter product quantity">
                                            </div>

                                            <div class="col-xl-3  col-md-3 mb-4">
                                                <label class="form-label font-w600">Product Unit<span
                                                        class="text-danger scale5 ms-2">*</span></label>
                                                <select id="unit" name="unit" class="select-2 form-control wide"
                                                    required>
                                                    <option value=''>Select Unit</option>
                                                    <option value="grams"
                                                        <?php echo ($Get_all_details['unit'] == 'grams') ? 'selected' : ''; ?>>
                                                        grams</option>
                                                    <option value="kilograms"
                                                        <?php echo ($Get_all_details['unit'] == 'kilograms') ? 'selected' : ''; ?>>
                                                        kilograms</option>
                                                    <option value="ml"
                                                        <?php echo ($Get_all_details['unit'] == 'ml') ? 'selected' : ''; ?>>
                                                        ml</option>
                                                    <option value="litters"
                                                        <?php echo ($Get_all_details['unit'] == 'litters') ? 'selected' : ''; ?>>
                                                        litters</option>
                                                    <option value="piece"
                                                        <?php echo ($Get_all_details['unit'] == 'piece') ? 'selected' : ''; ?>>
                                                        piece</option>
                                                </select>
                                            </div>

                                            <div class="col-xl-3  col-md-3 mb-4">
                                                <label class="form-label font-w600">Product Tag<span
                                                        class="text-danger scale5 ms-2">*</span></label>
                                                <select id="tag" name="tag" class="select-2 form-control wide" required>
                                                    <option value=''>Select Tag</option>
                                                    <option value="New"
                                                        <?php echo ($Get_all_details['tag'] == 'New') ? 'selected' : ''; ?>>
                                                        New</option>
                                                    <option value="Offer"
                                                        <?php echo ($Get_all_details['tag'] == 'Offer') ? 'selected' : ''; ?>>
                                                        Offer</option>
                                                </select>
                                            </div>


                                            <div class="col-xl-3  col-md-3 mb-4">
                                                <label class="form-label font-w600">Product Image<span
                                                        class="text-danger scale5 ms-2">*</span></label>

                                                <input type="file" name="product_image" id="product_image" class="form-control" accept="image/*" />
                                                <input type="hidden" name="product_image_id" id="product_image_id" value="<?php echo $Get_all_details['image_url'] ?>" />

                                                <?php if (!empty($Get_all_details['images'])): ?>
                                                    <img src="<?php echo 'uploads/' . htmlspecialchars($Get_all_details['images']); ?>" alt="Product Image" width="100" height="100" />
                                                <?php endif; ?>

                                            </div>


                                        </div>


                                        <div class="row col-md-12 " style="margin-top: 20px;">
                                            <p style="font-size: 16px;"><b>Description</b> </p>
                                            <hr style="margin-top:0px !important">
                                        </div>

                                        <div class="col-md-12">
                                            <div class="custom-ekeditor">
                                                <textarea class="ckeditor" id="ckeditor" required
                                                    name="description"> <?php echo $Get_all_details['description']; ?></textarea>
                                            </div>
                                        </div>


                                    </div>

                                    <!-- </div> -->

                                    <br>

                                    <div class="form-group text-center">
                                        <button onclick="window.history.go(-1); return false;" name="cancel"
                                            value="cancel" style="padding: 5px 20px !important;"
                                            class="btn btn-primary next "> Cancel</button>
                                        <button type="submit" name="save_submit" value="verify_only"
                                            style="padding: 5px 20px !important;" id="verify_only"
                                            class="btn btn-success next "><?php if ($id) {
                                                                                echo "Update";
                                                                            } else {
                                                                                echo "Submit";
                                                                            } ?>
                                        </button>
                                    </div>


                                </form>
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
    <script src="./vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
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


        $(document).ready(function() {
            $('#product_image').on('change', function() {
                let formData = new FormData();
                let file = $('#product_image')[0].files[0];

                if (!file) return;

                formData.append('product_image', file);

                $.ajax({
                    url: 'php-actions/product-images.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(res) {
                        let response = JSON.parse(res);
                        if (response.success) {
                            $('#product_image_id').val(response.product_id);
                            toastr.success('Image uploaded successfully..');
                        } else {
                            toastr.error('Upload failed: ' + response.error);
                        }
                    },
                    error: function(err) {
                        alert('AJAX Error');
                    }
                });
            });
        });
    </script>

</body>

</html>