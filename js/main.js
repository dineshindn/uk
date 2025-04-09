(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();


    // Initiate the wowjs
    new WOW().init();


    // Fixed Navbar
    $(window).scroll(function () {
        if ($(window).width() < 992) {
            if ($(this).scrollTop() > 45) {
                $('.fixed-top').addClass('bg-white shadow');
            } else {
                $('.fixed-top').removeClass('bg-white shadow');
            }
        } else {
            if ($(this).scrollTop() > 45) {
                $('.fixed-top').addClass('bg-white shadow').css('top', -45);
            } else {
                $('.fixed-top').removeClass('bg-white shadow').css('top', 0);
            }
        }
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        margin: 25,
        loop: true,
        center: true,
        dots: false,
        nav: true,
        navText : [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });


})(jQuery);

/**************************/
let cart = JSON.parse(localStorage.getItem('cart')) || [];

const cartItemsElement = document.getElementById("cart-items");
const grandTotalElement = document.getElementById("grand-total");
const checkoutButton = document.getElementById("checkout-btn");
const cartCountElement = document.getElementById('cart-count'); // Add this line

function updateCart() {
    cartItemsElement.innerHTML = "";
    let grandTotalRupees = 0;

    cart.forEach((item, index) => {
        const totalRupees = item.price * item.quantity;
        grandTotalRupees += totalRupees;

        const row = document.createElement("tr");
        row.innerHTML = `
            <td>${item.name}</td>
            <td>₹${item.price.toFixed(2)}</td>
            <td>
                <button onclick="changeQuantity(${index}, -1)">-</button>
                ${item.quantity}
                <button onclick="changeQuantity(${index}, 1)">+</button>
            </td>
            <td>₹${totalRupees.toFixed(2)}</td>
            <td><button onclick="removeItem(${index})"><i class="fa fa-trash"></i></button></td>
        `;
        cartItemsElement.appendChild(row);
    });

    grandTotalElement.textContent = `₹${grandTotalRupees.toFixed(2)}`;
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount(); // Add this line
}

function changeQuantity(index, change) {
    if (cart[index].quantity + change > 0) {
        cart[index].quantity += change;
        updateCart();
    }
}

function removeItem(index) {
    cart.splice(index, 1);
    updateCart();
}

function updateCartCount() { // Add this function
    cartCountElement.textContent = cart.reduce((total, item) => total + item.quantity, 0);
}

function addToCart(productId,productName, productPriceRupees) {
    console.log(productPriceRupees, "ccccccccccccccc");
    let existingProduct = cart.find(item => item.name === productName);

    if (existingProduct) {
        existingProduct.quantity++;
    } else {
        cart.push({ productId: productId, name: productName, price: productPriceRupees, quantity: 1 });
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    updateCart();
}

updateCart();

// function addToCart(productId,productName, productPrice) {
//     let cart = JSON.parse(localStorage.getItem('cart')) || [];
//     let existingProduct = cart.find(item => item.name === productName);
//
//     if (existingProduct) {
//         existingProduct.quantity++;
//     } else {
//         cart.push({ name: productName, price: productPrice, quantity: 1 });
//     }
//
//     localStorage.setItem('cart', JSON.stringify(cart));
//     console.log("Added to cart:", cart);
//     window.location.href = "cart.php";
// }


// Checkout Functionality
// checkoutButton.addEventListener("click", () => {
//     if (cart.length > 0) {
//         // Implement your checkout logic here
//         // e.g., send cart data to a server, redirect to a payment page, etc.
//         alert("Checkout initiated!");
//         // Clear the cart after checkout (optional)
//         cart = [];
//         localStorage.removeItem('cart');
//         updateCart();
//     } else {
//         alert("Your cart is empty!");
//     }
// });


// checkoutButton.addEventListener("click", () => {
//     if (cart.length > 0) {
//         // Implement your checkout logic here
//         // e.g., send cart data to a server, redirect to a payment page, etc.

//         // Store cart data in session storage or pass it via URL parameters,
//         // if needed for the payment page.
//         sessionStorage.setItem('checkoutCart', JSON.stringify(cart)); // Example

//         // Redirect to the payment page
//         window.location.href = "payment.html"; // Replace "payment.html" with your actual payment page URL

//         // Clear the cart after redirecting to payment page.
//         cart = [];
//         localStorage.removeItem('cart');
//         updateCart();
//     } else {
//         alert("Your cart is empty!");
//     }
// });
//
