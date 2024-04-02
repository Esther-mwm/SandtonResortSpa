<?php
include('connection.php');

// Check if the form is submitted
if(isset($_POST['save'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $dob = $_POST['dob'];
    $email_opt_in = isset($_POST['email_opt_in']) ? 1 : 0; // Check if the email opt-in is selected

    // Validate inputs
    if($fullname == "" || $email == "" || $username == "" || $password == "" || $confirm_password == "" || $dob == "") {
        $msg = "<h4 style='color:red'>Please fill in all the fields</h4>";  
    } elseif($password != $confirm_password) {
        $msg = "<h4 style='color:red'>Passwords do not match. Please re-enter.</h4>";
    } else {
        // Check if the email or username already exists
        $check_email_username_sql = mysqli_query($con, "SELECT * FROM users WHERE email='$email' OR username='$username'");
        if(mysqli_num_rows($check_email_username_sql) > 0) {
            $msg = "<h4 style='color:red'>An account with this email or username already exists.</h4>";    
        } else {
            // Insert new user into the 'users' table
            $sql_users = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
            if(mysqli_query($con, $sql_users)) {
                // Get the user ID of the newly inserted user
                $user_id = mysqli_insert_id($con);
                
                // Insert user details into the 'user_details' table
                $sql_user_details = "INSERT INTO user_details (id, fullname, email, username, dob, email_opt_in) VALUES ('$user_id', '$fullname', '$email', '$username', '$dob', '$email_opt_in')";
                if(mysqli_query($con, $sql_user_details)) {
                    $msg = "<h4 style='color:green'>Account created successfully. You can now login.</h4>"; 
                } else {
                    $msg = "<h4 style='color:red'>Error in saving user details. Please try again later.</h4>"; 
                }
            } else {
                $msg = "<h4 style='color:red'>Error in saving data. Please try again later.</h4>"; 
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="icon" type="image/x-icon" href=".././sandton icon.ico">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <?php echo isset($msg) ? $msg : ""; ?>
        <form id="registerForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <input type="text" name="fullname" placeholder="Full Name" required><br><br>
            <input type="text" name="email" placeholder="Email" required><br><br>
            <input type="text" name="username" placeholder="Username" required><br><br>
            <input type="password" name="password" placeholder="Password" required><br><br>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required><br><br>
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required><br><br>
            <input type="checkbox" id="email_opt_in" name="email_opt_in">
            <label for="email_opt_in"> (Optional) It's okay to send me emails with Sandton updates and special offers. You can opt out at any time.</label><br><br>
            <input type="submit" name="save" value="Register">
        </form>
        <div class="register-link">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>
    <script>
        // Redirect to login page after form submission
        document.getElementById("registerForm").addEventListener("submit", function() {
            window.location.href = "login.php";
        });
    </script>
</body>
</html>
