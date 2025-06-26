<?php
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $username = $_POST['username'];
    $email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE users SET username=?, email=? WHERE id=?");
    $stmt->bind_param("ssi", $username, $email, $id);
    $stmt->execute();

    header("Location: displayUsers.php");
    exit();
} else {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM users WHERE id = $id");
    $row = $result->fetch_assoc();
}

?>

<form action="updateUser.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label for="username">Username:</label>
    <input type="text" name="username" value="<?php echo $row['username']; ?>"><br>
    <label for="email">Email:</label>
    <input type="email" name="email" value="<?php echo $row['email']; ?>"><br>
    <input type="submit" value="Update User">
</form>
