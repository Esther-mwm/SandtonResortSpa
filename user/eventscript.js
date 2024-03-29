document.addEventListener("DOMContentLoaded", function () {
  const cancelBtn = document.getElementById("cancel-btn");
  const totalAmountDisplay = document.getElementById("total-amount");
  const totalAmountInput = document.getElementById("total-amount-input");

  cancelBtn.addEventListener("click", function () {
    window.location.href = "events.php";
  });

  const bookingForm = document.getElementById("booking-form");
  const roomRates = {
    "small-conference": { rate: 2000, maxSeating: 10 },
    "executive-boardroom": { rate: 2000, maxSeating: 20 },
    "grand-ballroom": { rate: 2000, maxSeating: 700 },
    "large-conference": { rate: 2000, maxSeating: 500 },
  };

  bookingForm.addEventListener("change", function () {
    const checkInDate = new Date(
      document.getElementById("check-in-date").value
    );
    const checkOutDate = new Date(
      document.getElementById("check-out-date").value
    );
    const numDays = Math.ceil(
      (checkOutDate - checkInDate) / (1000 * 60 * 60 * 24)
    );

    let totalAmount = 0;
    document
      .querySelectorAll('input[name="room-type"]:checked')
      .forEach(function (checkbox) {
        const roomType = checkbox.value;
        const seating = parseInt(document.getElementById("seating").value);
        const maxSeating = roomRates[roomType].maxSeating;
        if (seating > maxSeating) {
          alert(`Maximum seating for ${roomType} is ${maxSeating}.`);
          checkbox.checked = false;
        } else {
          totalAmount += roomRates[roomType].rate * seating * numDays;
        }
      });

    totalAmountDisplay.textContent = "KSH" + totalAmount.toFixed(2);
    totalAmountInput.value = totalAmount; // Update the hidden input field with the calculated total amount
  });
});
