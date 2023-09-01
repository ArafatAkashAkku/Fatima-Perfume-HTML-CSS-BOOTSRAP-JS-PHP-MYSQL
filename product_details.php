<?php
// Include configuration file  
require_once 'config.php';
include 'dbConnect.php';
session_start();


$id = "";
if (isset($_GET["id"])) {
    $id = $_GET["id"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap css link  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- external css link  -->
    <link rel="stylesheet" href="css/index.css">
    <!-- swipper css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <!-- font awesome cdn 6.3.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <!-- favicon link  -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <!-- website title  -->
    <title>Product Details | <?php
                                $ret = mysqli_query($con, "select * from website_info");
                                while ($row = mysqli_fetch_array($ret)) {
                                    echo htmlentities($row["website_name"]);
                                } ?>
    </title>
    <!-- Stripe JavaScript library -->
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body class="overflow-x-hidden">

    <!-- header start  -->
    <?php include("include/header.php") ?>
    <!-- header end  -->

    <!-- main start  -->
    <main>
        <section>
            <div class="row mx-4 mb-3">
                <div class="col-sm-12 col-12 text-center">
                    <h4>Product Details</h4>
                </div>
                <div id="paymentResponse"></div>
                <?php
                $ret = mysqli_query($con, "select * from all_products_info where id='$id'");
                $rowitems = mysqli_fetch_array($ret, MYSQLI_ASSOC);
                ?>
                <div class="col-sm-6 col-12">
                    <img src="images/products/<?php
                                                echo ($rowitems['id']);
                                                ?>/<?php
                                                    echo ($rowitems['product_image']);
                                                    ?>" class="img-fluid mb-3 bg-light error-img" alt="Perfume" loading="lazy">
                </div>
                <div class="col-sm-6 col-12 d-flex flex-column justify-content-center gap-3">
                    <h3><?php
                        echo ($rowitems["designer"]);
                        ?></h3>
                    <p>Price: $<?php
                                echo ($rowitems["price"]);
                                ?></p>
                    <?php
                    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                    ?>
                        <button class="btn btn-link text-start" id="payButton">Buy Now</button>
                    <?php
                    } else {
                    ?>
                        <button class="btn btn-link text-start"><a href="login.php">Buy Now</a></button>

                    <?php
                    }
                    ?>
                    <h6>Product Description</h6>
                    <p><?php
                        echo ($rowitems["description"]);
                        ?></p>
                </div>
            </div>
        </section>

        <!-- top picks for you section start  -->
        <section id="top-picks-for-you" class="py-3">
            <div class="text-center">
                <h1>Top picks for you</h1>
                <div class="swiper slider-for-all mx-4 mt-3">
                    <div class="swiper-wrapper">
                        <?php
                        $ret = mysqli_query($con, "select * from all_products_info where visibility='toppicksfy'");
                        while ($row = mysqli_fetch_array($ret)) {
                        ?>
                            <div class="swiper-slide">
                                <img src="images/products/<?php
                                                            echo htmlentities($row['id']);
                                                            ?>/<?php
                                                                echo htmlentities($row['product_image']);
                                                                ?>" class="img-fluid mb-3 bg-light error-img" alt="Perfume" loading="lazy">
                                <a class="text-dark text-decoration-none" href="product_details.php?id=<?php
                                                                                                        echo htmlentities($row["id"]);
                                                                                                        ?>">
                                    <h3><?php
                                        echo htmlentities($row["designer"]);
                                        ?></h3>

                                    <p>Price: $<?php
                                                echo htmlentities($row["price"]);
                                                ?></p>
                                    <button class="btn btn-link">Buy Item</button>
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <div class="swiper-button-next text-warning"></div>
                    <div class="swiper-button-prev text-warning"></div>
                </div>
            </div>
        </section>
        <!-- top picks for you section end  -->
    </main>
    <!-- main end  -->

    <!-- footer start  -->
    <?php include("include/footer.php") ?>

    <!-- footer end  -->

    <!-- bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- external js link  -->
    <script src="js/index.js"></script>
    <!-- swipper js link  -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!-- internal js link  -->
    <script>
        var buyBtn = document.getElementById('payButton');
        var responseContainer = document.getElementById('paymentResponse');
        // Create a Checkout Session with the selected product
        var createCheckoutSession = function(stripe) {
            return fetch("stripe_charge.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    checkoutSession: 1,
                    Name: "<?php echo $rowitems['designer']; ?>",
                    ID: "<?php echo $rowitems['id']; ?>",
                    Price: "<?php echo $rowitems['price']; ?>",
                    Currency: "<?php echo $rowitems['currency']; ?>",
                }),
            }).then(function(result) {
                return result.json();
            });
        };

        // Handle any errors returned from Checkout
        var handleResult = function(result) {
            if (result.error) {
                responseContainer.innerHTML = '<p>' + result.error.message + '</p>';
            }
            buyBtn.disabled = false;
            buyBtn.textContent = 'Buy Now';
        };

        // Specify Stripe publishable key to initialize Stripe.js
        var stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

        buyBtn.addEventListener("click", function(evt) {
            buyBtn.disabled = true;
            buyBtn.textContent = 'Please wait...';
            createCheckoutSession().then(function(data) {
                if (data.sessionId) {
                    stripe.redirectToCheckout({
                        sessionId: data.sessionId,
                    }).then(handleResult);
                } else {
                    handleResult(data);
                }
            });
        });
    </script>
    <script>
        // swipper for all brands 
        const allbrandswiper = new Swiper('.slider-for-all', {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: false,
            },
            breakpoints: {
                50: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                500: {
                    slidesPerView: 2,
                    spaceBetween: 10,
                },
                980: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                }
            }
        });
    </script>
</body>

</html>