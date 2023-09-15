<?php
// Include configuration file  
require_once 'config.php';
include 'dbConnect.php';
session_start();


if (isset($_POST['item']) && $_POST['item'] != "") {
    $item = $_POST['item'];
    $result = mysqli_query($con, "SELECT * FROM `all_products_info` WHERE `item`='$item'");
    $row = mysqli_fetch_assoc($result);
    $name = $row['designer'];
    $price = $row['price'];
    $item = $row['item'];
    $image = $row['product_image'];
    $id = $row['id'];

    $cartArray = array(
        $item => array(
            'name' => $name,
            'price' => $price,
            'quantity' => 1,
            'item' => $item,
            'image' => $image,
            'id' => $id
        )
    );

    if (empty($_SESSION["shopping_cart"])) {
        $_SESSION["shopping_cart"] = $cartArray;
        echo "
        <script>
        alert('Product is added to your cart!');
        </script>
        ";
    } else {
        $array_keys = array_keys($_SESSION["shopping_cart"]);
        if (in_array($item, $array_keys)) {
            echo "
            <script>
            alert('Product is already added to your cart!');
            </script>
            ";
        } else {
            $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"], $cartArray);
            echo "
        <script>
        alert('Product is added to your cart!');
        </script>
        ";
        }
    }
}

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

</head>

<body class="overflow-x-hidden">

    <!-- header start  -->
    <?php include("include/header.php") ?>
    <!-- header end  -->

    <!-- main start  -->
    <main>
        <section>
            <div class="row mx-2 mb-3">
                <div class="col-sm-12 col-12 text-center">
                    <h4 class="my-3">Product Details</h4>
                </div>
                <?php
                $ret = mysqli_query($con, "select * from all_products_info where id='$id'");
                $rowitems = mysqli_fetch_array($ret, MYSQLI_ASSOC);
                ?>
                <div class="col-sm-6 col-12">
                    <img src="images/products/<?php
                                                echo ($rowitems['id']);
                                                ?>/<?php
                                                    echo ($rowitems['product_image']);
                                                    ?>" class="product-detail-img mb-3 bg-light error-img" alt="Perfume" loading="lazy">
                </div>
                <div class="col-sm-6 col-12 d-flex flex-column justify-content-center gap-3">
                    <h3><?php
                        echo ($rowitems["designer"]);
                        ?></h3>
                    <p>Price: $<?php
                                echo ($rowitems["price"]);
                                ?></p>

                    <div class="d-flex">
                        <form action="" method="post">
                            <input type="hidden" name="item" value="<?php
                                                                    echo htmlentities($rowitems["item"]);
                                                                    ?>">
                            <button type="submit" class="btn btn-link text-decoration-none border border-warning text-dark px-4 py-1 rounded-pill bg-warning mb-2">Add to Cart</button>
                        </form>
                    </div>
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
                <div class="px-5 swipper-arrow">
                    <div class="swiper slider-for-all mt-3 d-flex align-items-center">
                        <div class="swiper-wrapper">
                            <?php
                            $ret = mysqli_query($con, "select * from all_products_info where visibility='toppicksfy' order by `id` desc");
                            while ($row = mysqli_fetch_array($ret)) {
                            ?>
                                <div class="swiper-slide bg-light border border-warning">
                                    <form action="" method="post">
                                        <div class="product-img">
                                            <img src="images/products/<?php
                                                                        echo htmlentities($row['id']);
                                                                        ?>/<?php
                                                                            echo htmlentities($row['product_image']);
                                                                            ?>" class="mb-3 bg-light error-img product-img" alt="Perfume" loading="lazy">
                                        </div>
                                        <a class="text-dark text-decoration-none" href="product_details.php?id=<?php
                                                                                                                echo htmlentities($row["id"]);
                                                                                                                ?>">
                                            <h3><?php
                                                echo htmlentities($row["designer"]);
                                                ?></h3>
                                        </a>
                                        <p>Price: $<?php
                                                    echo htmlentities($row["price"]);
                                                    ?></p>
                                        <input type="hidden" name="item" value="<?php
                                                                                echo htmlentities($row["item"]);
                                                                                ?>">
                                        <button type="submit" class="btn btn-link text-decoration-none border border-warning text-dark px-4 py-1 rounded-pill bg-warning mb-2">Add to Cart</button>
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