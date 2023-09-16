<?php
require_once '../config.php';
include '../dbConnect.php';
session_start();
if (isset($_GET['txn_id'])) {
        $id = $_GET['txn_id'];
        $sql = "UPDATE `orders` SET `deliverystatus`='pending' where txn_id='$id'";
        $result = mysqli_query($con, $sql);
        if($result){
        echo "
            <script>
            alert('Order updated');
           window.location.href='delivered_orders_info.php';
            </script>
            ";
        }else{
            echo "
            <script>
            alert('Order not updated');
           window.location.href='delivered_orders_info.php';
            </script>
            ";
        }

}
?>