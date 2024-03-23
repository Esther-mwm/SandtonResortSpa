<?php
// Include database connection
include 'connection.php';

// Check if RoomID is provided in the URL
if (isset($_GET['id'])) {
    $roomID = $_GET['id'];

    // Fetch room information from the database based on RoomID
    $query = "SELECT r.*, rt.RoomType FROM Room r JOIN RoomTypes rt ON r.RoomTypeID = rt.RoomTypeID WHERE r.RoomID = $roomID";
    $result = mysqli_query($mysqli, $query);
    $room = mysqli_fetch_assoc($result);
} else {
    // Redirect to rooms.php if RoomID is not provided
    header("Location: rooms.php");
    exit();
}

// Fetch all room types for dropdown menu
$roomTypesQuery = "SELECT * FROM RoomTypes";
$roomTypesResult = mysqli_query($mysqli, $roomTypesQuery);
$roomTypes = mysqli_fetch_all($roomTypesResult, MYSQLI_ASSOC);

// Handle form submission for editing room
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $newRoomNumber = $_POST['room_number'];
    $newStatus = $_POST['status'];
    $newRoomType = $_POST['room_type'];

    // Get the RoomTypeID based on the selected RoomType
    $roomTypeQuery = "SELECT RoomTypeID FROM RoomTypes WHERE RoomType = '$newRoomType'";
    $roomTypeResult = mysqli_query($mysqli, $roomTypeQuery);
    $roomTypeRow = mysqli_fetch_assoc($roomTypeResult);
    $newRoomTypeID = $roomTypeRow['RoomTypeID'];

    // Update room information in the database
    $updateQuery = "UPDATE Room SET RoomNumber = '$newRoomNumber', Status = '$newStatus', RoomTypeID = $newRoomTypeID WHERE RoomID = $roomID";
    $updateResult = mysqli_query($mysqli, $updateQuery);

    // Redirect to rooms.php after updating
    header("Location: rooms.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Room</title>
<style>
    /* Modal styles */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
    }
    /* Close button styles */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }
    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>
</head>
<body>

<h2>Edit Room</h2>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h3>Edit Room</h3>
    <form method="POST">
        <label for="room_number">Room Number:</label>
        <input type="text" id="room_number" name="room_number" value="<?php echo $room['RoomNumber']; ?>"><br><br>
        
        <label for="room_type">Room Type:</label>
        <select id="room_type" name="room_type">
            <?php foreach ($roomTypes as $roomType) { ?>
                <option value="<?php echo $roomType['RoomType']; ?>" <?php if ($roomType['RoomType'] == $room['RoomType']) echo 'selected'; ?>><?php echo $roomType['RoomType']; ?></option>
            <?php } ?>
        </select><br><br>
        
        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="Available" <?php if ($room['Status'] == 'Available') echo 'selected'; ?>>Available</option>
            <option value="Booked" <?php if ($room['Status'] == 'Booked') echo 'selected'; ?>>Booked</option>
        </select><br><br>

        <button type="submit">Save Changes</button>
    </form>
  </div>

</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
modal.style.display = "block";

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// Redirect to rooms.php after changes are saved
function redirectToRooms() {
    window.location.href = "rooms.php";
}
</script>

</body>
</html>