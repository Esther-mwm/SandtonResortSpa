<?php
// Include database connection
include 'connection.php';

// Define variables and initialize with empty values
$service = $price = "";
$service_err = $price_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate service
    if (empty(trim($_POST["service"]))) {
        $service_err = "Please enter the service.";
    } else {
        $service = trim($_POST["service"]);
    }

    // Validate price
    if (empty(trim($_POST["price"]))) {
        $price_err = "Please enter the price.";
    } else {
        $price = trim($_POST["price"]);
    }

    // Check input errors before inserting into database
    if (empty($service_err) && empty($price_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO Experience (Service, Price) VALUES (?, ?)";

        if ($stmt = mysqli_prepare($mysqli, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_service, $param_price);

            // Set parameters
            $param_service = $service;
            $param_price = $price;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to experience page
                header("location: experience.php");
                exit();
            } else {
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Experience</title>
<style>
    /* Modal overlay */
    .modal-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 9999;
    }

    /* Modal content */
    .modal-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: #fefefe;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        z-index: 10000;
    }

    /* Form styles */
    .modal-content form div {
        margin-bottom: 10px;
    }

    .modal-content form label {
        display: block;
    }

    .modal-content form input[type="text"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .modal-content form input[type="submit"],
    .modal-content form input[type="reset"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
</head>
<body>

<!-- Add Experience button -->
<button onclick="openModal()">Add Experience</button>

<!-- Modal overlay -->
<div id="modal" class="modal-overlay">
    <!-- Modal content -->
    <div class="modal-content">
        <h2>Add Experience</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label for="service">Service:</label>
                <input type="text" id="service" name="service" value="<?php echo $service; ?>">
                <span><?php echo $service_err; ?></span>
            </div>
            <div>
                <label for="price">Price:</label>
                <input type="text" id="price" name="price" value="<?php echo $price; ?>">
                <span><?php echo $price_err; ?></span>
            </div>
            <div>
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </div>
        </form>
        <button onclick="closeModal()">Close</button>
    </div>
</div>

<script>
// Get the modal
var modal = document.getElementById('modal');

// Function to open the modal
function openModal() {
  modal.style.display = 'block';
}

// Function to close the modal
function closeModal() {
  modal.style.display = 'none';
}

// Close the modal if the user clicks outside of it
window.onclick = function(event) {
  if (event.target == modal) {
    closeModal();
  }
}
</script>

</body>
</html>