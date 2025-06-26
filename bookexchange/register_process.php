<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];
}
   

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?,?)");
    $stmt->bind_param("ss", $username, $password);

    // Execute the statement
    if ($stmt->execute()) {
        $url = "indexuser.php";
        header("Location: " . $url);
    exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement
    $stmt->close();


// Close connection
$conn->close();
?>
