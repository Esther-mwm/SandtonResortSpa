<?php
// Include database connection
include 'connection.php';

// Check if ID is provided in the URL
if (isset($_GET['id'])) {
    $experienceID = $_GET['id'];

    // Fetch experience information from the database
    $query = "SELECT * FROM Experience WHERE ID = $experienceID";
    $result = mysqli_query($mysqli, $query);

    // Check if experience exists
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $service = $row['Service'];
        $price = $row['Price'];
    } else {
        // Experience not found, redirect to experience page
        header("Location: experience.php");
        exit();
    }
} else {
    // ID not provided, redirect to experience page
    header("Location: experience.php");
    exit();
}

// If form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize inputs
    $newService = mysqli_real_escape_string($mysqli, $_POST['service']);
    $newPrice = mysqli_real_escape_string($mysqli, $_POST['price']);

    // Update the experience information in the database
    $updateQuery = "UPDATE Experience SET Service = '$newService', Price = '$newPrice' WHERE ID = $experienceID";
    $updateResult = mysqli_query($mysqli, $updateQuery);

    if ($updateResult) {
        // Redirect to experience page after successful update
        header("Location: experience.php");
        exit();
    } else {
        // Error occurred during update, handle as needed
        echo "Error: Unable to update the experience information.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Experience</title>
</head>
<body>

<h2>Edit Experience</h2>

<form method="post">
    <label for="service">Service:</label><br>
    <input type="text" id="service" name="service" value="<?php echo $service; ?>"><br><br>
    <label for="price">Price:</label><br>
    <input type="text" id="price" name="price" value="<?php echo $price; ?>"><br><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>
