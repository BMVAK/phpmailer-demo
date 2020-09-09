<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'c:xampp/htdocs/demo/mailtrap/vendor/autoload.php';
$mail = new PHPMailer;
$body = 'test mail';
$mail->isSMTP();
$mail->Host = 'lbits.co';
$mail->SMTPAuth = true;
$mail->Username = 'akhil@lbits.co'; 
$mail->Password = 'Akhil@123'; 
$mail->SMTPSecure = 'tls';
$mail->Port = 465; 
$mail->SMTPKeepAlive = true;

$mail->setFrom('mail.lbits.co', 'List manager');
$mail->Subject = "testing ";

$users = [
  ['email' => 'mail.lbits.co', 'name' => 'ak'],
  ['email' => 'akhilkumarboorlagadda@gmail.com', 'name' => 'bak']
];

foreach ($users as $user) {
  $mail->addAddress($user['email'], $user['name']);

  $mail->Body = "<h2>Hello, {$user['name']}!</h2> <p>How are you?</p>";
  $mail->AltBody = "Hello, {$user['name']}! \n How are you?";

  try {
      $mail->send();
      echo "Message sent to: ({$user['email']}) {$mail->ErrorInfo}\n";
  } catch (Exception $e) {
      echo "Mailer Error ({$user['email']}) {$mail->ErrorInfo}\n";
  }

  $mail->clearAddresses();
}

$mail->smtpClose();