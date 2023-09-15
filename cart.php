<?php
require_once 'config.php';
include 'dbConnect.php';
session_start();

if (isset($_POST['action']) && $_POST['action'] == "remove") {
    if (!empty($_SESSION["shopping_cart"])) {
        foreach ($_SESSION["shopping_cart"] as $key => $value) {
            if ($_POST["item"] == $key) {
                unset($_SESSION["shopping_cart"][$key]);
                echo "
                <script>
                alert('Product is removed from your cart!');
                </script>
                ";
            }
            if (empty($_SESSION["shopping_cart"]))
                unset($_SESSION["shopping_cart"]);
        }
    }
}

if (isset($_POST['action']) && $_POST['action'] == "change") {
    foreach ($_SESSION["shopping_cart"] as &$value) {
        if ($value['item'] === $_POST["item"]) {
            $value['quantity'] = $_POST["quantity"];
            break; // Stop the loop after we've found the product
        }
    }
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
    <!-- datatables net  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
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
        <main class="mx-4 my-3 overflow-scroll">
            <div class="d-flex justify-content-between">
                <button class="btn btn-link text-decoration-none "><a class="text-decoration-none bg-warning text-dark px-3 py-1 border border-warning rounded" href="orderhistory.php">Order History</a></button>
                <button class="btn btn-link text-decoration-none "><a class="text-decoration-none bg-warning text-dark px-3 py-1 border border-warning rounded" href="index.php">Continue shopping</a></button>
            </div>
            <?php
            if (isset($_SESSION["shopping_cart"])) {
                $total_price = 0;
            ?>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">Product Image</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Items Total</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($_SESSION["shopping_cart"] as $product) {
                        ?>
                            <tr>
                                <td><img src='images/products/<?php
                                                                echo ($product['id']);
                                                                ?>/<?php echo $product["image"]; ?>' width="70" height="50" /></td>
                                <td><?php echo $product["name"]; ?></td>
                                <td>
                                    <form method='post' action=''>
                                        <input type='hidden' name='item' value="<?php echo $product["item"]; ?>" />
                                        <input type='hidden' name='action' value="change" />
                                        <select name='quantity' class='quantity' onchange="this.form.submit()">
                                            <option <?php if ($product["quantity"] == 1) echo "selected"; ?> value="1">1</option>
                                            <option <?php if ($product["quantity"] == 2) echo "selected"; ?> value="2">2</option>
                                            <option <?php if ($product["quantity"] == 3) echo "selected"; ?> value="3">3</option>
                                            <option <?php if ($product["quantity"] == 4) echo "selected"; ?> value="4">4</option>
                                            <option <?php if ($product["quantity"] == 5) echo "selected"; ?> value="5">5</option>
                                            <option <?php if ($product["quantity"] == 6) echo "selected"; ?> value="6">6</option>
                                            <option <?php if ($product["quantity"] == 7) echo "selected"; ?> value="7">7</option>
                                            <option <?php if ($product["quantity"] == 8) echo "selected"; ?> value="8">8</option>
                                            <option <?php if ($product["quantity"] == 9) echo "selected"; ?> value="9">9</option>
                                            <option <?php if ($product["quantity"] == 10) echo "selected"; ?> value="10">10</option>
                                        </select>
                                    </form>
                                </td>
                                <td><?php echo "$" . $product["price"]; ?></td>
                                <td><?php echo "$" . $product["price"] * $product["quantity"]; ?></td>
                                <td>
                                    <form method='post' action=''>
                                        <input type='hidden' name='item' value="<?php echo $product["item"]; ?>" />
                                        <input type='hidden' name='action' value="remove" />
                                        <button type='submit' class='remove px-3 py-1 bg-danger border text-light border-warning rounded'>Remove Item</button>
                                    </form>
                                </td>
                            </tr>
                    </tbody>
                <?php
                            $total_price += ($product["price"] * $product["quantity"]);
                        }
                ?>
                <td colspan="6" class="text-center">
                    <strong>TOTAL: <?php echo "$" . $total_price; ?></strong>
                </td>
                </table>
                <div class="bg-warning text-center border border-warning rounded">
                    <button class="btn btn-link text-decoration-none text-dark" id="payButton">Proceed to Checkout</button>
                </div>
                <div id="paymentResponse" class="text-center"></div>
            <?php
            } else {
                echo "<h3 class='text-center'>Your cart is empty!</h3>";
            }
            ?>
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
    <!-- jquery js  -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- datatables net  -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- <script>
        new DataTable('#example');
    </script> -->
    <!-- Stripe JavaScript library -->
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        var buyBtn = document.getElementById('payButton');
        var responseContainer = document.getElementById('paymentResponse');
        // Create a Checkout Session with the selected product
        var createCheckoutSession = function(stripe) {
            return fetch("stripe_charge.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    checkoutSession: 1,
                    Name: "Fatima Perfumes & Gift Inc",
                    ID: "Fatima Perfumes & Gift Inc",
                    Price: "<?php echo $total_price ?>",
                    Currency: "USD",
                }),
            }).then(function(result) {
                return result.json();
            });
        };

        // Handle any errors returned from Checkout
        var handleResult = function(result) {
            if (result.error) {
                responseContainer.innerHTML = '<p>' + result.error.message + '</p>';
            }
            buyBtn.disabled = false;
            buyBtn.textContent = 'Proceed to Checkout';
        };

        // Specify Stripe publishable key to initialize Stripe.js
        var stripe = Stripe('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

        buyBtn.addEventListener("click", function(evt) {
            buyBtn.disabled = true;
            buyBtn.textContent = 'Please wait for a minute...';
            createCheckoutSession().then(function(data) {
                if (data.sessionId) {
                    stripe.redirectToCheckout({
                        sessionId: data.sessionId,
                    }).then(handleResult);
                } else {
                    handleResult(data);
                }
            });
        });
    </script>
</body>

</html>