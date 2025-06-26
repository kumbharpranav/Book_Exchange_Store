<?php
include 'db_config.php'; // Make sure dbConfig.php includes proper database connection setup

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password']; // It's crucial to hash passwords before storing them

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare a SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hashed_password);

    // Execute the statement and check for errors
    if ($stmt->execute()) {
        echo "<p>New user added successfully.</p>";
        echo "<a href='displayUsers.php'>Back to User Management</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
