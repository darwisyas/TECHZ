document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("booking-form");
  const message = document.getElementById("form-message");

  if (form) {
    form.addEventListener("submit", function (e) {
      e.preventDefault();

      const formData = new FormData(form);

      fetch("data.php", {
        method: "POST",
        body: formData,
      })
        .then((response) => response.text())
        .then((data) => {
          message.innerHTML = data;
          form.reset();
        })
        .catch((error) => {
          message.innerHTML = "Error while submitting the form.";
        });
    });
  }

  // For smooth scrolling menu
  const links = document.querySelectorAll("a[href^='#']");
  links.forEach((link) => {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute("href"));
      if (target) {
        target.scrollIntoView({ behavior: "smooth" });
      }
    });
  });
});