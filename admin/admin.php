<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sandton Resort & SPA Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            display: flex;
            justify-content:space-between;
            color: white;
            padding: 0 20px;
            height: 80px;
        }

        .details{
            margin-top: 10px;
            margin-left: 10px;
        }

        .details button{
            background-color: teal;
            border-radius: 5px;
            padding: 10px;
        }

        nav {

            background-color: #333;
            color: white;
            overflow: hidden;
            position: fixed;
            top: 50;
            left: 0;
            width: 200px;
            height: 100%;
        }

        nav a {
            text-decoration: none;
            padding: 14px 16px;
            color: white;
            display: block;
            width: 100%;
        }

        nav a:hover {
            background-color: #ddd;
            color: black;
        }

        .content {
            margin-left: 220px; /* Adjust as needed based on your design */
            transition: margin-left 0.5s;
            padding: 20px;
        }

        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 1em;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

    <header>
        <h1>Sandton Resort & SPA Admin</h1>
        <div class="details">
            <button>Profile</button>
            <button><a href="../login/login.php">Log Out</a></button>
        </div>
        
    </header>

    <nav>
        <a href="admin.php?page=dashboard">Dashboard</a>
        <a href="admin.php?page=customers">Customers</a>
        <a href="admin.php?page=rooms">Rooms</a>
        <a href="admin.php?page=meeting">Board Rooms</a>
        <a href="admin.php?page=experience">Wellness</a>
        <a href="admin.php?page=booking">Bookings</a>
    </nav>

    <div class="content">
        <?php
            // Default to dashboard if no page is specified
            $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

            // Include content based on the selected page
            switch ($page) {
                case 'dashboard':
                    include('dashboard.php');
                    break;
                case 'customers':
                    include('customers.php');
                    break;
                case 'rooms':
                    include('rooms.php');
                    break;
                case 'meeting':
                    include('meeting.php');
                    break;
                case 'experience':
                    include('experience.php');
                    break;
                case 'booking':
                    include('bookings.php');
                    break;
                case 'payment':
                    include('payment.php');
                    break;
                default:
                    include('dashboard.php');
            }
        ?>
    </div>

    <footer>
        &copy; 2024Ibis Hotel. All rights reserved.
    </footer>

</body>
</html>
