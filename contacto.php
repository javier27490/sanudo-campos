<?php
/**
 * @version 1.0
 */

 debug_to_console("0");


 require("Exception.php");
 require("PHPMailer.php");
 require("SMTP.php");

 include "emails/PHPMailer/PHPMailerAutoload.php";



 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;;
 debug_to_console("1");

 session_start();
 debug_to_console("2");


 function debug_to_console($data) {
     $output = $data;
     if (is_array($output))
         $output = implode(',', $output);

     echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
 }

 if(isset($_POST['send'])){

     // $email = $_POST['email'];
     $email = 'email@miod.com';
     $subject = '$subject';
     $message = 'message';


     //Load composer's autoloader
     // require 'vendor/autoload.php';

     // $mail = new PHPMailer(true);

     $mail = new PHPMailer();

     try {
         debug_to_console("3");
         //Server settings
         $mail->isSMTP();
         $mail->SMTPDebug = SMTP::DEBUG_SERVER;
         $mail->Host = 'c1450521.ferozo.com';
         // $mail->Host = 'aspmx.l.google.com';
         $mail->SMTPAuth = true;
         $mail->Username = 'info@sanudocampos.com';
         $mail->Password = 'indio566';
         $mail->SMTPOptions = array(
             'ssl' => array(
             'verify_peer' => false,
             'verify_peer_name' => false,
             'allow_self_signed' => true
             )
         );
         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
         $mail->Port = 465;
         // $mail->SMTPSecure = 'tls';
         // $mail->SMTPAuth = false;
         debug_to_console("4");
         //Send Email
         $mail->setFrom('info@sanudocampos.com');
         $mail->addReplyTo('info@sanudocampos.com');

         //Recipients
         $mail->addAddress('poramo@gmail.com');

         debug_to_console("5");
         //Content
         $mail->isHTML(true);
         $mail->Subject = $subject;
         $mail->Body    = $message;

         debug_to_console("6");
         $mail->send();
         debug_to_console("7");

        $_SESSION['result'] = 'Message has been sent';
 	     $_SESSION['status'] = 'ok';
        debug_to_console("8");
     } catch (Exception $e) {
       debug_to_console("10 {$mail->ErrorInfo}");;
 	    $_SESSION['result'] = 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
 	    $_SESSION['status'] = 'error';
     }

 	    header("location: index.html");
 }
 ?>
