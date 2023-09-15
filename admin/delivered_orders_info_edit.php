<?php
require_once '../config.php';
include '../dbConnect.php';
session_start();
if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "UPDATE `orders` SET `deliverystatus`='pending' where id=$id";
        $result = mysqli_query($con, $sql);
        if($result){
        echo "
            <script>
            alert('Order Pending');
           window.location.href='delivered_orders_info.php';
            </script>
            ";
        }else{
            echo "
            <script>
            alert('Order not pending');
           window.location.href='delivered_orders_info.php';
            </script>
            ";
        }

}
?>