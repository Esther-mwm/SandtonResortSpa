<?php
include 'connection.php';

// Check if data is sent from rooms.php form
if(isset($_POST['room_booking'])) {
    $checkInDate = mysqli_real_escape_string($con, $_POST['check_in_date']);
    $checkOutDate = mysqli_real_escape_string($con, $_POST['check_out_date']);
    $roomType = mysqli_real_escape_string($con, $_POST['room_type']);
    $adults = intval($_POST['adults']);
    $children = intval($_POST['children']);
    $totalAmount = floatval($_POST['total_amount']);

    // Insert room booking details into the database
    $sql = "INSERT INTO room_bookings (check_in_date, check_out_date, room_type, adults, children, total_amount) VALUES ('$checkInDate', '$checkOutDate', '$roomType', $adults, $children, $totalAmount)";
    mysqli_query($con, $sql);
}

// Check if data is sent from experience.php form
if(isset($_POST['wellness_booking'])) {
    $checkInDate = mysqli_real_escape_string($con, $_POST['check_in_date']);
    $checkOutDate = mysqli_real_escape_string($con, $_POST['check_out_date']);
    $wellnessType = mysqli_real_escape_string($con, $_POST['wellness_type']);
    $adults = intval($_POST['adults']);
    $totalAmount = floatval($_POST['total_amount']);

    // Insert wellness booking details into the database
    $sql = "INSERT INTO wellness_bookings (check_in_date, check_out_date, wellness_type, adults, total_amount) VALUES ('$checkInDate', '$checkOutDate', '$wellnessType', $adults, $totalAmount)";
    mysqli_query($con, $sql);
}

// Check if data is sent from meeting.php form
if(isset($_POST['meeting_booking'])) {
    $checkInDate = mysqli_real_escape_string($con, $_POST['check_in_date']);
    $checkOutDate = mysqli_real_escape_string($con, $_POST['check_out_date']);
    $roomType = mysqli_real_escape_string($con, $_POST['room_type']);
    $seating = intval($_POST['seating']);
    $totalAmount = floatval($_POST['total_amount']);

    // Insert meeting booking details into the database
    $sql = "INSERT INTO meeting_bookings (check_in_date, check_out_date, room_type, seating, total_amount) VALUES ('$checkInDate', '$checkOutDate', '$roomType', $seating, $totalAmount)";
    mysqli_query($con, $sql);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bookings</title>
<style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .add-user {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 8px;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
        }

        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<div class="container">
<h2>Booking Information</h2>

<table>
<tbody>
    <thead>
    <tr>
        <th>User ID</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>Username</th>    
        <th>Check-in Date</th>
        <th>Check-out Date</th>
        <th>Room Type</th>
        <th>Wellness Type</th>
        <th>adults</th>
        <th>Children</th>
        <th>Seating</th>
        <th>Totals</th>
      </tr>
    </thead>  
    <?php
    // Include database connection
    include 'connection.php';

      // Retrieve booking information from the database
      $sql = "SELECT id, check_in_date, check_out_date, room_type, wellness_type, adults, children, seating, total_amount FROM bookings";
      $result = mysqli_query($con, $sql);

      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
              echo "<td>{$row['check_in_date']}</td>";
              echo "<td>{$row['check_out_date']}</td>";
              echo "<td>{$row['room_type']}</td>";
              echo "<td>{$row['wellness_type']}</td>";
              echo "<td>{$row['adults']}</td>";
              echo "<td>{$row['children']}</td>";
              echo "<td>{$row['seating']}</td>";
              echo "<td>{$row['total_amount']}</td>";
            echo "</tr>";
        }
    }else {
            echo "<tr><td colspan='8'>No bookings information found</td></tr>";
        }
                    // Close connection
                    mysqli_close($con);
                    ?>
      </tbody>
</table>
    </div>
</body>
</html>
