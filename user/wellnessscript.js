document.addEventListener("DOMContentLoaded", function () {
  const cancelBtn = document.getElementById("cancel-btn");
  const totalAmountDisplay = document.getElementById("total-amount");
  const totalAmountInput = document.getElementById("total-amount-input");

  cancelBtn.addEventListener("click", function () {
    window.location.href = "wellness.php";
  });

  const bookingForm = document.getElementById("booking-form");
  const wellnessRates = {
    "hot-stone-massage": { rate: 5000 },
    "facial-therapy": { rate: 3000 },
    "exfoliate-glow": { rate: 2500 },
    sauna: { rate: 9000 },
    "siara-salon": { rate: 3000 },
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

    let totalAmount = 0;
    document
      .querySelectorAll('input[name="wellness-type"]:checked')
      .forEach(function (checkbox) {
        const wellnessType = checkbox.value;
        totalAmount += wellnessRates[wellnessType].rate * adults * diffDays;
      });

    totalAmountDisplay.textContent = "KSH" + totalAmount.toFixed(2);
    totalAmountInput.value = totalAmount; // Update the hidden input field with the calculated total amount
  });
});
