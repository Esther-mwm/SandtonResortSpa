<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="icon" type="image/x-icon" href=".././sandton icon.ico">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="../user/user.php" method="POST">
            <input type="text" name="username" placeholder="Username or Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
        <div class="forgot-password">
            <a href="forgot.php">Forgot password?</a>
        </div>
        <div class="register-link">
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </div>
</body>
</html>
