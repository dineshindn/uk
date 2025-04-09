<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Uk enterprises</title>
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


    <?php include 'include/navbar.php'?>


    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <h1 class="display-2 mb-5 animated slideInDown">UK foods, A food from amma's hand</h1>
                                    <a href="product.php" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Products</a>
                                    <a href="contact.html" class="btn btn-secondary rounded-pill py-sm-3 px-sm-5 ms-3">Contact</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-lg-7">
                                    <h1 class="display-2 mb-5 animated slideInDown">UK foods, new way to live</h1>
                                    <a href="product.php" class="btn btn-primary rounded-pill py-sm-3 px-sm-5">Products</a>
                                    <a href="contact.html" class="btn btn-secondary rounded-pill py-sm-3 px-sm-5 ms-3">Contact</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100" src="img/about.jpg">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="display-5 mb-4">Snacks and Fryums</h1>
                    <p class="mb-4" style="text-align: justify;">Snacks encompass a wide array of food options consumed between regular meals, offering both nutritious and indulgent choices, from wholesome fruits and nuts to processed items like chips and cookies, all designed for convenient consumption.
                    </p>

                    <p class="mb-4" style="text-align: justify;">Fryums, a specialized snack category, distinguish themselves through their starch-based composition, typically utilizing wheat, corn, or rice, which are transformed into diverse shapes and then fried or baked to achieve a signature crispiness.
                    </p>

                    <p class="mb-4" style="text-align: justify;">These snacks are often seasoned with a variety of flavors, including spicy, tangy, and cheesy, making them a popular crunchy treat globally. While snacks broadly include savory items like chips and nuts, sweet treats such as cookies and candy, healthy options like yogurt and fruit, and baked goods, fryums specifically focus on delivering a uniquely textured, flavored, and often visually appealing crunchy snack experience.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="section-header text-start mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <h1 class="display-5 mb-3">Our Products</h1>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div id="product-item" class="row g-4">

                    </div><br><br>
                    <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                        <a href="product"><button id="load-more-1" class="btn btn-primary rounded-pill py-3 px-5">Browse More Products</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Firm Visit Start -->
    <div class="container-fluid bg-primary bg-icon mt-5 py-6">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-md-7 wow fadeIn" data-wow-delay="0.1s">
                    <h1 class="display-5 text-white mb-3">Visit Our Shop</h1>
                </div>
                <div class="col-md-5 text-md-end wow fadeIn" data-wow-delay="0.5s">
                    <a class="btn btn-lg btn-secondary rounded-pill py-3 px-5" href="index.php">Visit Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Firm Visit End -->


    <!-- Testimonial Start -->
    <div class="container-fluid bg-light bg-icon py-6 mb-5">
        <div class="container">
            <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
                style="max-width: 500px;">
                <h1 class="display-5 mb-3">Customer Feedbacks</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">"I absolutely love the crunchiness of these Fryums! They’re a perfect companion for my evening chai. The masala flavor is bold and spicy, just like I love it. They’re a hit with both kids and adults in the family. A great snack for casual gatherings!"</p>
                    <div class="d-flex align-items-center">
                        <!-- <img class="flex-shrink-0 rounded-circle" src="img/testimonial-1.jpg" alt=""> -->
                        <div class="ms-3">
                            <h5 class="mb-1">Ravi Kumar</h5>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">"These Fryums remind me of my childhood when I used to eat them after school. The variety of shapes and flavors like the spicy and cheesy ones bring back those memories. A perfect snack to munch on while watching TV!"</p>
                    <div class="d-flex align-items-center">
                        <div class="ms-3">
                            <h5 class="mb-1">Priya Sharma</h5>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">"The fryums are crunchy and tasty, but I wish they came in more exciting flavors. We’ve had the same masala and cheese ones for years. How about adding something like peri-peri or mint chutney for a change?"</p>
                    <div class="d-flex align-items-center">
                        <div class="ms-3">
                            <h5 class="mb-1">Sandeep Patel</h5>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item position-relative bg-white p-5 mt-4">
                    <i class="fa fa-quote-left fa-3x text-primary position-absolute top-0 start-0 mt-n4 ms-5"></i>
                    <p class="mb-4">"I recently bought these Fryums for my son’s birthday party, and they were a hit with the kids! They loved the shapes and the crunch. The only downside is that they’re a bit too salty, but overall, they were perfect for the event."</p>
                    <div class="d-flex align-items-center">
                        <div class="ms-3">
                            <h5 class="mb-1">Neha Reddy</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->





    <?php include 'include/footer.php'?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script>
        let offset = 0;
        let limit = 8;

        function loadProducts(firstLoad = false) {
            $.ajax({
                url: 'api.php',
                type: 'POST',
                data: { limit: limit, offset: offset,action:'getProducts' },
                success: function (response) {
                    const products = JSON.parse(response);
                    if (products.length === 0 && !firstLoad) {
                        $('#load-more').hide();
                        return;
                    }
                    products.forEach((product) => {
                        $('#product-item').append(`<div class="col-xl-3 col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s"><div class="product-list"><div class="position-relative bg-light overflow-hidden">
                                    <img class="img-fluid w-100" src="${product.image}" alt="">
                                    <div class="bg-secondary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">New</div>
                                </div>
                                <div class="text-center p-4">
                                    <a class="d-block h5 mb-2" href="">${product.name}</a>
                                    <span class="text-primary me-1">₹${product.price} rs </span><br>
                                    <span class="text-body ">${product.quantity} ${product.unit}</span>
                                </div>
                                <div class="d-flex border-top">
                                    <small class="w-50 text-center border-end py-2">
                                        <a class="text-body" href="productDetails.php?id=${product.id}"><i class="fa fa-eye text-primary me-2"></i>View detail</a>
                                    </small>
                                    <small class="w-50 text-center py-2">
                                        <a class="text-body" href="cart.php" onclick="addToCart(${product.id},'${product.name}', ${product.price}); return false;"><i class="fa fa-shopping-bag text-primary me-2"></i>Add to cart</a>
                                    </small>
                               </div></div></div>`);
                    });

                    offset += limit;
                    limit = 3; // After first load, load 3 at a time
                }
            });
        }

        $(document).ready(function () {
            loadProducts(true); // initial load

            $('#load-more').click(function () {
                loadProducts();
            });
        });
    </script>
</body>

</html>
