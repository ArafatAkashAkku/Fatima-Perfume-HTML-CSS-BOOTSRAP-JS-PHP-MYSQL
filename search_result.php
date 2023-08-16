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

        <div class="card-body row mx-4 mb-3">
            <div class="col-12 mt-3 text-center">
                <h4>Search Results For <?php if (isset($_GET['search'])) {
                                            echo $_GET['search'];
                                        } ?></h4>
            </div>
            <?php
            if (isset($_GET['search'])) {
                $filtervalues = $_GET['search'];
                $query = "SELECT * FROM all_products_info WHERE CONCAT(designer,description) LIKE '%$filtervalues%' ";
                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $items) {
            ?>
                        <div class="col-md-4 col-6 mt-3 text-center">
                            <div class="border border-warning p-2">
                                <img src="<?= $items['product_image']; ?>" class="img-fluid mb-3 bg-light error-img" alt="Perfume" loading="lazy">
                                <a href="#">
                                    <h5><?= $items['designer']; ?></h5>
                                </a>
                                <p>Price:<?= $items['price']; ?></p>
                                <a href="#">Add to Cart</a>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="col-12 mt-3 text-center">
                        <div class="border border-warning p-2">
                            <h5><?php echo "No Items Found"; ?></h5>
                        </div>
                    </div>
            <?php

                }
            }
            ?>
        </div>

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
</body>

</html>