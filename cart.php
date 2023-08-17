<?php
include("config.php");
// error_reporting(0);
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
    <title>Cart |
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

        <div class="mx-4 text-center">
            <div class="row">
                <div class="col-12 text-center">
                    <h4>My Cart</h4>
                </div>
                <div class="col-lg-8">
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">Serial No.</th>
                                <th scope="col">Item Name</th>
                                <th scope="col">Item Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            $total = 0;
                            $serial = 0;
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $key => $value) {
                                    $total = $total + $value['Price'];
                                    $serial = $serial + 1;
                                    echo "
                                <tr>
                                <th>$serial</th>
                                <td>$value[Item_Name]</td>
                                <td>$value[Price]</td>
                                <td><input class='text-center' type='number' value='$value=[Quantity]' min='1' max='10'></td>
                                <td>
                                <form action='manage_cart.php' method='POST'>
                                <button name='Remove_Item' class='btn btn-sm btn-outline-danger'>Remove</button>
                                <input type='hidden' value='$value=[Item_Name]' name='Item_Name'>
                                </form>
                                </td>
                            </tr>
                            ";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-4">
                    <div class="border bg-light rounded p-4">
                        <h3>Total:</h3>
                        <h5 class="text-right"><?php echo $total ?></h5>
                        <form action="">
                            <button class="btn btn-primary btn-block">Purchase</button>
                        </form>
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
    <script src="js/index.js"></script>
    <!-- swipper js link  -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

</body>

</html>