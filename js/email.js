document.getElementById("contact-form").addEventListener("submit", function(event) {
  event.preventDefault();

  emailjs.sendForm("", "", this)
    .then(() => {
      alert("Message sent successfully!");
    }, (error) => {
      alert("Failed to send message. Error: " + JSON.stringify(error));
    });
});
