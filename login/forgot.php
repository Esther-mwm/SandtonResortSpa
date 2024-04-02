<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="icon" type="image/x-icon" href=".././sandton icon.ico">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <p>Enter your email address below and we'll send you instructions on how to reset your password.</p>
        <form action="password_reset.php" method="POST">
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="submit" value="Reset Password">
        </form>
        <div class="login-link">
            <p>Remembered your password? <a href="login.php">Login here</a></p>
        </div>
    </div>
</body>
</html>
