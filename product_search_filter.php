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
    <link rel="stylesheet" href="css/product_search_filter.css">
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
                                <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="index.php#view-all-brands">Top Brands</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="index.php#best-sellers">Best Sellers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="index.php#new-arrivals">New Arrivals</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="index.php#contact">Contact</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Pages
                                </a>
                                <ul class="dropdown-menu bg-dark">
                                    <li><a class="dropdown-item text-light bg-dark" href="#">My Account</a></li>
                                    <li><a class="dropdown-item text-light bg-dark" href="#">My Cart</a></li>
                                    <li><a class="dropdown-item text-light bg-dark" href="#">Log In</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
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






    <div class="mx-4">
        <div class="row">
            <div class="col-12 text-center">
                <h4>Product Filter Search</h4>
                <h6 class="text-end text-decoration-underline filter-click">Filter Search Click</h6>
            </div>
            <!-- Brand List  -->
            <div class="col-md-3 col-6 filter-show">
                <form action="" method="GET">
                    <div class="card shadow mt-3">
                        <div class="card-header bg-light">
                            <h5>Filter
                                <button type="submit" class="btn btn-warning btn-sm float-end">Search</button>
                            </h5>
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <h6>Brand List</h6>
                                <a href="product_search_filter.php" class="text-decoration-none text-dark">
                                    <h6>Clear List</h6>
                                </a>
                            </div>
                        </div>
                        <div class="card-body scroll-card">
                            <?php
                            $product_designer_info_query = "SELECT * FROM product_designer_info";
                            $product_designer_info_query_run  = mysqli_query($con, $product_designer_info_query);

                            if (mysqli_num_rows($product_designer_info_query_run) > 0) {
                                foreach ($product_designer_info_query_run as $designerlist) {
                                    $checked = [];
                                    if (isset($_GET['designers'])) {
                                        $checked = $_GET['designers'];
                                    }
                            ?>
                                    <div>
                                        <input type="checkbox" name="designers[]" value="<?= $designerlist['id']; ?>" <?php if (in_array($designerlist['id'], $checked)) {
                                                                                                                            echo "checked";
                                                                                                                        } ?> />
                                        <?= $designerlist['designer']; ?>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "No Brands Found";
                            }
                            ?>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Brand Product Item List -->
            <div class="col-md-9 col-12 mt-3">
                <div class="card ">
                    <div class="card-body row">
                        <?php
                        if (isset($_GET['designers'])) {
                            $branchecked = [];
                            $branchecked = $_GET['designers'];
                            foreach ($branchecked as $rowbrand) {
                                // echo $rowbrand;
                                $products = "SELECT * FROM all_products_info WHERE brand_id IN ($rowbrand)";
                                $products_run = mysqli_query($con, $products);
                                if (mysqli_num_rows($products_run) > 0) {
                                    foreach ($products_run as $proditems) :
                        ?>
                                        <div class="col-md-4 mt-3">
                                            <div class="border p-2">
                                                <h6><?= $proditems['designer']; ?></h6>
                                            </div>
                                        </div>
                                    <?php
                                    endforeach;
                                }
                            }
                        } else {
                            $products = "SELECT * FROM all_products_info";
                            $products_run = mysqli_query($con, $products);
                            if (mysqli_num_rows($products_run) > 0) {
                                foreach ($products_run as $proditems) :
                                    ?>
                                    <div class="col-md-3 col-6 mt-3 text-center">
                                        <div class="border border-warning p-2">
                                            <img src="images/perfume.png" class="img-fluid mb-3 bg-light error-img" alt="Perfume" loading="lazy">
                                            <a href="#">
                                                <h5><?= $proditems['designer']; ?></h5>
                                            </a>
                                            <p>Price:<?= $proditems['price']; ?></p>
                                            <a href="#">Add to Cart</a>
                                        </div>
                                    </div>
                        <?php
                                endforeach;
                            } else {
                                echo "No Items Found";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                            <li class="nav-item mb-2"><a href="index.php#view-all-brands" class="nav-link p-0 text-light">Top Fraggrance</a></li>
                            <li class="nav-item mb-2"><a href="index.php#best-sellers" class="nav-link p-0 text-light">Best Seller</a></li>
                            <li class="nav-item mb-2"><a href="index.php#new-arrivals" class="nav-link p-0 text-light">New Arrivals</a></li>
                            <li class="nav-item mb-2"><a href="index.php#reviews" class="nav-link p-0 text-light">Reviews</a></li>
                            <li class="nav-item mb-2"><a href="index.php#top-picks-for-you" class="nav-link p-0 text-light">Top Picks For You</a></li>
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
    <script src="js/product_search_filter.js"></script>
    <!-- swipper js link  -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
</body>

</html>