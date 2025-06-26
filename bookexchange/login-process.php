<?php
session_start(); // Start a new session or resume the existing one

// Assuming you have database connection code in db.php
require 'db_config.php';

// Check if the form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Escape user inputs for security
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // SQL query to fetch information of registered users
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Password is correct, so start a new session
        $_SESSION['username'] = $username;

        // Redirect user to welcome page
        header("location: indexuser.php");
    } else {
        // Display an error message if password is not valid
        echo "The password you entered was not valid.";
    }
}
?>

<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer's files
require 'E:\xampp\htdocs\techtonic\PHPMailer\src\Exception.php';
require 'E:\xampp\htdocs\techtonic\PHPMailer\src\PHPMailer.php';
require 'E:\xampp\htdocs\techtonic\PHPMailer\src\SMTP.php';

// Database connection
require 'db_config.php';

function sendOtp($email, $otp) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'pkumbhar@asmedu.org'; // Your email
        $mail->Password = 'Pranav@17'; // Use an app-specific password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('pkumbhar@asmedu.org', 'TechTonic');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Your OTP Code';
        $mail->Body    = "Your OTP code is <b>$otp</b>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        error_log('Mailer Error: ' . $mail->ErrorInfo);
        return false;
    }
}

// Check if the form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Escape user inputs for security
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // SQL query to fetch information of registered users
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Password is correct, so start a new session
        $_SESSION['username'] = $username;

            // Generate a 6-digit OTP
            $otp = rand(100000, 999999);

            // Store OTP and email in session for verification
            $_SESSION['otp'] = $otp;
            $_SESSION['email'] = $email;

            // Send OTP to user's email
            if (sendOtp($email, $otp)) {
                echo 'OTP has been sent to your email.';
                header('Location: verify.html'); // Redirect to OTP verification page
                exit;
            } else {
                echo 'Failed to send OTP. Please try again.';
            }
        } else {
            // Display an error message if password is not valid
            echo "The password you entered was not valid.";
        }
    } else {
        echo "The username you entered was not found.";
    }

?>
