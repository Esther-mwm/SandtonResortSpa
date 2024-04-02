<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Hall Availability</title>
<style>
    /* Modal styles */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }
    
    /* Modal content box */
    .modal-content {
        background-color: #fefefe;
        margin: 15% auto; /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
    }
</style>
</head>
<body>

<h2>Edit Hall Availability</h2>

<!-- Button to open the modal -->
<button onclick="openModal()">Edit Availability</button>

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <!-- Form for editing availability -->
    <form action="update_availability.php" method="post">
        <input type="hidden" name="hall_id" value="<?php echo $_GET['id']; ?>">
        <label for="availability">Availability:</label>
        <select id="availability" name="availability">
            <option value="Available">Available</option>
            <option value="Booked">Booked</option>
        </select>
        <br><br>
        <input type="submit" value="Submit">
    </form>
  </div>
</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Function to open the modal
function openModal() {
  modal.style.display = "block";
}

// Close the modal if the user clicks outside of it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

// Redirect to rooms.php after changes are saved
function redirectToRooms() {
    window.location.href = "meeting.php";
}
</script>

</body>
</html>
