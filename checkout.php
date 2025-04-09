<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Foody - Organic Food Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap"
          rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<!-- Spinner Start -->
<div id="spinner"
     class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" role="status"></div>
</div>
<!-- Spinner End -->


<?php include 'include/navbar.php' ?>


<!-- Page Header Start -->
<div class="container-fluid page-header wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <h1 class="display-3 mb-3 animated slideInDown">CheckOut</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a class="text-body" href="index.php">Home</a></li>
                <li class="breadcrumb-item text-dark active" aria-current="page">CheckOut</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Page Header End -->

<!-- Contact Start -->
<div class="container-xxl py-6">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
             style="max-width: 500px;">
            <h1 class="display-5 mb-3">Order Summary</h1>
        </div>
        <div class="row g-5 justify-content-center">
            <div class="col-lg-7 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                <div class="row g-3">
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="name" placeholder="Your Name">
                            <label for="name">Your Name</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="mobile" placeholder="Your Phone Number">
                            <label for="mobile">Your Phone Number</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="email" class="form-control" id="email" placeholder="Your Email">
                            <label for="email">Your Email</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="country" placeholder="Your Country">
                            <label for="country">Country</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="state" placeholder="Your State">
                            <label for="state">State</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="district" placeholder="Your District">
                            <label for="district">District</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="city" placeholder="Your City">
                            <label for="city">City</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="landmark" placeholder="Your City">
                            <label for="landmark">Landmark</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="pincode" placeholder="Your Pincode">
                            <label for="pincode">Pincode</label>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input type="number" class="form-control" id="price" placeholder="" readonly>
                            <label for="pincode">Total Price</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <input type="radio" class="radio-inline" id="online" name="paytype" placeholder="" value=1
                               checked>
                        <label for="online">Online</label>
                    </div>
                    <div class="col-md-6">
                        <input type="radio" class="radio-inline" id="cod" name="paytype" placeholder="" value=2>
                        <label for="cod">COD</label>
                    </div>
                    <div class="col-12">
                        <button id="placeOrderBtn" class="btn btn-primary rounded-pill py-3 px-5" type="button"
                                onclick="placeOrder()">Place Order
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->

<br>

<?php include 'include/footer.php' ?>

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    let val = localStorage.getItem('cart');
    let cartItems = JSON.parse(val);
    // console.log(cartItems[0].productId);
    // let productIds = cartItems.map(item => item.productId);
    let totalPrice = 0;
    if (cartItems.length > 0) {
        $.ajax({
            url: 'api.php',
            type: 'POST',
            data: {
                action: 'getPrice',
                cartItems: JSON.stringify(cartItems)
            },
            dataType: 'json',
            success: function (response) {
                if (response) {
                    let amount = response;
                    $('#price').val(amount);
                } else {
                    console.error(`Failed to get price for product ID:`);
                }
            },
            error: function (xhr, status, error) {
                console.error(`AJAX Error: ${status}`, error);
            }
        });
    }

    function placeOrder() {
        let btn = document.getElementById("placeOrderBtn");
        btn.innerText = "Please wait...";
        btn.disabled = true;
        let formData = {
            action: 'placeOrder',
            name: $('#name').val(),
            mobile: $('#mobile').val(),
            email: $('#email').val(),
            country: $('#country').val(),
            state: $('#state').val(),
            district: $('#district').val(),
            city: $('#city').val(),
            landmark: $('#landmark').val(),
            pincode: $('#pincode').val(),
            paytype: $("input[name='paytype']:checked").val(),
            cartItems: JSON.stringify(cartItems)
        };

        if (cartItems.length == 0) {
            alert("Please Choose Products");
            btn.innerText = "Place Order";
            btn.disabled = false;
            return 0;
        }

        $.ajax({
            url: 'api.php',
            type: 'POST',
            data: formData,
            success: function (response) {
                // console.log(response)
                response = JSON.parse(response);
                if (response.status === "success") {
                    localStorage.removeItem('cart');
                    if (parseInt(formData.paytype) === 1) {
                        // Razorpay integration starts here
                        let orderId = response.orderId; // make sure your backend returns this
                        let amount = response.amount; // in paise
                        let keyId = response.keyId; // in paise

                        var options = {
                            "key": keyId, // Replace with your Razorpay key
                            "amount": amount,
                            "currency": "INR",
                            "name": "Your Website",
                            "description": "Order Payment",
                            "order_id": orderId,
                            "handler": function (razorResponse) {
                                alert(`Payment Successful!`);
                                // console.log(razorResponse)
                                $.ajax({
                                    url: 'api.php',
                                    type: 'POST',
                                    data: {
                                        action: 'verifyPayment',
                                        razorpay_payment_id: razorResponse.razorpay_payment_id,
                                        razorpay_order_id: razorResponse.razorpay_order_id,
                                        razorpay_signature: razorResponse.razorpay_signature
                                    },
                                    success: function (res) {
                                        let result = JSON.parse(res);
                                        if (result.status === 'success') {
                                            alert("Payment Verified Successfully!");
                                            // window.location.href = "thankyou.php";
                                        } else {
                                            alert("Payment Failed: " + result.message);
                                            // window.location.href = "payment_failed.php";
                                        }
                                    },
                                    error: function () {
                                        alert("Server Error! Try again.");
                                    }
                                });
                                // You can now send razorResponse.razorpay_payment_id to your server if needed
                                // window.location.href = "index.php";
                            },
                            "prefill": {
                                "name": formData.name,
                                "email": formData.email
                            },
                            "theme": {
                                "color": "#F37254"
                            }
                        };

                        var rzp = new Razorpay(options);
                        rzp.open();

                    } else {
                        alert(`Order placed successfully!`);
                        // COD - just redirect
                        // console.log("ds");
                        window.location.href = "index.php";
                    }
                } else {
                    alert("Error placing order!");
                    btn.innerText = "Place Order";
                    btn.disabled = false;
                }
            },
            error: function () {
                alert("Server error!");
                btn.innerText = "Place Order";
                btn.disabled = false;
            }
        });
    }
</script>
</body>

</html>
