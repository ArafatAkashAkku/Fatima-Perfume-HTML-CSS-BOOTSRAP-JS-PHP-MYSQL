<?php
require_once 'config.php'; 
include 'dbConnect.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $reset_token)
{
    require("PHPMailer/PHPMailer.php");
    require("PHPMailer/SMTP.php");
    require("PHPMailer/Exception.php");

    $mail = new PHPMailer(true);
    try {                 
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'arafatakash5@gmail.com';                     //SMTP username
        $mail->Password   = 'evlqvmxfagsegkud';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if 
      
        //Recipients
        $mail->setFrom('arafatakash5@gmail.com', 'Fatima Perfumes & Gift Inc');
        $mail->addAddress($email);     //Add a recipient
      
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Password Reset Link For Fatima Perfumes & Gift Inc';
        $mail->Body    = "We got a reset password request from you. <br>
        Click the link below to reset your password <a href='http://localhost/perfume/updatepassword.php?email=$email&resettoken=$reset_token'>Reset Password</a>";
      
        $mail->send();
        return true;
      } catch (Exception $e) {
       return false;
      }
}

if (isset($_POST['submit'])) {
    $query = " SELECT * FROM `user_info` WHERE `email`='$_POST[email]'";
    $result = mysqli_query($con, $query);
    if ($result) {
        if (mysqli_num_rows($result) == 1)
        {
            $reset_token=bin2hex(random_bytes(16));
            date_default_timezone_set('Asia/Dhaka');
            $date=date("Y-m-d");
            $query="UPDATE `user_info` SET `resettoken`='$reset_token',`resettokenexpire`='$date' WHERE `email`='$_POST[email]'";
            if(mysqli_query($con,$query) && sendMail($_POST['email'],$reset_token))
            {
                echo "
                <script>
                alert('Password reset link sent to mail');
                window.location.href='forgetpassword.php';
                </script>
                ";
            }
            else{
                echo "
                <script>
                alert('Server down!! Try again');
                window.location.href='forgetpassword.php';
                </script>
                ";
            }
        }
        else{
            echo "
            <script>
            alert('Email not found');
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






      