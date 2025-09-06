document.getElementById("contact-form").addEventListener("submit", function(event) {
  event.preventDefault();

  emailjs.sendForm("service_4w817f9", "template_x1jnxbo", this)
    .then(() => {
      alert("Message sent successfully!");
    }, (error) => {
      alert("Failed to send message. Error: " + JSON.stringify(error));
    });
});
