<?php 

include("config.php");

  if (isset($_POST['submit'])) {

    $username = $_POST['username'];

    $useremail = $_POST['useremail'];

    $userpassword = $_POST['userpassword'];

    $sql = "INSERT INTO `user_info`(`user_email`, `user_password`, `user_name`) 

           VALUES ('$useremail','$userpassword','$username')";

    $result = $con->query($sql);

    if ($result == TRUE) {

        header("Location: login.php?Account Created Successfully");

        exit();
        ?>
        <script>
            alert("Account Created Successfully")
        </script>

        <?php

    }else{

        header("Location: login.php?Error Occured");

        exit();

    }

    $con->close();

  } 

?> 