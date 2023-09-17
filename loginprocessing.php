<?php
session_start();
require_once 'config.php'; 
include 'dbConnect.php';

if (isset($_POST['submit'])) {
    $query = " SELECT * FROM `user_info` WHERE `email`='$_POST[email]'";
    $result = mysqli_query($con, $query);
    if ($result) {
        if (mysqli_num_rows($result) == 1)
         {
            $result_fetch = mysqli_fetch_assoc($result);
            if ($result_fetch['verified'] == 1) {
                if (password_verify($_POST['password'], $result_fetch['password'])) {
                    $_SESSION['logged_in'] = true;
                    $_SESSION['email'] = $result_fetch['email'];
                    $_SESSION['id'] = $result_fetch['id'];
                    $_SESSION['fullname'] = $result_fetch['fullname'];
                    $_SESSION['phone'] = $result_fetch['phone'];
                    $_SESSION['address'] = $result_fetch['address'];
                    header("location:index.php");
                } else {
                    echo "<script>
                    alert('Incorrect password);
                     window.location.href='login.php';
                    </script>
                       ";
               
                }
               } 
               else 
               {
                echo "
      <script>
      alert('Email not verified check your email);
      window.location.href='login.php';
      </script>
      ";
               }
        } else {
            echo "
      <script>
      alert('Email not registered);
      window.location.href='signup.php';
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
