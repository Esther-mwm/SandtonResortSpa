<!DOCTYPE html>
<html lang="en">
<head>
  <title>Booking </title>
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
        <h2 style="color:#7a2021;">Event Booking Page</h2>
        <form id="booking-form">
            <label for="check-in-date">Check-in Date:</label>
            <input type="date" id="check-in-date" name="check-in-date">
            <label for="check-out-date">Check-out Date:</label>
            <input type="date" id="check-out-date" name="check-out-date">
            <br><br>
            <label for="room-type">Choose Room Type:</label><br>
            <input type="checkbox" id="small-conference" name="room-type" value="small-conference">
            <label for="small-conference">Small Conference Room</label><br>
            <input type="checkbox" id="executive-boardroom" name="room-type" value="executive-boardroom">
            <label for="executive-boardroom">Executive Board Room</label><br>
            <input type="checkbox" id="grand-ballroom" name="room-type" value="grand-ballroom">
            <label for="grand-ballroom">Grand Ballroom</label><br>
            <input type="checkbox" id="large-conference" name="room-type" value="large-conference">
            <label for="large-conference">Large Conference Room</label><br><br>
            <label for="seating">Number of Seating:</label>
            <input type="number" id="seating" name="seating" min="1">
            <br><br>

            <div id="total">
                <label for="total">Total Amount:</label>
                <span id="total-amount"></span>
            </div>
            <br>
            <button type="button" id="checkout-btn">Checkout</button>
            <button type="button" id="cancel-btn">Cancel</button><br><br>
        </form>
    </div>
    <div id="popup" class="popup">
        <div class="popup-content">
            <p>Are you sure you want to continue?</p>
            <button id="cancel-popup">Cancel</button>
            <button id="proceed-popup">Proceed</button>
        </div>
    </div>
    <script src="eventscript.js"></script>

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
        <li>Mayland South Lake Rd</li>
        <li>Myland, Dubai</li>
        </ul>

    </div>

    <div  class="bottom">
        <ul>
        <li><h4>Booking Office<h4></li>
        <li>5th floor</li>
        <li>Prosperity House</li>
        <li>Mayland Road</li>
        </ul>
    </div>

    <div class="icons"><br><br><br>
        <i class="fa fa-instagram"></i> Sandton_Resort<br>
        <i class="fa fa-phone"></i> +001 20 5230007<br>
        <i class="fa fa-envelope"></i> sandton@sandtonresort.com<br>
    </div>

    <div class="copy">
        <p><i>© 2023 | Sandton Resort and Spa | Done by Esther Mwangi</i></p>
    </div>

</footer>

</body>
</html>