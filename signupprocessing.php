<?php

include("config.php");
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email, $v_code)
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
  $mail->Subject = 'Email Verification for Fatima Perfumes & Gift Inc';
  $mail->Body    = "Thanks for your registration. <br>
  Click the link below to verify your email address <a href='http://localhost/perfume/verify.php?email=$email&v_code=$v_code'>Verifiy</a>";
  $mail->send();
  return true;
} catch (Exception $e) {
 return false;
}
}


if (isset($_POST['submit'])) {
  $user_exist_query = "SELECT * from `user_info` WHERE `email`='$_POST[email]' AND `verified`=1";
  $result = mysqli_query($con, $user_exist_query);
  if ($result) {
    if (mysqli_num_rows($result) > 0) {
      $result_fetch = mysqli_fetch_assoc($result);
      if ($result_fetch['email'] == $_POST['email']) {
        echo "
         <script>
         alert('$result_fetch[email] - Email already taken');
         window.location.href='signup.php';
         </script>
         ";
      }
      else{
        echo "
        <script>
        alert('$result_fetch[email] - Email available for registration');
        </script>
    ";
      }
    } else {
      $v_code = bin2hex(random_bytes(16));
      $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
      $query = "INSERT INTO `user_info`(`email`, `password`,`fullname`,`v_code`,`verified`) VALUES ('$_POST[email]','$password','$_POST[fullname]', '$v_code','0')";
      if(mysqli_query($con,$query) && sendMail($_POST['email'],$v_code))
      {
        echo "
        <script>
        alert('Registration successful. Please check your email');
        window.location.href='login.php';
        </script>
        ";

      }else{
        echo "
        <script>
        alert('Server Down');
        window.location.href='signup.php';
        </script>
        ";
      }
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
