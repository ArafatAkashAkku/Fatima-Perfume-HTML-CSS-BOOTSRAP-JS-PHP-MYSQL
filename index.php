<?php
include("config.php");
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
    <title>
        <?php
        $ret = mysqli_query($con, "select * from website_info");
        while ($row = mysqli_fetch_array($ret)) {
            echo htmlentities($row["website_name"]);
        } ?></title>

</head>

<body class="overflow-x-hidden">

    <!-- header start  -->
    <header>
        <?php
        $ret = mysqli_query($con, "select * from website_info");
        while ($row = mysqli_fetch_array($ret)) {
        ?>
            <nav class="navbar navbar-expand-lg bg-dark top-0 start-0 navigation-header">
                <div class="container-fluid">
                    <a class="navbar-brand text-warning" href="index.php"> <?php
                                                                            echo htmlentities($row["website_name"]);
                                                                            ?></a>
                    <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active text-light" aria-current="page" href="#">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#view-all-brands">Top Brands</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#best-sellers">Best Sellers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#new-arrivals">New Arrivals</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#contact">Contact</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Pages
                                </a>
                                <ul class="dropdown-menu bg-dark">
                                    <li><a class="dropdown-item text-light bg-dark" href="#">My Account</a></li>
                                    <li><a class="dropdown-item text-light bg-dark" href="#">My Cart</a></li>
                                    <li><a class="dropdown-item text-light bg-dark" href="login.php">Log In</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="d-flex" role="search" action="search_result.php" method="GET" autocomplete="off">
                            <input type="text" name="search" required value="<?php if (isset($_GET['search'])) {
                                                                                    echo $_GET['search'];
                                                                                } ?>" class="form-control" placeholder="Search data">
                            <button class="btn btn-outline-warning" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
        <?php
        }
        ?>
    </header>
    <!-- header end  -->

    <!-- main start  -->
    <main>

        <!-- top banner section start  -->
        <section id="top-banner">
            <div class="swiper top-banner">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="images/banner1.jpg" class="img-fluid error-img" alt="Banner">
                    </div>
                    <div class="swiper-slide">
                        <img src="images/banner2.jpg" class="img-fluid error-img" alt="Banner">
                    </div>
                    <div class="swiper-slide">
                        <img src="images/banner3.jpg" class="img-fluid error-img" alt="Banner">
                    </div>
                </div>
                <div class="swiper-button-next text-warning"></div>
                <div class="swiper-button-prev text-warning"></div>
            </div>
        </section>
        <!-- top banner section end  -->

        <!-- view all brands section start  -->
        <section id="view-all-brands" class="py-3">
            <div class="text-center">
                <h1>Top Fragrance Brand</h1>
                <a href="product_search_filter.php">View All Brands</a>
                <div class="row gap-3 d-flex align-items-center justify-content-center mt-3">
                    <?php
                    $ret = mysqli_query($con, "select * from product_designer_info");
                    while ($row = mysqli_fetch_array($ret)) {
                    ?>
                        <div class="col-md-3 col-4 brand-item bg-light py-2">
                            <img src="http://69.64.95.100/pcaimages/pricelist/I0090435.jpg" class="img-fluid mb-3 error-img" alt="Perfume" loading="lazy">
                            <a href="product_search_filter.php?designers%5B%5D=<?php
                                                                                echo htmlentities($row["id"]);
                                                                                ?>"><?php
                                                                                    echo htmlentities($row["designer"]);
                                                                                    ?></a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <button id="load-more" class="px-3 py-2 mt-3 border border-2 border-warning bg-warning rounded-2">Load
                    More</button>
            </div>
        </section>
        <!-- view all brands section end  -->

        <!-- best sellers section start  -->
        <section id="best-sellers" class="py-3">
            <div class="text-center">
                <h1>Best Sellers</h1>
                <a href="#">See All</a>
                <div class="swiper slider-for-all mx-4 mt-3">
                    <div class="swiper-wrapper">
                        <?php
                        $ret = mysqli_query($con, "select * from all_products_info where visibility='bestsellers'");
                        while ($row = mysqli_fetch_array($ret)) {
                        ?>
                            <div class="swiper-slide">
                                <img src="<?php
                                            echo htmlentities($row["product_image"]);
                                            ?>" class="img-fluid mb-3 bg-light error-img" alt="Perfume" loading="lazy">
                                <a href="#">
                                    <h3><?php
                                        echo htmlentities($row["designer"]);
                                        ?></h3>
                                </a>
                                <p>Price: <?php
                                            echo htmlentities($row["price"]);
                                            ?></p>
                                <a href="#">Add to Cart</a>
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
        <!-- best sellers section end  -->

        <!-- new arrivals section start  -->
        <section id="new-arrivals" class="py-3">
            <div class="text-center">
                <h1>New Arrivals</h1>
                <a href="#">See All</a>
                <div class="swiper slider-for-all mx-4 mt-3">
                    <div class="swiper-wrapper">
                        <?php
                        $ret = mysqli_query($con, "select * from all_products_info where visibility='newarrivals'");
                        while ($row = mysqli_fetch_array($ret)) {
                        ?>
                            <div class="swiper-slide">
                                <img src="<?php
                                            echo htmlentities($row["product_image"]);
                                            ?>" class="img-fluid mb-3 bg-light error-img" alt="Perfume" loading="lazy">
                                <a href="#">
                                    <h3><?php
                                        echo htmlentities($row["designer"]);
                                        ?></h3>
                                </a>
                                <p>Price: <?php
                                            echo htmlentities($row["price"]);
                                            ?></p>
                                <a href="#">Add to Cart</a>
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
        <!-- new arrivals section end  -->

        <!-- review section start  -->
        <section id="reviews" class="py-3">
            <div class="text-center">
                <h1>Reviews</h1>
                <div class="swiper slider-for-review mx-4 mt-3">
                    <div class="swiper-wrapper">
                        <?php
                        $ret = mysqli_query($con, "select * from frontpage_reviews");
                        while ($row = mysqli_fetch_array($ret)) {
                        ?>
                            <div class="swiper-slide review-bg p-3">
                                <i class="fa-solid fa-user fs-3 text-warning border rounded-circle bg-white p-3"></i>
                                <h5><?php
                                    echo htmlentities($row["review_message"]);
                                    ?></h5>
                                <p><?php
                                    echo htmlentities($row["review_sender"]);
                                    ?></p>
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
        <!-- review section end  -->

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
                                <img src="<?php
                                            echo htmlentities($row["product_image"]);
                                            ?>" class="img-fluid mb-3 bg-light error-img" alt="Perfume" loading="lazy">
                                <a href="#">
                                    <h3><?php
                                        echo htmlentities($row["designer"]);
                                        ?></h3>
                                </a>
                                <p>Price: <?php
                                            echo htmlentities($row["price"]);
                                            ?></p>
                                <a href="#">Add to Cart</a>
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
    <footer class="bg-dark pt-3" id="contact">
        <?php
        $ret = mysqli_query($con, "select * from website_info");
        while ($row = mysqli_fetch_array($ret)) {
        ?>
            <div class="mx-4">
                <div class="row">
                    <div class="col-12 col-md-2 mb-3">
                        <h5 class="text-light"><?php
                                                echo htmlentities($row["website_name"]);
                                                ?></h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="mailto:<?php
                                                                        echo htmlentities($row["email"]);
                                                                        ?>" class="nav-link p-0 text-light"><i class="fa-solid fa-envelope text-warning pe-2"></i><?php
                                                                                                                                                                    echo htmlentities($row["email"]);
                                                                                                                                                                    ?></a></li>
                            <li class="nav-item mb-2"><a href="tel:<?php
                                                                    echo htmlentities($row["phone_no"]);
                                                                    ?>" class="nav-link p-0 text-light"><i class="fa-solid fa-phone text-warning pe-2"></i><?php
                                                                                                                                                            echo htmlentities($row["phone_no"]);
                                                                                                                                                            ?></a></li>
                        </ul>
                    </div>

                    <div class="col-12 col-md-2 mb-3">
                        <h5 class="text-light">Navbar</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#view-all-brands" class="nav-link p-0 text-light">Top Fraggrance</a></li>
                            <li class="nav-item mb-2"><a href="#best-sellers" class="nav-link p-0 text-light">Best Seller</a></li>
                            <li class="nav-item mb-2"><a href="#new-arrivals" class="nav-link p-0 text-light">New Arrivals</a></li>
                            <li class="nav-item mb-2"><a href="#reviews" class="nav-link p-0 text-light">Reviews</a></li>
                            <li class="nav-item mb-2"><a href="#top-picks-for-you" class="nav-link p-0 text-light">Top Picks For You</a></li>
                        </ul>
                    </div>

                    <div class="col-12 col-md-2 mb-3">
                        <h5 class="text-light">Portals</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">User</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Admin</a></li>
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-light">Owner</a></li>
                        </ul>
                    </div>

                    <div class="col-md-5 offset-md-1 mb-3">
                        <form>
                            <h5 class="text-light">Subscribe to our newsletter</h5>
                            <p class="text-light">Monthly digest of what's new and exciting from us.</p>
                            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                                <label for="newsletter1" class="visually-hidden">Email address</label>
                                <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                                <button class="btn btn-warning" type="button">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="d-flex flex-column flex-sm-row justify-content-between pt-4 border-top align-items-center">
                    <p class="text-light">© <span class="update-year"></span> Company, Inc. All rights reserved.</p>
                    <ul class="list-unstyled d-flex">
                        <li class="ms-3"><a class="text-warning fs-4" href="<?php
                                                                            echo htmlentities($row["facebook_link"]);
                                                                            ?>" target="_blank" title="Facebook"><i class="fa-brands fa-facebook"></i></a></li>
                        <li class="ms-3"><a class="text-warning fs-4" href="<?php
                                                                            echo htmlentities($row["instagram_link"]);
                                                                            ?>" target="_blank" title="Instagram"><i class="fa-brands fa-square-instagram"></i></a></li>
                        <li class="ms-3"><a class="text-warning fs-4" href="<?php
                                                                            echo htmlentities($row["twitter_link"]);
                                                                            ?>" target="_blank" title="Twitter"><i class="fa-brands fa-twitter"></i></a></li>
                        <li class="ms-3"><a class="text-warning fs-4" href="<?php
                                                                            echo htmlentities($row["youtube_link"]);
                                                                            ?>" target="_blank" title="Youtube"><i class="fa-brands fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        <?php
        }
        ?>
    </footer>
    <!-- footer end  -->

    <!-- bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- external js link  -->
    <script src="js/index.js"></script>
    <!-- swipper js link  -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!-- internal script link  -->
    <script>
        // swipper for top banners 
        const slideshowswiper = new Swiper(".top-banner", {
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
        // swipper for all brands 
        const allbrandswiper = new Swiper('.slider-for-all', {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
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
        // swipper for reviews
        const allreviewswiper = new Swiper('.slider-for-review', {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                50: {
                    slidesPerView: 1,
                    spaceBetween: 15,
                },
                700: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                980: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                }
            }
        });
    </script>
</body>

</html>