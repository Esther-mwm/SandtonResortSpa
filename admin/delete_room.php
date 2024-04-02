<?php
// Include database connection
include 'connection.php';

// Check if RoomID is provided in the URL
if (isset($_GET['id'])) {
    $roomID = $_GET['id'];

    // Delete the room from the database
    $deleteQuery = "DELETE FROM Room WHERE RoomID = $roomID";
    $deleteResult = mysqli_query($mysqli, $deleteQuery);

    if ($deleteResult) {
        // Redirect to rooms.php after successful deletion
        header("Location: rooms.php");
        exit();
    } else {
        // Error occurred during deletion, handle as needed
        echo "Error: Unable to delete the room.";
    }
} else {
    // Redirect to rooms.php if RoomID is not provided
    header("Location: rooms.php");
    exit();
}
?>
