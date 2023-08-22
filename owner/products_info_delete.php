<?php
include("../config.php");
session_start();
if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE from `all_products_info` where id=$id";
        $result = mysqli_query($con, $sql);
        if($result){
        echo "
            <script>
            alert('Data deleted');
           window.location.href='owner_dashboard.php';
            </script>
            ";
        }else{
            echo "
            <script>
            alert('Data not deleted');
           window.location.href='owner_dashboard.php';
            </script>
            ";
        }

}
?>
