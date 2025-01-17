document.addEventListener("DOMContentLoaded", function () {
  const cancelBtn = document.getElementById("cancel-btn");
  const totalAmountDisplay = document.getElementById("total-amount");
  const totalAmountInput = document.getElementById("total-amount-input");

  cancelBtn.addEventListener("click", function () {
    window.location.href = "user.php";
  });

  const bookingForm = document.getElementById("booking-form");
  const roomRates = {
    "deluxe-room": { rate: 7000, maxAdults: 2, maxChildren: 1 },
    "honeymoon-suite": { rate: 8000, maxAdults: 2, maxChildren: 0 },
    "fountain-room": { rate: 6000, maxAdults: 2, maxChildren: 1 },
    "villa-room": { rate: 5000, maxAdults: 4, maxChildren: 2 },
  };

  bookingForm.addEventListener("change", function () {
    const checkInDate = new Date(
      document.getElementById("check-in-date").value
    );
    const checkOutDate = new Date(
      document.getElementById("check-out-date").value
    );
    const diffTime = Math.abs(checkOutDate - checkInDate);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

    const adults = parseInt(document.getElementById("adults").value);
    const children = parseInt(document.getElementById("children").value);

    let totalAmount = 0;
    document
      .querySelectorAll('input[name="room-type"]:checked')
      .forEach(function (checkbox) {
        const roomType = checkbox.value;
        const maxAdults = roomRates[roomType].maxAdults;
        const maxChildren = roomRates[roomType].maxChildren;

        if (adults > maxAdults || children > maxChildren) {
          alert(
            `Maximum allowed for ${roomType}: Adults - ${maxAdults}, Children - ${maxChildren}`
          );
          checkbox.checked = false;
        } else {
          totalAmount += roomRates[roomType].rate * diffDays;
        }
      });

    totalAmountDisplay.textContent = "KSH" + totalAmount.toFixed(2);
    totalAmountInput.value = totalAmount; // Update the hidden input field with the calculated total amount
  });
});
