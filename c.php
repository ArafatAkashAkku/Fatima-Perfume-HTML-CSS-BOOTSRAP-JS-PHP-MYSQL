<!DOCTYPE html>
<html lang="en">

<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- external css link  -->
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/responsive.css">
    <!-- favicon link  -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <!-- font awesome cdn 6.3.0 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <!-- manifest link  -->
    <link rel="manifest" href="manifest.webmanifest">
    <!-- website title  -->
    <title>Website Title</title>
</head>

<body>

    <!-- header start  -->
    <header>
        <?php include("includes/header1.php") ?>
        <?php include("includes/header2.php") ?>
        <?php include("includes/header3.php") ?>
        <?php include("includes/header4.php") ?>
    </header>
    <!-- header end  -->
    <!-- main start  -->
    <main>
        <!-- progress bar section start  -->
        <section>
            <div class="progress">
                <div class="highlight" id="bar-highlight"></div>
            </div>
        </section>
        <!-- progress bar section end  -->
        <!-- slideshow section start  -->
        <section id="home">
            <div class="swiper slideshow">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="images/banner1.jpg">
                    </div>
                    <div class="swiper-slide">
                        <img src="images/banner2.jpg">
                    </div>
                    <div class="swiper-slide">
                        <img src="images/banner3.jpg">
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </section>
        <!-- slideshow section end  -->
        <!-- collection section start  -->
        <section id="brand-collection">
            <div class="men">
                <a href="">Men's</a>
            </div>
            <div class="women">
                <a href="">Women's</a>
            </div>
        </section>
        <!-- collection section end  -->
        <!-- whole brand list section start  -->
        <section id="view-all-brands">
            <h1>View All Brands</h1>
            <div id="all-brands">
                <div class="brand-list">
                    <img src="images/perfume.png" alt="">
                    <h3>Calvin Clein</h3>
                </div>
                <div class="brand-list">
                    <img src="images/perfume.png" alt="">
                    <h3>Calvin Clein</h3>
                </div>
                <div class="brand-list">
                    <img src="images/perfume.png" alt="">
                    <h3>Calvin Clein</h3>
                </div>
                <div class="brand-list">
                    <img src="images/perfume.png" alt="">
                    <h3>Calvin Clein</h3>
                </div>
                <div class="brand-list">
                    <img src="images/perfume.png" alt="">
                    <h3>Calvin Clein</h3>
                </div>
                <div class="brand-list">
                    <img src="images/perfume.png" alt="">
                    <h3>Calvin Clein</h3>
                </div>
            </div>
            <div class="load-button">
                <button id="load-more">Load More</button>
            </div>
        </section>
        <!-- whole brand list section end  -->
        <!-- men-category section start  -->
        <section class="category">
            <div class="img">
                <a href="">Men's Brand</a>
            </div>
            <div class="perfume">
                <div class="swiper all-brand">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="images/perfume.png" alt="">
                            <h3>Calvin Clein</h3>
                            <p>Price: 200</p>
                            <a href="#">Add to cart</a>
                            <i class="fa-sharp fa-regular fa-heart"></i>
                        </div>
                        <div class="swiper-slide">
                            <img src="images/perfume.png" alt="">
                            <h3>Calvin Clein</h3>
                            <p>Price: 200</p>
                            <a href="#">Add to cart</a>
                            <i class="fa-sharp fa-regular fa-heart"></i>
                        </div>
                        <div class="swiper-slide">
                            <img src="images/perfume.png" alt="">
                            <h3>Calvin Clein</h3>
                            <p>Price: 200</p>
                            <a href="#">Add to cart</a>
                            <i class="fa-sharp fa-regular fa-heart"></i>
                        </div>
                        <div class="swiper-slide">
                            <img src="images/perfume.png" alt="">
                            <h3>Calvin Clein</h3>
                            <p>Price: 200</p>
                            <a href="#">Add to cart</a>
                            <i class="fa-sharp fa-regular fa-heart"></i>
                        </div>
                        <div class="swiper-slide">
                            <img src="images/perfume.png" alt="">
                            <h3>Calvin Clein</h3>
                            <p>Price: 200</p>
                            <a href="#">Add to cart</a>
                            <i class="fa-sharp fa-regular fa-heart"></i>
                        </div>
                        <div class="swiper-slide">
                            <img src="images/perfume.png" alt="">
                            <h3>Calvin Clein</h3>
                            <p>Price: 200</p>
                            <a href="#">Add to cart</a>
                            <i class="fa-sharp fa-regular fa-heart"></i>
                        </div>
                        <div class="swiper-slide">
                            <img src="images/perfume.png" alt="">
                            <h3>Calvin Clein</h3>
                            <p>Price: 200</p>
                            <a href="#">Add to cart</a>
                            <i class="fa-sharp fa-regular fa-heart"></i>
                        </div>
                        <div class="swiper-slide">
                            <img src="images/perfume.png" alt="">
                            <h3>Calvin Clein</h3>
                            <p>Price: 200</p>
                            <a href="#">Add to cart</a>
                            <i class="fa-sharp fa-regular fa-heart"></i>
                        </div>
                        <div class="swiper-slide">
                            <img src="images/perfume.png" alt="">
                            <h3>Calvin Clein</h3>
                            <p>Price: 200</p>
                            <a href="#">Add to cart</a>
                            <i class="fa-sharp fa-regular fa-heart"></i>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

            </div>
        </section>
        <!-- men-category section end  -->
        <!-- women-category section start  -->
        <section class="category">
            <div class="perfume">
                <div class="swiper all-brand">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="images/perfume.png" alt="">
                            <h3>Calvin Clein</h3>
                            <p>Price: 200</p>
                            <a href="#">Add to Cart</a>
                            <i class="fa-sharp fa-regular fa-heart"></i>
                        </div>
                        <div class="swiper-slide">
                            <img src="images/perfume.png" alt="">
                            <h3>Calvin Clein</h3>
                            <p>Price: 200</p>
                            <a href="#">Add to cart</a>
                            <i class="fa-sharp fa-regular fa-heart"></i>
                        </div>
                        <div class="swiper-slide">
                            <img src="images/perfume.png" alt="">
                            <h3>Calvin Clein</h3>
                            <p>Price: 200</p>
                            <a href="#">Add to cart</a>
                            <i class="fa-sharp fa-regular fa-heart"></i>
                        </div>
                        <div class="swiper-slide">
                            <img src="images/perfume.png" alt="">
                            <h3>Calvin Clein</h3>
                            <p>Price: 200</p>
                            <a href="#">Add to cart</a>
                            <i class="fa-sharp fa-regular fa-heart"></i>
                        </div>
                        <div class="swiper-slide">
                            <img src="images/perfume.png" alt="">
                            <h3>Calvin Clein</h3>
                            <p>Price: 200</p>
                            <a href="#">Add to cart</a>
                            <i class="fa-sharp fa-regular fa-heart"></i>
                        </div>
                        <div class="swiper-slide">
                            <img src="images/perfume.png" alt="">
                            <h3>Calvin Clein</h3>
                            <p>Price: 200</p>
                            <a href="#">Add to cart</a>
                            <i class="fa-sharp fa-regular fa-heart"></i>
                        </div>
                        <div class="swiper-slide">
                            <img src="images/perfume.png" alt="">
                            <h3>Calvin Clein</h3>
                            <p>Price: 200</p>
                            <a href="#">Add to cart</a>
                            <i class="fa-sharp fa-regular fa-heart"></i>
                        </div>
                        <div class="swiper-slide">
                            <img src="images/perfume.png" alt="">
                            <h3>Calvin Clein</h3>
                            <p>Price: 200</p>
                            <a href="#">Add to cart</a>
                            <i class="fa-sharp fa-regular fa-heart"></i>
                        </div>
                        <div class="swiper-slide">
                            <img src="images/perfume.png" alt="">
                            <h3>Calvin Clein</h3>
                            <p>Price: 200</p>
                            <a href="#">Add to cart</a>
                            <i class="fa-sharp fa-regular fa-heart"></i>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            <div class="imgw">
                <a href="">Women's Brand</a>
            </div>
        </section>
        <!-- women-category section end  -->
        <!-- deal of the week section start-->
        <?php include("includes/weeklydeals.php") ?>
        <!-- deal of the week section start-->
        <!-- Back To Top button section start  -->
        <section>
            <button id="myBtn" title="Go to top">&uarr;</button>
        </section>
        <!-- Back To Top button section end  -->
        <!-- pwa update message section start  -->
        <section>
            <div id="snackbar">
                <p><a id="reload">A new version of this app is available. Click here to update.</a></p>
            </div>
        </section>
        <!-- pwa update message section end  -->
    </main>
    <!-- main end  -->
    <!-- footer start -->
    <footer id="contact">
        <?php include("includes/footer.php") ?>
    </footer>
    <!-- footer end -->
    <!-- google translation link  -->
    <script src="http://translate.google.com/translate_a/element.js?cb=loadGoogleTranslate"></script>
    <!-- external js link  -->
    <script src="js/index.js"></script>
    <!-- swipper js  -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!-- swipper js source code for swipper content  -->
    <script>
        // slideshow swipper 
        const progressContent = document.querySelector(".autoplay-progress span");
        const slideshowswiper = new Swiper(".slideshow", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            }
        });
        // all brand swipper 
        const allbrandswiper = new Swiper('.all-brand', {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                420: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                }
            }
        });
    </script>
    <script>
        // pwa installation updation 
        // https://codyanhorn.tech/blog/pwa-reload-page-on-application-update
        // every update requires the changes in cache name in sw.js file 
        (function() {
            // Track an updated flag and an activated flag.
            // When both of these are flagged true the service worker was updated and activated.
            let updated = false;
            let activated = false;
            navigator.serviceWorker.register('/sw.js').then(regitration => {
                regitration.addEventListener("updatefound", () => {
                    const worker = regitration.installing;
                    worker.addEventListener('statechange', () => {
                        if (worker.state === "activated") {
                            // Here is when the activated state was triggered from the lifecycle of the service worker.
                            // This will trigger on the first install and any updates.
                            activated = true;
                            checkUpdate();
                        }
                    });
                });
            });
            navigator.serviceWorker.addEventListener('controllerchange', () => {
                // This will be triggered when the service worker is replaced with a new one.
                // It does not just reload the page right away, so to make sure it is fully activated using the checkUpdate function.
                updated = true;
                checkUpdate();
            });

            function checkUpdate() {
                let snackbar = document.getElementById('snackbar');
                if (activated && updated) {
                    snackbar.classList.add('show');
                    document.getElementById('reload').addEventListener('click', function() {
                        window.location.reload();
                    });
                }
            }
        })();
    </script>
</body>

</html>