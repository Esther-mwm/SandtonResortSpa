<?php
include('connection.php');

// Initialize message variable
$msg = '';

// Check if the form is submitted
if(isset($_POST['book'])) {
    // Sanitize input data
    $checkInDate = mysqli_real_escape_string($con, $_POST['check-in-date']);
    $checkOutDate = mysqli_real_escape_string($con, $_POST['check-out-date']);
    $wellnessType = mysqli_real_escape_string($con, $_POST['wellness-type']);
    $adults = intval($_POST['adults']); // Convert to integer
    $totalAmount = floatval($_POST['total-amount']); // Convert to float

    // Insert booking details into the database
    $sql_room_details = "INSERT INTO wellness_bookings (check_in_date, check_out_date, wellness_type, adults, total_amount) VALUES ('$checkInDate', '$checkOutDate', '$wellnessType', $adults, $totalAmount)";
    
    // Execute query
    if(mysqli_query($con, $sql_room_details)) {
        $msg = "<h4 style='color:green'>Booking has been made successfully.</h4>"; 
    } else {
        $msg = "<h4 style='color:red'>Error in Booking. Please try again.</h4>"; 
        // Debugging: Print SQL error
        echo "Error: " . $sql_room_details . "<br>" . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Wellness Booking Page</title>
  <link rel="icon" type="image/x-icon" href=".././sandton icon.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./booking.css">
  <link rel="stylesheet" href=".././style.css">
</head>

<body>
    <div class="logo"><img src=".././images/logo2.png" height="100" width="150" /></div>
    <div class="container">
        <h2 style="color:#7a2021;">Wellness Booking Page</h2>
        <?php echo isset($msg) ? $msg : ""; ?>
        <form id="booking-form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <label for="check-in-date">Check-in Date:</label>
            <input type="date" id="check-in-date" name="check-in-date">
            <label for="check-out-date">Check-out Date:</label>
            <input type="date" id="check-out-date" name="check-out-date"><br><br>
            <label for="wellness-type">Choose Wellness Type:</label><br>
            <input type="radio" id="hot-stone-massage" name="wellness-type" value="hot-stone-massage">
            <label for="hot-stone-massage">Hot Stone Massage</label><br>
            <input type="radio" id="facial-therapy" name="wellness-type" value="facial-therapy">
            <label for="facial-therapy">Facial Therapy</label><br>
            <input type="radio" id="exfoliate-glow" name="wellness-type" value="exfoliate-glow">
            <label for="exfoliate-glow">Exfoliate Glow</label><br>
            <input type="radio" id="sauna" name="wellness-type" value="sauna">
            <label for="sauna">Sauna</label><br>
            <input type="radio" id="siara-salon" name="wellness-type" value="siara-salon">
            <label for="siara-salon">Siara Salon & Barber Shop</label><br><br>
            <label for="adults">Number of Adults:</label>
            <input type="number" id="adults" name="adults" min="1"><br><br>
            <div id="total">
                <label for="total">Total Amount:</label>
                <span id="total-amount"></span>
            </div>
            <br>
            
            <!-- Add a hidden input field to store the total amount -->
            <input type="hidden" id="total-amount-input" name="total-amount">

            <button type="submit" name="book">Checkout</button>
            <button type="button" id="cancel-btn">Cancel</button><br><br>
        </form>
    </div>
    <script src="wellnessscript.js"></script>

    <footer>
    <div  class="bottom">
        <ul>
        <li><h4>About Us</h4></li>
        <li>Contact Us</li>
        <li>Newsletters</li>
        <li>Careers</li>
        <li>Our rates</li>
        </ul>
    </div>

    <div  class="bottom">
        <ul>
        <li><h4>Terms & Policies</h4></li>
        <li>Privacy Policy</li>
        </ul>
    </div>

    <div class="bottom">
        <ul>
        <li><h4>Resort Location</h4></li>
        <li>Moi S Lake Rd</li>
        <li>Karagita, Kenya</li>
        </ul>

    </div>

    <div  class="bottom">
        <ul>
        <li><h4>Booking Office<h4></li>
        <li>5th floor</li>
        <li>Prosperity House</li>
        <li>Moi S Lake Rd</li>
        </ul>
    </div>

    <div class="icons"><br><br><br>
        <i class="fa fa-instagram"></i> Sandton_Resort<br>
        <i class="fa fa-phone"></i> +001 20 5230007<br>
        <i class="fa fa-envelope"></i> sandton@sandtonresort.com<br>
    </div>

    <div class="copy">
        <p><i>© 2024| Sandton Resort and Spa | Done by Esther Mwangi</i></p>
    </div>

</footer>

</body>
</html>
