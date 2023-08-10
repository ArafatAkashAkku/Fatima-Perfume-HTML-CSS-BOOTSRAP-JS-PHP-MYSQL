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
    <link rel="stylesheet" href="css/signup.css">
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

        <div class="d-flex flex-column align-items-center justify-content-center p-5 bg-warning">
            <div class="bg-light p-3 res-width">
                <h2 class="text-muted text-center pt-2">Enter your signup details</h2>
                <form class="p-3" action="signupprocessing.php" method="POST" autocomplete="off">
                    <div class="form-group py-2">
                        <div class="input-field">
                            <input type="test" name="username" placeholder="Enter your Name" required class="form-control px-3 py-2">
                        </div>
                    </div>
                    <div class="form-group py-2">
                        <div class="input-field">
                            <input type="email" name="useremail" placeholder="Enter your Email" required class="form-control px-3 py-2">
                        </div>
                    </div>
                    <div class="form-group py-2">
                        <div class="input-field">
                            <input type="password" name="userpassword" placeholder="Enter your Password" required class="form-control px-3 py-2 ">
                        </div>
                    </div>
                    <button class="btn btn-width btn-outline-warning bg-warning text-dark" name="submit" value="submit">Sign Up</button>
                    <div class="text-center mt-3 text-muted">Already a member? <a href="login.php">Sign In</a></div>
                    <div class="text-center mt-3 text-muted">
                        <a href="#" id="forgot">Forgot Password?</a>
                    </div>
                </form>
            </div>
        </div>

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
    <script src="js/signup.js"></script>
    <!-- swipper js link  -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!-- internal script link  -->
</body>

</html>