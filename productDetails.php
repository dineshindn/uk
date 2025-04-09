<?php
if(isset($_GET['id'])){
    $productId=$_GET['id'];
}
?>
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
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Lora:wght@600;700&display=swap" rel="stylesheet">

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
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->


    <?php include 'include/navbar.php'?>


    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container">
            <h1 class="productTitle" class="display-3 mb-3 animated slideInDown"></h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-body" href="#">Home</a></li>
                    <li class="breadcrumb-item text-dark active productTitle" aria-current="page"></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <!-- <img class="img-fluid w-100" src="img/800 B2.png"> -->
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn " data-wow-delay="0.5s">

                    <div class="description"></div>
                    <!-- <a href="javascript:void(#)" class="" onclick="addToCart(${product.id},'${product.name}', ${product.price})"> Add to cart </a> -->

                </div>

                  
            </div>
        </div>
    </div>
    <!-- About End -->




    <?php include 'include/footer.php'?>


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
    <script>

        let productId='<?php echo $productId; ?>';

        function loadProducts(productId) {
            $.ajax({
                url: 'api.php',
                type: 'POST',
                data: { productId: productId,action:'getSingleProduct' },
                success: function (response) {
                    const products = JSON.parse(response);
                    if (products.length === 0 && !firstLoad) {
                        $('#load-more').hide();
                        return;
                    }
                    products.forEach((product) => {
                        console.log(product, "NEW PRODUCTS")
                        $('.about-img').html(`
                            <img class="img-fluid w-100" src="${product.image}" alt="${product.name}">
                        `);
                        $('.productTitle').append(`${product.name}`);
                        $('.description').html(`
                            ${product.description}
                            <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href="cart.php" onclick="addToCart(${product.id}, '${product.name.replace(/'/g, "\\'")}', ${product.price});">Add to cart</a>
                        `);
                        // $('.description').append(`${product.description}<a class="btn btn-primary rounded-pill py-3 px-5 mt-3"  onclick="addToCart(${product.id},'${product.name}', ${product.price});">Add to cart</a> `);
                    });
                }
            });
        }

        $(document).ready(function () {
            loadProducts(productId); // initial load
            // $('#load-more').click(function () {
            //     loadProducts();
            // });
        });

        function addToCart(productId, productName, productPriceRupees) {
            let existingProduct = cart.find(item => item.name === productName);

            if (existingProduct) {
                existingProduct.quantity++;
            } else {
                cart.push({
                    productId: productId,
                    name: productName,
                    price: productPriceRupees,
                    quantity: 1
                });
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            alert("Product added to cart!");
        }
    </script>
</body>

</html>
