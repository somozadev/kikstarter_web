<?php

require 'PHPMailer.php';
require 'SMTP.php';
$mail = new PHPMailer();


  $mail_to = $_POST["mail_to"];
  echo $mail_to;
  $mail->CharSet = 'UTF-8';

  $body = 'Al suscribirte gratuitamente a nuestra newsletter tendrás acceso a toda la información de última hora sobre los proyectos que vayamos incorporando.';

  $mail->IsSMTP();
  $mail->Host       = 'smtp.gmail.com';
  $mail->SMTPSecure = 'tls';
  $mail->Port       = 587;
  $mail->SMTPDebug  = 1;
  $mail->SMTPAuth   = true;
  $mail->Username   = 'somcas99@gmail.com';
  $mail->Password   = 'uem12345';
  $mail->SetFrom('somcas99@gmail.com', "Somcas");
  $mail->AddReplyTo('no-reply@mycomp.com', 'no-reply');
  $mail->Subject    = 'Confirmación de suscripción a nuestra newsletter!!';
  $mail->MsgHTML($body);

  $mail->AddAddress($mail_to, 'Zark');
  $mail->send();

