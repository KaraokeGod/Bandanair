<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

$email = 'austinly1997@gmail.com';
$name = 'Austin Ly';
$username = 'KaraokeGod';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->IsHTML(true);
$mail->Username = "bandanair2017@gmail.com";
$mail->Password = "ecommerce";
$mail->setFrom('bandanair2017@gmail.com', 'Bandanair');
$mail->addAddress($email, $name);
$mail->addEmbeddedImage('images/BandanAirThumbnail.png', 'Logo');
$mail->Subject = 'Bandanair Registration Success';
$mail->Body    = '<h2>Congratulations ' . $name . '!</h2>
<h3>You have registered an account with Bandanair.</h3>
<h3>Please log in using your username:</h3><h1>' . $username . '</h1><br/><br/>
<img src="cid:Logo"/>';
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
} ?>