<?php
include '../db.php';
error_reporting(0);
if (isset($_SESSION['userid'])) {
    header("Location: dashboard");
}

if (isset($_POST['save'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM `admin_users` WHERE `email`='$email'";
    $result = mysqli_query($conn, $query);

    if (!$result || mysqli_num_rows($result) == 0) {
        echo 'email_not_found';
    } else {
        $row = mysqli_fetch_assoc($result);
        if ($row['is_active'] == 1) {
            echo 'user_inactive';
        } else {
            $hashedPasswordFromDB = $row['password'];
            if (!password_verify($password, $hashedPasswordFromDB)) {
                echo 'password_not_matched';
            } else {
                $userid = $row['id'];
                $name = $row['username'];
                $email = $row['email'];
                $mobile1 = $row['mobile_number'];
                $role = $row['role_name'];

                session_start();
                $_SESSION['userid'] = $userid;
                $_SESSION['user'] = $name;
                $_SESSION['role'] = $role;
                echo 'success';
            }
        }
    }
    exit;
}

?>


<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <meta name="robots" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="UK : UK" />
    <meta property="og:title" content="UK : UK" />
    <meta property="og:description" content="UK : UK" />
    <meta name="format-detection" content="telephone=no">
    <title>UK - Sigin</title>
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    <link href="./css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="index"><img src="images/Logo.png" alt="" style="width: 25% !important;"></a>
                                    </div>
                                    <h4 class="text-center mb-4">Admin Login</h4>


                                    <form method="POST" id="login_form">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input placeholder="Enter Registered Email" class="form-control" type="email" data-parsley-type="email" data-parsley-required="true" data-parsley-error-message="Please enter your valid email." data-parsley-trigger="change" name="email" id="email" autocomplete="off" required />
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input placeholder="Password" class="form-control" type="password" data-parsley-required="true" data-parsley-error-message="Please enter your password." name="password" id="password" autocomplete="off" />
                                        </div>
                                        <!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <p id="agree-terms"> By signing in, I agree to the
                                                <a href="../privacy-policy" target="_blank">UK Privacy Statement</a> and <a target="_blank" href="#">Terms of Service</a>.
                                            </p>
                                        </div> -->

                                        <!-- <p style="float: right;"><a href="forgot-password">Forgot password?</a></p> -->

                                        <div class="text-center">
                                            <button class="btn btn-primary btn-block" type="button" id="login_btn">Login </button>
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


    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/custom.min.js"></script>
    <script src="./js/dlabnav-init.js"></script>


    <script>
        $(document).ready(function() {
            $('#toast_error').hide();
            $('#toast_error1').hide();
            $('#toast_success').hide();
            $('#toast_warning').hide();
            $("#login_form").validate();
        });


        $(document).ready(function() {
            $("#password").keypress(function(event) {
                if (event.which == 13) {
                    $("#login_btn").click();
                }
            });

            $("#login_btn").on("click", function() {
                var email = $("#email").val();
                var password = $("#password").val();

                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                if (email.length === 0 || email === '') {
                    alert('Email is required');
                    return;
                }

                if (!emailRegex.test(email)) {
                    alert('Invalid email format');
                    return;
                }

                if (password.length === 0 || password === '') {
                    alert('Password is required');
                    return;
                }

                $.post("login.php", {
                    email: email,
                    password: password,
                    save: 'yes'
                }, function(data, status) {
                    var data1 = $.trim(data);
                    console.log(data1, "data1..x.x.")
                    if (data1 == 'email_not_found') {
                        alert('Email not found');
                    } else if (data1 == 'user_inactive') {
                        alert('User Inactive');
                    } else if (data1 == 'password_not_matched') {
                        alert('Password incorrect');
                    } else if (data1 == 'success') {
                        window.location.href = 'dashboard';
                    } else {
                        alert('An unexpected error occurred');
                    }
                });

            });
        });
    </script>
</body>

</html>