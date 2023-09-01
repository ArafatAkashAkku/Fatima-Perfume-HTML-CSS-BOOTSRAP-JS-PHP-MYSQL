<?php
require_once 'config.php';
include 'dbConnect.php';
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
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col" style="display:none;">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Item No</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Item Price</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Shipping Address</th>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $ret = mysqli_query($con, "select * from orders where email='$_SESSION[email]' or name='$_SESSION[fullname]'");
                    $serial = 0;
                    while ($row = mysqli_fetch_array($ret)) {
                        $serial = $serial + 1;
                    ?>
                        <tr>
                            <th scope="row"><?php echo $serial ?> </th>
                            <td style="display:none;"><?php
                                                        echo htmlentities($row["id"]);
                                                        ?> </td>
                            <td><?php
                                echo htmlentities($row["name"]);
                                ?> </td>
                            <td><?php
                                echo htmlentities($row["email"]);
                                ?></td>
                            <td>
                                <?php
                                $rets = mysqli_query($con, "select * from all_products_info");
                                $rows = mysqli_fetch_array($rets);
                                if ($rows["id"] === $row["item_number"]) {
                                    echo $rows["item"];
                                }
                                ?>
                            </td>
                            <td><?php
                                echo htmlentities($row["item_name"]);
                                ?> </td>
                            <td>$ <?php
                                    echo htmlentities($row["item_price"]);
                                    ?> </td>
                            <td><?php
                                echo htmlentities($row["payment_status"]);
                                ?> </td>
                            <td>
                                <?php
                                $rets = mysqli_query($con, "select * from user_info");
                                $rows = mysqli_fetch_array($rets);
                                if ($rows["fullname"] === $row["name"]) {
                                    echo $rows["address"];
                                } elseif ($rows["email"] === $row["email"]) {
                                    echo $rows["address"];
                                } else {
                                    echo "No Address";
                                }
                                ?>
                            </td>
                            <td><?php
                                echo htmlentities($row["txn_id"]);
                                ?> </td>
                            <td><?php
                                echo htmlentities($row["deliverystatus"]);
                                ?> </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col" style="display:none;">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Item No</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Item Price</th>
                        <th scope="col">Payment Status</th>
                        <th scope="col">Shipping Address</th>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">Status</th>
                    </tr>
                </tfoot>
            </table>
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
    <script>
        new DataTable('#example');
    </script>
</body>

</html>