<?php
session_start();
// Include configuration file 
require_once 'config.php';
include 'dbConnect.php';

$pageview = $_GET['getID'];
$selectproduct = mysqli_query($con, "select * from all_products_info where id = '$pageview' ");
$rowproduct = mysqli_fetch_array($selectproduct, MYSQLI_ASSOC);

$payment_id = $statusMsg = '';
$ordStatus = 'error';

// Check whether stripe checkout session is not empty
if (!empty($_GET['session_id'])) {
    $session_id = $_GET['session_id'];

    // Fetch transaction data from the database if already exists
    $sql = "SELECT * FROM orders WHERE checkout_session_id = '" . $session_id . "'";
    $result = $con->query($sql);
    if (!empty($result->num_rows) && $result->num_rows > 0) {
        $orderData = $result->fetch_assoc();

        $paymentID = $orderData['id'];
        $transactionID = $orderData['txn_id'];
        $paidAmount = $orderData['paid_amount'];
        $paidCurrency = $orderData['paid_amount_currency'];
        $paymentStatus = $orderData['payment_status'];

        $ordStatus = 'success';
        $statusMsg = 'Your Payment has been Successful!';
    } else {
        // Include Stripe PHP library 
        require_once 'stripe-php/init.php';

        // Set API key
        \Stripe\Stripe::setApiKey(STRIPE_API_KEY);

        // Fetch the Checkout Session to display the JSON result on the success page
        try {
            $checkout_session = \Stripe\Checkout\Session::retrieve($session_id);
        } catch (Exception $e) {
            $api_error = $e->getMessage();
        }

        if (empty($api_error) && $checkout_session) {
            // Retrieve the details of a PaymentIntent
            try {
                $intent = \Stripe\PaymentIntent::retrieve($checkout_session->payment_intent);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                $api_error = $e->getMessage();
            }

            // Retrieves the details of customer
            try {
                // Create the PaymentIntent
                $customer = \Stripe\Customer::retrieve($checkout_session->customer);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                $api_error = $e->getMessage();
            }

            if (empty($api_error) && $intent) {
                // Check whether the charge is successful
                if ($intent->status == 'succeeded') {
                    // Customer details
                    $name = $customer->name;
                    $email = $customer->email;

                    // Transaction details 
                    $transactionID = $intent->id;
                    $paidAmount = $intent->amount;
                    $paidAmount = ($paidAmount / 100);
                    $paidCurrency = $intent->currency;
                    $paymentStatus = $intent->status;

                    // Insert transaction data into the database 

                    $sql = "INSERT INTO orders(name,email,item_name,item_number,item_price,item_price_currency,paid_amount,paid_amount_currency,txn_id,payment_status,checkout_session_id,created,modified,deliverystatus) VALUES('" . $name . "','" . $email . "','" . $rowproduct['designer'] . "','" . $rowproduct['id'] . "','" . $rowproduct['price'] . "','" . $rowproduct['currency'] . "','" . $paidAmount . "','" . $paidCurrency . "','" . $transactionID . "','" . $paymentStatus . "','" . $session_id . "',NOW(),NOW(),'pending')";

                    $insert = $con->query($sql);
                    $paymentID = $con->insert_id;

                    $ordStatus = 'success';
                    $statusMsg = 'Your Payment has been Successful!';
                } else {
                    $statusMsg = "Transaction has been failed!";
                }
            } else {
                $statusMsg = "Unable to fetch the transaction details! $api_error";
            }

            $ordStatus = 'success';
        } else {
            $statusMsg = "Transaction has been failed! $api_error";
        }
    }
} else {
    $statusMsg = "Invalid Request!";
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

<body class="App">
    <?php
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    ?>
        <!-- header start  -->
        <?php include("include/header.php") ?>
        <!-- header end  -->
        <h1 class="<?php echo $ordStatus; ?> m-4 text-center"><?php echo $statusMsg; ?></h1>
        <div class="wrapper m-4">
            <?php if (!empty($paymentID)) { ?>
                <h4>Payment Information</h4>
                <p><b>Reference Number:</b> <?php echo $paymentID; ?></p>
                <p><b>Transaction ID:</b> <?php echo $transactionID; ?></p>
                <p><b>Paid Amount:</b> <?php echo $paidAmount . ' ' . $paidCurrency; ?></p>
                <p><b>Payment Status:</b> <?php echo $paymentStatus; ?></p>

                <h4>Product Information</h4>
                <p><b>Name:</b> <?php echo $rowproduct['designer']; ?></p>
                <p><b>Price:</b> <?php echo $rowproduct['price'] . ' ' . $rowproduct['currency']; ?></p>
            <?php } ?>
            <a href="index.php" class="btn-link">Back to Product Page</a>
        </div>
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
</body>

</html>