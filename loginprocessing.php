<?php
session_start();
include("config.php");

if (isset($_POST['submit'])) {
    $query = " SELECT * FROM `user_info` WHERE `user_email`='$_POST[useremail]'";
    $result = mysqli_query($con, $query);
    if ($result) {
        if (mysqli_num_rows($result) == 1)
         {
            $result_fetch = mysqli_fetch_assoc($result);
            if ($result_fetch['verified'] == 1) {
                if (password_verify($_POST['userpassword'], $result_fetch['user_password'])) {
                    $_SESSION['logged_in'] = true;
                    $_SESSION['user_email'] = $result_fetch['user_email'];
                    $_SESSION['full_name'] = $result_fetch['full_name'];
                    header("location:index.php");
                } else {
                    echo "
                <script>
              alert('Incorrect password);
                window.location.href='login.php';
               </script>
                  ";
                }
               } else 
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
      window.location.href='login.php';
      </script>
      ";
    }
}
