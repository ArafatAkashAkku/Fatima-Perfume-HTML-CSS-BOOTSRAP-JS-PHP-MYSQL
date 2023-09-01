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
    <!-- website title  -->
    <title>Update Password |
        <?php
        $ret = mysqli_query($con, "select * from website_info");
        while ($row = mysqli_fetch_array($ret)) {
            echo htmlentities($row["website_name"]);
        } ?></title>

</head>

<body class="overflow-x-hidden">

    <!-- header start  -->
    <?php include("include/header.php") ?>
    <!-- header end  -->

    <!-- main start  -->
    <main>

        <?php

        if (isset($_GET['email']) && isset($_GET['resettoken'])) {
            date_default_timezone_set('Asia/Dhaka');
            $date = date("Y-m-d");
            $query = " SELECT * FROM `user_info` WHERE `email`='$_GET[email]' AND `resettoken`='$_GET[resettoken]' AND `resettokenexpire`='$date'";
            $result = mysqli_query($con, $query);
            if ($result) {
                if (mysqli_num_rows($result) == 1) {
                    echo "
                    <div class='d-flex flex-column align-items-center justify-content-center p-5 bg-warning'>
                    <div class='bg-light p-3 res-width'>
                        <h2 class='text-muted text-center pt-2'>Enter your new password</h2>
                        <form class='p-3' action='updatepassword.php' method='POST' autocomplete='off'>
                            <div class='form-group py-2'>
                                <div class='input-field'> 
                                    <input type='password' id='myInput' name='password' placeholder='Enter your password' required class='form-control px-3 py-2'> 
                                </div>
                                <input type='hidden' name='email' value='$_GET[email]'> 
                            </div>
                            <div class='form-group py-2'>
                            <label for='showpass'>
                                <div class='input-field'>
                                    <input type='checkbox' id='showpass' onclick='myFunction()'>&nbsp;Show Password
                                </div>
                            </label>
                        </div>
                                <button class='btn btn-width btn-outline-warning bg-warning text-dark' name='submit' type='submit'>Update Password</button>
                        </form>
                    </div>
                </div>
        ";
                } else {
                    echo "
        <script>
        alert('Server down!! Try again');
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
    </main>
    <!-- main end  -->

    <!-- footer start  -->
    <?php include("include/footer.php") ?>
    <!-- footer end  -->


    <!-- bootstrap js link  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- external js link  -->
    <script src="js/index.js"></script>
    <!-- swipper js link  -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <!-- internal script link  -->
    <script>
        function myFunction() {
            let x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>

    <?php
    if (isset($_POST['submit'])) {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $update = "UPDATE `user_info` SET `password`='$password',`resettoken`=NULL,`resettokenexpire`=NULL WHERE `email`='$_POST[email]'";
        if (mysqli_query($con, $update)) {
            echo "
            <script>
            alert('Password changed successfully');
            window.location.href='login.php';
            </script>
            ";
        } else {
            echo "
        <script>
        alert('Server down!! Try again');
        window.location.href='index.php';
        </script>
        ";
        }
    }
    ?>
</body>

</html>