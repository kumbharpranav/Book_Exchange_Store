<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<a href="#">
    <img src="images/bs.png" width="150px" height="100px">
</a>
    <div class="login-container">
        <h3>Login to Your Account</h3>
        <form action="login-process.php" method="POST">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
           
            <button type="submit" class="login-btn">Login</button>
        
        <div class="separator">or
        <?php
include 'google.php';
if (!isset($_SESSION['access_token'])) {
    $loginUrl = $google_client->createAuthUrl();
    echo '<a href="' . htmlspecialchars($loginUrl) . '" class="google-btn"><center><img src="images/google.png" alt="Google sign-in">
    </a>';
}
?></div>

    </div>
    </form>
</body>
</html>
