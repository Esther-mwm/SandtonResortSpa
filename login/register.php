<?php
// Include database connection
include 'connection.php';

// Define variables and initialize with empty values
$fullname = $email = $username = $password = $confirm_password = $dob = $email_opt_in = "";
$fullname_err = $email_err = $username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate fullname
    if (empty(trim($_POST["fullname"]))) {
        $fullname_err = "Please enter your full name.";
    } else {
        $fullname = trim($_POST["fullname"]);
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email address.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 8) {
        $password_err = "Password must have at least 8 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Passwords do not match.";
        }
    }

    // Validate date of birth
    if (empty(trim($_POST["dob"]))) {
        $dob_err = "Please enter your date of birth.";
    } else {
        $dob = trim($_POST["dob"]);
    }

    // Check input errors before inserting into database
    if (empty($fullname_err) && empty($email_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($dob_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO Users (FullName, Email, Username, Password, DateOfBirth) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_fullname, $param_email, $param_username, $param_password, $param_dob);

            // Set parameters
            $param_fullname = $fullname;
            $param_email = $email;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password for security
            $param_dob = $dob;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to login page after successful registration
                header("location: login.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($mysqli);
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
        <form id="registerForm" action="login.php" method="POST" onsubmit="return validateForm()">
        <input type="text" name="fullname" placeholder="Full Name" required><br><br>
            <input type="text" name="email" placeholder="Email" required><br><br>
            <input type="text" name="username" placeholder="Username" required><br><br>
            <input type="password" name="password" placeholder="Password" required><br><br>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required><br><br>
            <label for="dob">Date of Birth:</label>
            <input type="date" id="dob" name="dob" required><br><br>
            <input type="checkbox" id="email_opt_in" name="email_opt_in">
            <label for="email_opt_in"> (Optional) It's okay to send me emails with Sandton updates and special offers. You can opt out at any time.</label><br><br>
            <input type="submit" value="Register">
        </form>
        <div class="register-link">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>
    <script>
        function validateForm() {
            var password = document.getElementById("password").value;
            var confirm_password = document.getElementById("confirm_password").value;

            if (password !== confirm_password) {
                alert("Passwords do not match. Please re-enter.");
                return false;
            }
            return true;
        }

        // Redirect to login page after form submission
        document.getElementById("registerForm").addEventListener("submit", function() {
            window.location.href = "login.php";
        });
    </script>
</body>
</html>
