<?php
// Include the database connection file
include('connection.php');

// Initialize variables to store counts
$total_rooms = 0;
$total_conference = 0;
$total_wellness = 0;
$total_users = 0;
$total_bookings = 0;

// Query to get total rooms
$sql_total_rooms = "SELECT COUNT(*) AS total_rooms FROM room_bookings";
$result_total_rooms = mysqli_query($con, $sql_total_rooms);
if ($result_total_rooms) {
    $row_total_rooms = mysqli_fetch_assoc($result_total_rooms);
    $total_rooms = $row_total_rooms['total_rooms'];
}

// Query to get total conference halls
$sql_total_conference = "SELECT COUNT(*) AS total_conference FROM meeting_bookings";
$result_total_conference = mysqli_query($con, $sql_total_conference);
if ($result_total_conference) {
    $row_total_conference = mysqli_fetch_assoc($result_total_conference);
    $total_conference = $row_total_conference['total_conference'];
}

// Query to get total wellness activities
$sql_total_wellness = "SELECT COUNT(*) AS total_wellness FROM wellness_bookings";
$result_total_wellness = mysqli_query($con, $sql_total_wellness);
if ($result_total_wellness) {
    $row_total_wellness = mysqli_fetch_assoc($result_total_wellness);
    $total_wellness = $row_total_wellness['total_wellness'];
}

// Query to get total users
$sql_total_users = "SELECT COUNT(*) AS total_users FROM users";
$result_total_users = mysqli_query($con, $sql_total_users);
if ($result_total_users) {
    $row_total_users = mysqli_fetch_assoc($result_total_users);
    $total_users = $row_total_users['total_users'];
}

// Calculate total current bookings
$total_bookings = $total_rooms + $total_conference + $total_wellness;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .content {
            display: flex;
            justify-content: space-between;
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h2 {
            color: #333;
        }

        .box {
            background-color: teal;
            color: #fff;
            padding: 20px;
            margin: 20px;
            height:90px;
            align-items:center;
            text-align: center;
            border-radius: 5px;
        }

        .box p {
            margin-top: 10px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="content">      
        <div class="box">
            <p>Total Rooms</p>
            <p><?php echo $total_rooms; ?></p>
        </div>
        <div class="box">
            <p>Total Conference Halls</p>
            <p><?php echo $total_conference; ?></p>
        </div>
        <div class="box">
            <p>Total Wellness Activities</p>
            <p><?php echo $total_wellness; ?></p>
        </div>
        <div class="box">
            <p>Total Users</p>
            <p><?php echo $total_users; ?></p>
        </div>
        <div class="box">
            <p>Total Current Bookings</p>
            <p><?php echo $total_bookings; ?></p>
        </div>
    </div>
</body>
</html>
