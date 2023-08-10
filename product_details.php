<?php
include("config.php");

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
        <div class="row mx-4 mb-3">
            <div class="col-sm-12 col-12 text-center">
                <h4>Product Details</h4>
            </div>
            <?php
            $ret = mysqli_query($con, "select * from all_products_info where id='$id'");
            while ($row = mysqli_fetch_array($ret)) {
            ?>
                <div class="col-sm-6 col-6">
                    <img src="<?php
                                echo htmlentities($row["product_image"]);
                                ?>" class="img-fluid mb-3 bg-light error-img" alt="Perfume" loading="lazy">
                </div>
                <div class="col-sm-6 col-6 d-flex flex-column justify-content-center gap-3">
                    <h3><?php
                        echo htmlentities($row["designer"]);
                        ?></h3>
                    <p>Price: <?php
                                echo htmlentities($row["price"]);
                                ?></p>
                    <a href="">Add to Cart</a>
                    <h6>Product Description</h6>
                    <p><?php
                                echo htmlentities($row["description"]);
                                ?></p>
                </div>
            <?php
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

</body>

</html>