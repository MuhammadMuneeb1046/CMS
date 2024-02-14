<?php
include('query.php');
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

if(isset($_POST['sendEmail'])){
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'khubaibanees16@gmail.com';                     //SMTP username
    $mail->Password   = 'amxbumbeldwjfdty';                               //SMTP password
    $mail->SMTPSecure ="tls";             //Enable implicit TLS encryption
    $mail->Port= 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    //Recipients
    $mail->setFrom('khubaibanees16@gmail.com', 'khuabib');
    $mail->addAddress($_POST['uemail']);     //Add a recipient
   ;

   

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Thank You For visiting Here';
    $mail->Body    = 'We are really thanks to you we visiting our services side ';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<script>alert("Message has been sent");location.assign("index.php");</script>';
    $id =$_POST['id'];
    $query =  $pdo->prepare("update  couriers set status = 'active' where id = :id ");
    $query->bindParam('id',$id);
    $query->execute();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}





}