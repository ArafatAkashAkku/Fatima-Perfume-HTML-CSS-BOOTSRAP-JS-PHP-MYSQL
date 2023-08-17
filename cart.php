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
    <title>Cart |
        <?php
        $ret = mysqli_query($con, "select * from website_info");
        while ($row = mysqli_fetch_array($ret)) {
            echo htmlentities($row["website_name"]);
        } ?></title>

</head>

<body class="overflow-x-hidden">
    <?php
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    ?>
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
                    <div class="col-lg-8 overflow-scroll">
                        <table class="table">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">Serial No.</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Item Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Remove</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                $serial = 0;
                                if (isset($_SESSION['cart'])) {
                                    foreach ($_SESSION['cart'] as $key => $value) {
                                        $serial = $serial + 1;
                                        echo "
                                <tr>
                                <th>$serial</th>
                                <td>$value[Item_Name]</td>
                                <td>$$value[Price]<input type='hidden' class='iprice' value='$value[Price]'></td>
                                <td><input class='text-center iquantity' onchange='subTotal()' type='number' value='$value[Quantity]' min='1' max='10'></td>
                                <td>$<span class='itotal'></span></td>
                                <td>
                                <form action='manage_cart.php' method='POST'>
                                <button name='Remove_Item' class='btn btn-sm btn-outline-danger'>Remove</button>
                                <input type='hidden' name='Upc' value='$value[Upc]'>
                                </form>
                                </td>
                            </tr>
                            ";
                                    }
                                }
                                else{
                                    echo"
                                    <tr>
                                    <th>$serial</th>
                                    <td colspan='5'>No Items</td>
                                </tr>
                                    ";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-4">
                        <div class="border bg-light rounded p-4">
                            <h3>Grand Total:</h3>
                            <h5 class="text-right">$<span id="gtotal"></span></h5>
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
    <?php
    } else {
    echo "<script>
            alert('You need to log in first');
            window.location.href='login.php';
            </script>";
    }
    ?>


    <!-- bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- external js link  -->
    <script src="js/index.js"></script>
    <!-- swipper js link  -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        let iprice = document.getElementsByClassName('iprice');
        let iquantity = document.getElementsByClassName('iquantity');
        let itotal = document.getElementsByClassName('itotal');
        let gtotal = document.getElementById("gtotal");
        let gt = 0;

        function subTotal() {
            gt = 0
            for (i = 0; i < iprice.length; i++) {
                itotal[i].innerText = (iprice[i].value) * (iquantity[i].value);
                gt = gt + (iprice[i].value) * (iquantity[i].value);
            }
            gtotal.innerText = gt;
        }
        subTotal();
    </script>

</body>

</html>