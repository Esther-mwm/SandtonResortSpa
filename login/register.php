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
