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
    <?php include("include/header.php") ?>
    <!-- header end  -->

    <!-- main start  -->
    <main>

        <div class="mx-4">
            <div class="row">
                <div class="col-12 text-center">
                    <h4>Product Filter Search</h4>
                    <h6 class="text-end text-decoration-underline filter-click">Filter Search Click</h6>
                </div>
                <!-- Brand List  -->
                <div class="col-md-3 col-6 filter-show">
                    <form action="product_search_filter.php" method="GET">
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
                                            <label for="<?= $designerlist['designer']; ?>">
                                                <input class="bg-warning" type="checkbox" id="<?= $designerlist['designer']; ?>" name="designers[]" value="<?= $designerlist['id']; ?>" <?php if (in_array($designerlist['id'], $checked)) {
                                                                                                                                                                                            echo "checked";
                                                                                                                                                                                        } ?> />
                                                <?= $designerlist['designer']; ?>
                                            </label>
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
                                $designerschecked = [];
                                $designerschecked = $_GET['designers'];
                                foreach ($designerschecked as $rowbrand) {
                                    // echo $rowbrand;
                                    $products = "SELECT * FROM all_products_info WHERE designer_id IN ($rowbrand)";
                                    $products_run = mysqli_query($con, $products);
                                    if (mysqli_num_rows($products_run) > 0) {
                                        foreach ($products_run as $proditems) :
                            ?>
                                            <div class="col-md-3 col-6 mt-3 text-center">
                                                <div class="border border-warning p-2">
                                                    <img src="<?= $proditems['product_image']; ?>" class="img-fluid mb-3 bg-light error-img" alt="Perfume" loading="lazy">
                                                    <a href="product_details.php?id=<?=$proditems['id'];?>">
                                                        <h5><?= $proditems['designer']; ?></h5>
                                                    </a>
                                                    <p>Price:<?= $proditems['price']; ?></p>
                                                    <a href="#">Add to Cart</a>
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
                                                <img src="<?= $proditems['product_image']; ?>" class="img-fluid mb-3 bg-light error-img" alt="Perfume" loading="lazy">
                                                <a href="product_details.php?id=<?=$proditems['id'];?>">
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

    </main>
    <!-- main end  -->

    <!-- footer start  -->
    <?php include("include/footer.php") ?>
    <!-- footer end  -->

    <!-- bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- external js link  -->
    <!-- <script src="js/index.js"></script> -->
    <!-- swipper js link  -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        // product search filter 
        const filterClick = document.querySelector(".filter-click");
        const filterShow = document.querySelector(".filter-show");

        filterClick.onclick = () => {
            console.log("clicked")
            filterShow.classList.toggle("active");
            if (filterShow.classList.contains("active")) {
                filterClick.innerHTML = "Filter Search Remove";
            } else {
                filterClick.innerHTML = "Filter Search Click";
            }
        }
    </script>
</body>

</html>