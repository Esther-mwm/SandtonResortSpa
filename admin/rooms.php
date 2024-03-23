<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Rooms</title>
<style>
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

<h2>Rooms Information</h2>

<button class="button" onclick="showAddForm()">Add Room</button>

<table>
  <thead>
    <tr>
      <th>Room Number</th>
      <th>Room Type</th>
      <th>Price</th>
      <th>Capacity</th>
      <th>Adults</th>
      <th>Children</th>
      <th>Status</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // Include database connection
    include 'connection.php';

    // Retrieve room information from the database
    $query = "SELECT r.RoomID, r.RoomNumber, rt.RoomType, rt.Price, rt.Capacity, rt.Adults, rt.Children, r.Status
              FROM Room r
              JOIN RoomTypes rt ON r.RoomTypeID = rt.RoomTypeID";
    $result = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>{$row['RoomNumber']}</td>";
            echo "<td>{$row['RoomType']}</td>";
            echo "<td>{$row['Price']}</td>";
            echo "<td>{$row['Capacity']}</td>";
            echo "<td>{$row['Adults']}</td>";
            echo "<td>{$row['Children']}</td>";
            echo "<td>{$row['Status']}</td>";
            echo "<td>";
            echo "<a class='edit-btn' href='edit_room.php?id={$row['RoomID']}'>Edit</a>";  
            echo "<a class='delete-btn' href='delete_room.php?id={$row['RoomID']}'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No rooms found</td></tr>";
    }
    ?>
  </tbody>
</table>

</body>
</html>
