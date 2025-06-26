<?php
// Include PHPMailer autoload file
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';
require 'path/to/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Specify your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'bookstore@grr.la'; // SMTP username
    $mail->Password = ''; // SMTP password
    $mail->SMTPSecure = 'tls'; // Enable TLS encryption; `ssl` also accepted
    $mail->Port = 587; // TCP port to connect to

    // Sender and recipient settings
    $mail->setFrom('pkumbhar@asmedu.org', 'BookBliss Barter');
    $mail->addAddress('kumbharpranav16@gmail.com', 'Recipient Name'); // Add a recipient

    // Email content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Test Email';
    $mail->Body = 'This is a test email sent using PHPMailer in XAMPP.';

    // Send email
    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
