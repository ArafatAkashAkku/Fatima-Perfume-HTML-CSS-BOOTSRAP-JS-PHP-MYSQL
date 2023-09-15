<?php
require_once '../config.php';
include '../dbConnect.php';
session_start();
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
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <!-- datatables net  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- website title  -->
    <title>Products Info Edit |
        <?php
        $ret = mysqli_query($con, "select * from website_info");
        while ($row = mysqli_fetch_array($ret)) {
            echo htmlentities($row["website_name"]);
        } ?></title>

</head>

<body class="overflow-x-hidden">
    <?php
    if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] == true) {
    ?>
        <!-- header start  -->
        <?php include("include/header.php") ?>
        <!-- header end  -->

        <!-- main start  -->
        <main>
            <div class="d-flex flex-column align-items-center justify-content-center p-5 bg-warning">
                <div class="bg-light p-3 res-width">
                    <h2 class="text-muted text-center pt-2">Update Products Info details</h2>
                    <?php
                    $ret = mysqli_query($con, "select * from all_products_info where id='$id'");
                    while ($row = mysqli_fetch_array($ret)) {
                    ?>
                        <form class="p-3" action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <h5 class="text-muted">ID</h5>
                                    <input type="text" name="id" disabled class="form-control px-3 py-2" value="<?php
                                                                                                                echo htmlentities($row["id"]);
                                                                                                                ?>">
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <h5 class="text-muted">Dept</h5>
                                    <input type="text" name="dept" class="form-control px-3 py-2" value="<?php
                                                                                                            echo htmlentities($row["dept"]);
                                                                                                            ?>">
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <h5 class="text-muted">Designer ID</h5>
                                    <select name="designerid" class="form-control px-3 py-2">
                                        <?php
                                        $ret = mysqli_query($con, "select * from product_designer_info");
                                        while ($rows = mysqli_fetch_array($ret)) {
                                        ?>
                                            <option <?php if ($rows["id"] == $row["designer_id"]) {
                                                        echo "selected";
                                                    } ?> value="<?php echo htmlentities($rows['id']); ?>"><?php
                                                                                                            echo htmlentities($rows["designer"]);
                                                                                                            ?></option>
                                        <?php
                                        }
                                        ?>

                                    </select>


                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <h5 class="text-muted">Designer</h5>
                                    <input type="text" name="designer" class="form-control px-3 py-2" value="<?php
                                                                                                                echo htmlentities($row["designer"]);
                                                                                                                ?>">
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <h5 class="text-muted">Item</h5>
                                    <input type="text" name="item" class="form-control px-3 py-2" value="<?php
                                                                                                            echo htmlentities($row["item"]);
                                                                                                            ?>">
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <h5 class="text-muted">Description</h5>
                                    <input type="text" name="description" class="form-control px-3 py-2" value="<?php
                                                                                                                echo htmlentities($row["description"]);
                                                                                                                ?>">
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <h5 class="text-muted">Upc</h5>
                                    <input type="text" name="upc" class="form-control px-3 py-2" value="<?php
                                                                                                        echo htmlentities($row["upc"]);
                                                                                                        ?>">
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <h5 class="text-muted">Price $</h5>
                                    <input type="text" name="price" class="form-control px-3 py-2" value="<?php
                                                                                                            echo htmlentities($row["price"]);
                                                                                                            ?>">
                                </div>
                            </div>
                            <div class="form-group py-2">
                                <div class="input-field">
                                    <h5 class="text-muted">Visibility</h5>
                                    <select name="visibility" class="form-control px-3 py-2">
                                        <option value="" <?php if ($row["visibility"] == "") {
                                                                echo "selected";
                                                            } ?>></option>
                                        <option value="bestsellers" <?php if ($row["visibility"] == "bestsellers") {
                                                                        echo "selected";
                                                                    } ?>>bestsellers</option>
                                        <option value="newarrivals" <?php if ($row["visibility"] == "newarrivals") {
                                                                        echo "selected";
                                                                    } ?>>newarrivals</option>
                                        <option value="toppicksfy" <?php if ($row["visibility"] == "toppicksfy") {
                                                                        echo "selected";
                                                                    } ?>>toppicksfy</option>
                                    </select>
                                    <h6 class="text-danger text-center">Select: bestsellers / newarrivals / toppicksfy <br>or you can also ignore.</h6>
                                </div>
                            </div>

                            <div class="form-group py-2">
                                <div class="input-field">
                                    <h5 class="text-muted">Photo</h5>
                                    <h6 class="text-muted">Old Image</h6>
                                    <img style="width: 200px;height:200px" class="error-img" loading="lazy" src="../images/products/<?php
                                                                                        echo htmlentities($row["id"]);
                                                                                        ?>/<?php
                                                                                            echo htmlentities($row["product_image"]);
                                                                                            ?>" alt="Perfume">
                                    <input type="hidden" name="oldimg" value="<?php
                                                                                echo htmlentities($row["product_image"]);
                                                                                ?>">
                                    <h6 class="text-muted">Update Image?</h6>
                                    <input type="file" name="newimg" class="form-control px-3 py-2">
                                </div>
                            </div>



                            <button class="btn btn-width btn-outline-warning bg-warning text-dark" name="submit" type="submit">Update</button>
                        </form>
                    <?php
                    }
                    ?>
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

    <?php
    if (isset($_POST['submit'])) {
        $user_exist_query = "SELECT * from `all_products_info` WHERE `id`='$id'";
        $result = mysqli_query($con, $user_exist_query);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                if ($_FILES["newimg"]["name"] != "") {
                    $productimage = $_FILES["newimg"]["name"];
                    $tempname = $_FILES["newimg"]["tmp_name"];
                    move_uploaded_file($tempname, "../images/products/$id/" . $productimage);

                        $query = "UPDATE `all_products_info` SET `dept`='$_POST[dept]',`designer_id`='$_POST[designerid]',`designer`='$_POST[designer]',`item`='$_POST[item]', `description`='$_POST[description]',`upc`='$_POST[upc]', `price`='$_POST[price]',`visibility`='$_POST[visibility]', `product_image`='$productimage' WHERE `id`='$id'";
                        if (mysqli_query($con, $query)) {
                            echo "
                            <script>
                            alert('Products info updated.');
                            window.location.href='products_info.php';
                            </script>
                            ";
                                        } else {
                                            echo "
                            <script>
                            alert('Server Down');
                            window.location.href='admin_dashboard.php';
                            </script>
                            ";
                                        }
                }else{
                    $productimage= $_POST['oldimg'];

                    $query = "UPDATE `all_products_info` SET `dept`='$_POST[dept]',`designer_id`='$_POST[designerid]',`designer`='$_POST[designer]',`item`='$_POST[item]', `description`='$_POST[description]',`upc`='$_POST[upc]', `price`='$_POST[price]',`visibility`='$_POST[visibility]',`product_image`='$productimage' WHERE `id`='$id'";
                if (mysqli_query($con, $query)) {
                    echo "
                        <script>
                        alert('Products info updated.');
                        window.location.href='products_info.php';
                        </script>
                        ";
                                } else {
                                    echo "
                        <script>
                        alert('Server Down');
                        window.location.href='admin_dashboard.php';
                        </script>
                        ";
                                }

                }
            }
        } else {
            echo "
        <script>
        alert('Can not run query');
        window.location.href='admin_dashboard.php';
        </script>
        ";
        }
    }

    ?>
    <!-- bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- external js link  -->
    <script src="js/index.js"></script>
    <!-- swipper js link  -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!-- jquery js  -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- datatables net  -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</body>

</html>