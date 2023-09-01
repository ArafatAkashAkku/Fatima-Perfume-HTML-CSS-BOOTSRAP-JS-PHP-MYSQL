<?php
require_once '../config.php';
include '../dbConnect.php';
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
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <!-- website title  -->
    <title>Dashboard |
        <?php
        $ret = mysqli_query($con, "select * from website_info");
        while ($row = mysqli_fetch_array($ret)) {
            echo htmlentities($row["website_name"]);
        } ?></title>

</head>

<body class="overflow-x-hidden bg-warning">
    <?php
    if (isset($_SESSION['owner_logged_in']) && $_SESSION['owner_logged_in'] == true) {
    ?>

        <!-- header start  -->
        <?php include("include/header.php") ?>
        <!-- header end  -->

        <!-- main start  -->
        <main>
            <div class="row d-flex justify-content-center m-3 p-3 gap-3 text-center">
                <div class="card col-sm-3 col-12">
                    <div class="card-body">
                        <h1 class="card-title">Total Users</h1>
                        <h2 class="card-text"> <?php $row = mysqli_num_rows(mysqli_query($con, "SELECT id from `user_info` WHERE `verified`=1 ORDER BY id"));
                                                echo $row; ?></h2>
                    </div>
                </div>

                <div class="card col-sm-3 col-12">
                    <div class="card-body">
                        <h1 class="card-title">Total Admin</h1>
                        <h2 class="card-text"> <?php $row = mysqli_num_rows(mysqli_query($con, "SELECT id from `admin_info` WHERE `verified`=1 ORDER BY id"));
                                                echo $row; ?></h2>
                    </div>
                </div>

                <div class="card col-sm-3 col-12">
                    <div class="card-body">
                        <h1 class="card-title">Total Products</h1>
                        <h2 class="card-text"> <?php $row = mysqli_num_rows(mysqli_query($con, "SELECT id from `all_products_info` ORDER BY id"));
                                                echo $row; ?></h2>
                    </div>
                </div>

                <div class="card col-sm-3 col-12">
                    <div class="card-body">
                        <h1 class="card-title">Total Orders</h1>
                        <h2 class="card-text"> <?php $row = mysqli_num_rows(mysqli_query($con, "SELECT * from `orders` ORDER BY id"));
                                                echo $row; ?></h2>
                    </div>
                </div>

                <div class="card col-sm-3 col-12">
                    <div class="card-body">
                        <h1 class="card-title">Total Delivery</h1>
                        <h2 class="card-text"> <?php $row = mysqli_num_rows(mysqli_query($con, "SELECT * from `orders` WHERE deliverystatus='delivered' ORDER BY id"));
                                                echo $row; ?></h2>
                    </div>
                </div>

                <div class="card col-sm-3 col-12">
                    <div class="card-body">
                        <h1 class="card-title">Pending Orders</h1>
                        <h2 class="card-text"> <?php $row = mysqli_num_rows(mysqli_query($con, "SELECT * from `orders` WHERE deliverystatus='pending' ORDER BY id"));
                                                echo $row; ?></h2>
                    </div>
                </div>

            </div>
        </main>
        <!-- main end  -->

        <!-- footer start  -->
        <?php include("include/footer.php") ?>
        <!-- footer end  -->
    <?php
    } else {
        echo "<script>
                alert('You need to log in first');
                window.location.href='index.php';
                </script>";
    }
    ?>

    <!-- bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- external js link  -->
    <script src="js/index.js"></script>
    <!-- swipper js link  -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

</body>

</html>