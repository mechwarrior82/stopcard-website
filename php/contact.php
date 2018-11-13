<?php
require_once('class.phpmailer-lite.php');

$name=urldecode($_POST[name]);
$email=urldecode($_POST[email]);
$phone=urldecode($_POST[phone]);
$message=urldecode($_POST[message]);
$tomail='sales@stopcard.com';
$subject="Contact from Website";

$headers="From: $name <$email>";





$message="$subject
<br><br>
NAME: $name
<br>
PHONE: $phone
<br>
EMAIL: $email
<br>
MESSAGE: $message
";

$plainmail="$subject

NAME: $name
PHONE: $phone
EMAIL: $email
MESSAGE: $message
";




$mail             = new PHPMailerLite(); // defaults to using php "Sendmail" (or Qmail, depending on availability)

$body             = $message;
$body             = eregi_replace("[\]",'',$body);

$mail->SetFrom("$email", "$name");

$address = $tomail;
$mail->AddAddress($address, "");

$mail->Subject    = $subject;

$mail->AltBody    = $plainmail; // optional, comment out and test

$mail->MsgHTML($body);

//$mail->AddAttachment("../../../Uploads/$FILENAME");      // attachment
//$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment

if(!$mail->Send()) {
  //echo "Mailer Error: " . $mail->ErrorInfo;
} else {
 //echo "Message sent to $tomail";
}


echo "Thanks!  We'll be in touch.";