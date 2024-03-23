<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Conference Halls</title>
<style>
    /* Table styles */
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
    th {
        background-color: #f2f2f2;
    }
</style>
</head>
<body>

<h2>Conference Halls</h2>

<table>
    <tr>
        <th>Hall Type</th>
        <th>Price</th>
        <th>Capacity</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php
    // Include database connection
    include 'connection.php';

    // Fetch conference halls information from the database
    $query = "SELECT ch.HallID, ch.HallType, ch.Price, ch.Capacity, chb.Status FROM ConferenceHall ch JOIN ConferenceHallBookings chb ON ch.HallID = chb.HallID";
    $result = mysqli_query($mysqli, $query);

    // Check if any data is returned
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['HallType'] . "</td>";
            echo "<td>" . $row['Price'] . "</td>";
            echo "<td>" . $row['Capacity'] . "</td>";
            echo "<td>" . $row['Status'] . "</td>";
            echo "<td><a href='edit_hall.php?id=" . $row['HallID'] . "'>Edit</a> </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>No conference halls found</td></tr>";
    }
    ?>
</table>

</body>
</html>
