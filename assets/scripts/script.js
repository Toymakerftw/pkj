const form = document.querySelector("form");
const emailField = form.querySelector(".email-field");
const emailInput = emailField.querySelector(".email");
const unameField = form.querySelector(".uname-field");
const unameInput = unameField.querySelector(".uname");
const aliasField = form.querySelector(".alias-field");
const aliasInput = aliasField.querySelector(".alias");
const passField = form.querySelector(".create-password");
const passInput = passField.querySelector(".password");
const cPassField = form.querySelector(".confirm-password");
const cPassInput = cPassField.querySelector(".cPassword");
const userTypeInputs = form.querySelectorAll('input[name="usertype"]');
const errorIcons = form.querySelectorAll(".error-icon");
const errorTexts = form.querySelectorAll(".error-text");

// Get the password input fields and the show/hide icons
const passInput1 = document.getElementById("password1");
const passInput2 = document.getElementById("password2");
const eyeIcon1 = document.getElementById("show-hide1");
const eyeIcon2 = document.getElementById("show-hide2");

// Add event listeners to both icons
eyeIcon1.addEventListener("click", () => {
  if (passInput1.type === "password") {
    eyeIcon1.classList.replace("bx-hide", "bx-show");
    passInput1.type = "text";
  } else {
    eyeIcon1.classList.replace("bx-show", "bx-hide");
    passInput1.type = "password";
  }
});

eyeIcon2.addEventListener("click", () => {
  if (passInput2.type === "password") {
    eyeIcon2.classList.replace("bx-hide", "bx-show");
    passInput2.type = "text";
  } else {
    eyeIcon2.classList.replace("bx-show", "bx-hide");
    passInput2.type = "password";
  }
});


// Email Validation
function checkEmail() {
  const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
  if (!emailInput.value.match(emailPattern)) {
    emailField.classList.add("invalid");
  } else {
    emailField.classList.remove("invalid");
  }
}

// Username Validation
function checkUname() {
  if (unameInput.value.trim() === "") {
    unameField.classList.add("invalid");
  } else {
    unameField.classList.remove("invalid");
  }
}

// Alias Validation
function checkAlias() {
  if (aliasInput.value.trim() === "") {
    aliasField.classList.add("invalid");
  } else {
    aliasField.classList.remove("invalid");
  }
}

// Password Validation
function createPass() {
  const passPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

  if (!passInput.value.match(passPattern)) {
    passField.classList.add("invalid");
  } else {
    passField.classList.remove("invalid");
  }
}

// Confirm Password Validtion
function confirmPass() {
  if (passInput.value !== cPassInput.value || cPassInput.value === "") {
    cPassField.classList.add("invalid");
  } else {
    cPassField.classList.remove("invalid");
  }
}

// User Type Validation
function checkUserType() {
  let selectedUserType = false;

  userTypeInputs.forEach((input) => {
    if (input.checked) {
      selectedUserType = true;
    }
  });

  if (!selectedUserType) {
    userTypeInputs[0].parentNode.classList.add("invalid");
  } else {
    userTypeInputs[0].parentNode.classList.remove("invalid");
  }
}

// Calling Functions on Form Submit
form.addEventListener("submit", (e) => {
  e.preventDefault();

  checkEmail();
  checkUname();
  checkAlias();
  createPass();
  confirmPass();
  checkUserType();

  emailInput.addEventListener("keyup", checkEmail);
  unameInput.addEventListener("keyup", checkUname);
  aliasInput.addEventListener("keyup", checkAlias);
  passInput.addEventListener("keyup", createPass);
  cPassInput.addEventListener("keyup", confirmPass);

  let isValid = true;

  errorIcons.forEach((icon) => {
    if (icon.parentElement.classList.contains("invalid")) {
      isValid = false;
    }
  });

  if (isValid) {
    location.href = form.getAttribute("action");
  }
});
