<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Conference Halls</title>
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
<h2>Conference Halls</h2>

<table>
<tbody>
    <thead>
    <tr>
        <th>Check-in Date</th>
        <th>Check-out Date</th>
        <th>Room Type</th>
        <th>Seating</th>
      </tr>
    </thead>  
    <?php
    // Include database connection
    include 'connection.php';

      // Retrieve room booking information from the database
      $sql = "SELECT id, check_in_date, check_out_date, room_type, seating FROM meeting_bookings";
      $result = mysqli_query($con, $sql);

      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
              echo "<td>{$row['check_in_date']}</td>";
              echo "<td>{$row['check_out_date']}</td>";
              echo "<td>{$row['room_type']}</td>";
              echo "<td>{$row['seating']}</td>";
            echo "</tr>";
        }
    }else {
            echo "<tr><td colspan='7'>No room bookings found</td></tr>";
        }
                    // Close connection
                    mysqli_close($con);
                    ?>
      </tbody>
</table>
    </div>
</body>
</html>
