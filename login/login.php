<?php
session_start();
error_reporting(1);

// Include database connection or any other necessary files
require('connection.php');

// Handle form submission
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate inputs
    if($username == "" || $password == "") {
        $error = "<h4 style='color:red'>Please fill in all the fields</h4>";  
    } else {
        // Check if user exists in the database
        $sql = mysqli_query($con, "SELECT * FROM users WHERE (username='$username' OR email='$username') AND password='$password'");
        if(mysqli_num_rows($sql) == 1) {
            $_SESSION['user_logged_in'] = $username;
            header('location: ../user/user.php'); 
            exit();
        } else {
            $error = "<h4 style='color:red'>Invalid login details</h4>"; 
        } 
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login Page</title>
    <link rel="icon" type="image/x-icon" href=".././sandton icon.ico">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <h2>User Login</h2>
        <?php echo isset($error) ? $error : ""; ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <input type="text" name="username" placeholder="Username or Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="login" value="Login">
        </form>
        <div class="forgot-password">
            <a href="forgot.php">Forgot password?</a>
        </div>
        <div class="register-link">
            <p>Don't have an account? <a href="register.php">Register here</a></p>
            <p>Admin login <a href="adminlog.php">Admin Login</a></p>
        </div>
    </div>
</body>
</html>
