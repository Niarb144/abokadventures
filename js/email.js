document.getElementById("contact-form").addEventListener("submit", function(event) {
  event.preventDefault();

  emailjs.sendForm("service_4w817f9", "template_x1jnxbo", this)
    .then(() => {
      showMessage("Message sent successfully!", "success");
      this.reset();
    }, (error) => {
      showMessage("Failed to send message. Error: " + JSON.stringify(error));
    });
});

function showMessage(text, type) {
  const messageDiv = document.getElementById("form-message");
  messageDiv.textContent = text;

  // Apply styles depending on type
  messageDiv.style.display = "block";
  messageDiv.style.padding = "10px";
  messageDiv.style.margin = "10px 0";
  messageDiv.style.borderRadius = "5px";
  messageDiv.style.textAlign = "center";
  messageDiv.style.fontWeight = "bold";

  if (type === "success") {
    messageDiv.style.backgroundColor = "#d4edda";
    messageDiv.style.color = "#155724";
  } else {
    messageDiv.style.backgroundColor = "#f8d7da";
    messageDiv.style.color = "#721c24";
  }

  // Hide after 5 seconds
  setTimeout(() => {
    messageDiv.style.display = "none";
  }, 5000);
}
