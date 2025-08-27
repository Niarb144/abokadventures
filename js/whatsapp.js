 // Show popup message when user hovers or after a delay
    const popup = document.getElementById("popupMsg");
    const btn = document.getElementById("whatsappBtn");

    // Show message after 2 seconds
    setTimeout(() => {
      popup.style.display = "block";
    }, 2000);

    // Hide popup when button is clicked
    btn.addEventListener("click", () => {
      popup.style.display = "none";
    });