<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Experience Information</title>
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
    /* Button styles */
    .add-button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-bottom: 10px;
        cursor: pointer;
    }
</style>
</head>
<body>

<h2>Experience Information</h2>

<!-- Add Experience button -->
<button class="add-button" onclick="location.href='add_experience.php'">Add Experience</button>

<!-- Table to display experience information -->
<table>
    <tr>
        <th>ID</th>
        <th>Service</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    <?php
    // Include database connection
    include 'connection.php';

    // Fetch experience information from the database
    $query = "SELECT * FROM Experience";
    $result = mysqli_query($mysqli, $query);

    // Check if any data is returned
    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['ID'] . "</td>";
            echo "<td>" . $row['Service'] . "</td>";
            echo "<td>" . $row['Price'] . "</td>";
            echo "<td><a href='edit_experience.php?id=" . $row['ID'] . "'>Edit</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>No experience found</td></tr>";
    }
    ?>
</table>

</body>
</html>
