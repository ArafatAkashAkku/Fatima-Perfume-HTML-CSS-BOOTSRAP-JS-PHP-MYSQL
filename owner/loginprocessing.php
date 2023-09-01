<?php
session_start();
require_once '../config.php';
include '../dbConnect.php';

if (isset($_POST['submit'])) {
    $query = " SELECT * FROM `owner_info` WHERE `email`='$_POST[email]'";
    $result = mysqli_query($con, $query);
    if ($result) {
        if (mysqli_num_rows($result) == 1)
         {
            $result_fetch = mysqli_fetch_assoc($result);
            if ($result_fetch['verified'] == 1) {
                if ($_POST['password']==$result_fetch['password']) {
                    $_SESSION['owner_logged_in'] = true;
                    $_SESSION['email'] = $result_fetch['email'];
                    $_SESSION['id'] = $result_fetch['id'];
                    header("location:owner_dashboard.php");
                } else {
                    echo "<script>
                    alert('Incorrect password);
                     window.location.href='index.php';
                    </script>
                       ";
               
                }
               } 
               else 
               {
                echo "
      <script>
      alert('Email not verified contact developer);
      window.location.href='index.php';
      </script>
      ";
               }
        } else {
            echo "
      <script>
      alert('Email not registered);
      window.location.href='index.php';
      </script>
      ";
        }
    } else {
        echo "
      <script>
      alert('Can not run query');
      window.location.href='index.php';
      </script>
      ";
    }
}

?>
