<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$smscode=($_GET['sms']);
$num=($_GET['amount']);
$payeremail=($_GET['payeremail']);


//Load Composer's autoloader
require 'vendor/autoload.php';

	$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
	try {
	    //Server settings
	    $mail->SMTPDebug = 2;                                 // Enable verbose debug output
	    $mail->isSMTP();                                      // Set mailer to use SMTP
	    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
	    $mail->SMTPAuth = true;                               // Enable SMTP authentication
	    $mail->Username = 'sofasapp@gmail.com';                 // SMTP username
	    $mail->Password = 'nokian73AA';                         // SMTP password
	    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	    $mail->Port = 587;                                    // TCP port to connect to

	    //Recipients
	    $mail->setFrom('sofasapp@gmail.com', 'SofaSMS');
	    $mail->addAddress("$payeremail");     // Add a recipient        

	    //Attachments
	    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

	    //Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = 'Your ' . $num . ' ' .'SMS code for sofasAPP';
	    $mail->Body    = '<h1>Thank you for purchasing &nbsp;' . $num . ' SMS package</h1></br><h2>Your SMS code is: ' . $smscode . '<br>enjoy!';

	    $mail->send();

	    $maillog = fopen("/var/www/ssmmss/maillog.txt", "a") or die("Unable to open file!");
	    fwrite($maillog,"Email: " . $payeremail . " Code: " . $smscode);
	    fclose($maillog);

	} catch (Exception $e) {
	    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
	}

header("Location: http://Sofasms.com/ssmmss/index.html");
