<?php
include 'connection.php';

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
        <th>Check-in Date</th>
        <th>Check-out Date</th>
        <th>Room Type</th>
        <th>Wellness Type</th>
        <th>Adults</th>
        <th>Children</th>
        <th>Seating</th>
        <th>Total Amount</th>
      </tr>
    </thead>  
    <?php
    // Retrieve booking information from the appropriate tables in the database
    $sql = "SELECT check_in_date, check_out_date, room_type, '' AS wellness_type, adults, children, '' AS seating, total_amount FROM room_bookings
            UNION
            SELECT check_in_date, check_out_date, '' AS room_type, wellness_type, adults, 0 AS children, '' AS seating, total_amount FROM wellness_bookings
            UNION
            SELECT check_in_date, check_out_date, room_type, '' AS wellness_type, 0 AS adults, 0 AS children, seating, total_amount FROM meeting_bookings";
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
    } else {
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
