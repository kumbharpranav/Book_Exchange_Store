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
    $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Password is correct, so start a new session
        $_SESSION['username'] = $username;

        // Redirect user to welcome page
        header("location: adminuser.php");
    } else {
        // Display an error message if password is not valid
        echo "The password you entered was not valid.";
    }
}
?>
