<?php
include("config.php");
session_start();
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
    <?php include("include/header.php") ?>
    <!-- header end  -->

    <!-- main start  -->
    <main>

        <!-- top banner section start  -->
        <section id="top-banner">
            <div class="swiper top-banner">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="images/banner1.jpeg" class="img-fluid error-img banner-img" alt="Banner">
                    </div>
                    <div class="swiper-slide">
                        <img src="images/banner2.jpeg" class="img-fluid error-img banner-img" alt="Banner">
                    </div>
                    <div class="swiper-slide">
                        <img src="images/banner3.jpeg" class="img-fluid error-img banner-img" alt="Banner">
                    </div>
                    <div class="swiper-slide">
                        <img src="images/banner4.jpeg" class="img-fluid error-img banner-img" alt="Banner">
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
                            <a class="text-dark" href="product_search_filter.php?designers%5B%5D=<?php
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
                <a href="product_search_filter.php">See All</a>
                <div class="swiper slider-for-all mx-4 mt-3">
                    <div class="swiper-wrapper">
                        <?php
                        $ret = mysqli_query($con, "select * from all_products_info where visibility='bestsellers'");
                        while ($row = mysqli_fetch_array($ret)) {
                        ?>
                            <div class="swiper-slide">
                                <form action="manage_cart.php" method="POST">
                                    <img src="<?php
                                                echo htmlentities($row["product_image"]);
                                                ?>" class="img-fluid mb-3 bg-light error-img" alt="Perfume" loading="lazy">
                                    <a class="text-dark text-decoration-none" href="product_details.php?id=<?php
                                                                    echo htmlentities($row["id"]);
                                                                    ?>">
                                        <h3><?php
                                            echo htmlentities($row["designer"]);
                                            ?></h3>
                                    </a>

                                    <p>Price: <?php
                                                echo htmlentities($row["price"]);
                                                ?></p>
                                    <button class="btn btn-link" type="submit" name="Add_To_Cart">Add to Cart</button>
                                    <input type="hidden" name="Item_Name" value="<?php
                                                                                    echo htmlentities($row["designer"]);
                                                                                    ?>">

                                    <input type="hidden" name="Price" value="<?php
                                                                                echo htmlentities($row["price"]);
                                                                                ?>">

                                </form>
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
                <a href="product_search_filter.php">See All</a>
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
                                <a class="text-dark text-decoration-none" href="product_details.php?id=<?php
                                                                echo htmlentities($row["id"]);
                                                                ?>">
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
                    <div class="swiper-wrapper mb-5">
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
                    <div class="swiper-pagination"></div>
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
                                <a class="text-dark text-decoration-none" href="product_details.php?id=<?php
                                                                echo htmlentities($row["id"]);
                                                                ?>">
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
    <?php include("include/footer.php") ?>
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
            spaceBetween: 10,
            centeredSlides: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: false
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
        // swipper for reviews
        const allreviewswiper = new Swiper('.slider-for-review', {
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
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