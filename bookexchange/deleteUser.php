<?php
include 'db_config.php';
$username = $_GET['username'];

if ($conn->query("DELETE FROM users WHERE username = $username")) {
    echo "User deleted successfully.";
} else {
    echo "Error deleting user: " . $conn->error;
}

header("Location: displayUsers.php");
?>
