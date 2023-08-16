<?php
session_start();
include("../config.php");

if (isset($_POST['submit'])) {
    $query = " SELECT * FROM `admin_info` WHERE `admin_email`='$_POST[adminemail]'";
    $result = mysqli_query($con, $query);
    if ($result) {
        if (mysqli_num_rows($result) == 1)
         {
            $result_fetch = mysqli_fetch_assoc($result);
            if ($result_fetch['verified'] == 1) {
                if ($_POST['adminpassword']=== $result_fetch['admin_password']) {
                    $_SESSION['logged_in'] = true;
                    $_SESSION['admin_email'] = $result_fetch['admin_email'];
                    header("location:admin_dashboard.php");
                } else {
                    echo "
                <script>
              alert('Incorrect password);
                window.location.href='index.php';
               </script>
                  ";
                }
               } else 
               {
                echo "
      <script>
      alert('Admin not verified);
      window.location.href='index.php';
      </script>
      ";
               }
        } else {
            echo "
      <script>
      alert('Admin email not registered);
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
