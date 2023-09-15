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
    <title>Order History |
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
            <div class="d-flex justify-content-end">
                <button class="btn btn-link text-decoration-none "><a class="text-decoration-none bg-warning text-dark px-3 py-1 border border-warning rounded" href="index.php">Continue shopping</a></button>
            </div>
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Order Decription</th>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">Delivery Status</th>
                        <th scope="col">Order Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $ret = mysqli_query($con, "select * from orders where email='$_SESSION[email]'");
                    while ($row = mysqli_fetch_array($ret)) { ?>
                        <tr>
                            <td>
                                <table>
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Item Price</th>
                                        <th>Item Quantity</th>
                                        <th>Item No</th>
                                    </tr>
                                    <tr  class="text-center">
                                        <?php echo $row['orderdescription']; ?>
                                    </tr>
                                </table>
                            </td>
                            <td><?php echo $row["txn_id"]; ?></td>
                            <td><?php echo $row["deliverystatus"]; ?> </td>
                            <td><?php echo $row["modified"]; ?></td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th scope="col">Order Decription</th>
                        <th scope="col">Transaction ID</th>
                        <th scope="col">Delivery Status</th>
                        <th scope="col">Order Date</th>
                    </tr>
                </tfoot>
            </table>
            <?php
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
    <script>
        new DataTable('#example');
    </script>

</body>

</html>