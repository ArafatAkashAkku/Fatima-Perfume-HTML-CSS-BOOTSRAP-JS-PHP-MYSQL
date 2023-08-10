<?php
session_start();
include("config.php");

if (isset($_POST['useremail']) && isset($_POST['userpassword'])) {

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $useremail = validate($_POST['useremail']);

    $userpassword = validate($_POST['userpassword']);

    if (empty($useremail)) {

        header("Location: login.php?error=Email is required");
        exit();

    }else if(empty($userpassword)){

        header("Location: login.php?error=Password is required");

        exit();

    }else{

        $sql = "SELECT * FROM user_info WHERE user_email='$useremail' AND user_password='$userpassword'";

        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['user_email'] === $useremail && $row['user_password'] === $userpassword) {

                echo "Logged in!";

                $_SESSION['user_email'] = $row['user_email'];

                $_SESSION['user_name'] = $row['user_name'];

                $_SESSION['id'] = $row['id'];

                header("Location: home.php");

                exit();

            }else{

                header("Location: login.php?error=Incorect email or password");

                exit();

            }

        }else{

            header("Location: login.php?error=Incorect email or password");

            exit();

        }

    }

}else{

    header("Location: login.php");

    exit();

}