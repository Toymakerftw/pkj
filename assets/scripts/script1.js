const form = document.querySelector("form");
const emailField = form.querySelector(".email-field");
const emailInput = emailField.querySelector(".email");
const passField = form.querySelector(".create-password");
const passInput = passField.querySelector(".password");

// Email Validation
function checkEmail() {
  const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
  if (!emailInput.value.match(emailPattern)) {
    emailField.classList.add("invalid");
  } else {
    emailField.classList.remove("invalid");
  }
}

// Hide and show password
const eyeIcon = passField.querySelector(".show-hide");

eyeIcon.addEventListener("click", () => {
  if (passInput.type === "password") {
    eyeIcon.classList.replace("bx-hide", "bx-show");
    passInput.type = "text";
  } else {
    eyeIcon.classList.replace("bx-show", "bx-hide");
    passInput.type = "password";
  }
});

// Password Validation
function createPass() {
  const passPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

  if (!passInput.value.match(passPattern)) {
    passField.classList.add("invalid");
  } else {
    passField.classList.remove("invalid");
  }
}

// Calling functions on form submit
form.addEventListener("submit", (e) => {
  e.preventDefault();

  checkEmail();
  createPass();

  // Calling functions on keyup
  emailInput.addEventListener("keyup", checkEmail);
  passInput.addEventListener("keyup", createPass);

  // Check if the form is valid
  if (!emailField.classList.contains("invalid") && !passField.classList.contains("invalid")) {
    // Perform sign-in logic here
    alert("Sign in successful!"); // Replace with your actual sign-in code
  }
});
