<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>
  <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css'>
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    /* Add landscape and two-column styles */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }

    .container {
      max-width: 800px;
      /* Adjust the max-width to your preference */
      margin: 0 auto;
      background: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    header {
      font-size: 24px;
      text-align: center;
      margin-bottom: 20px;
    }

    .form-row {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      margin-bottom: 15px;
    }

    .form-col {
      width: 48%;
      /* Adjust the width to create two columns with a small gap */
    }

    .input-field {
      position: relative;
    }

    input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
      box-shadow: none;
    }

    select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
      box-shadow: none;
      cursor: pointer;
    }

    /* Modify radio button styling */
    .radio-container {
      display: inline-block;
      margin-right: 10px;
      padding: 5px;
      cursor: pointer;
    }

    .radio-input {
      display: none;
      /* Hide the actual radio input */
    }

    .radio-text {
      position: relative;
      padding-left: 25px;
      cursor: pointer;
    }

    .radio-text::before {
      content: "";
      position: absolute;
      left: 0;
      top: 50%;
      transform: translateY(-50%);
      width: 20px;
      height: 20px;
      border: 1px solid #ccc;
      border-radius: 50%;
    }

    .radio-input:checked+.radio-text::before {
      background-color: #007bff;
      /* Change the background color when selected */
    }

    /* Add hover effect */
    .radio-text:hover::before {
      border: 1px solid #007bff;
    }

    /* Add error styles */
    .error-icon {
      color: red;
    }

    .error-text {
      color: red;
      font-size: 14px;
    }
  </style>
</head>

<body>
  <div class="container">
    <header>Add User</header>
    <form action="#">
      <div class="form-row">
        <div class="form-col">
          <div class="field email-field">
            <div class="input-field">
              <input type="email" placeholder="Enter your email" class="email" />
            </div>
            <span class="error email-error">
              <i class="bx bx-error-circle error-icon"></i>
              <p class="error-text">Please enter a valid email</p>
            </span>
          </div>
        </div>
        <div class="form-col">
          <div class="field uname-field">
            <div class="input-field">
              <input type="text" placeholder="Enter a Username" class="uname" />
            </div>
            <span class="error uname-error">
              <i class="bx bx-error-circle error-icon"></i>
              <p class="error-text">Please enter a username</p>
            </span>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-col">
          <div class="field alias-field">
            <div class="input-field">
              <input type="text" placeholder="Enter an Alias" class="alias" />
            </div>
            <span class="error alias-error">
              <i class="bx bx-error-circle error-icon"></i>
              <p class="error-text">Please enter an alias</p>
            </span>
          </div>
        </div>
        <div class="form-col">
          <div class="field create-password">
            <div class="input-field">
              <input type="password" placeholder="Create password" class="password" id="password1"/>
              <i class="bx bx-hide show-hide" id="show-hide1"></i>
            </div>
            <span class="error password-error">
              <i class="bx bx-error-circle error-icon"></i>
              <p class="error-text">Please enter at least 8 characters with numbers, symbols, and both upper and lower case letters.</p>
            </span>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-col">
          <div class="field confirm-password">
            <div class="input-field">
              <input type="password" placeholder="Confirm password" class="cPassword" id="password2"/>
              <i class="bx bx-hide show-hide" id="show-hide2"></i>
            </div>
            <span class="error cPassword-error">
              <i class="bx bx-error-circle error-icon"></i>
              <p class="error-text">Passwords don't match</p>
            </span>
          </div>
        </div>
        <div class="form-col">
          <div class="input-field">
            <label class="radio-container">
              <input type="radio" id="associate" name="usertype" value="associate" checked class="radio-input">
              <span class="radio-text">Associate</span>
            </label>
            <label class="radio-container">
              <input type="radio" id="teamleader" name="usertype" value="teamleader" class="radio-input">
              <span class="radio-text">Team Leader</span>
            </label>
          </div>
          <div class="input-field button">
            <input type="submit" value="Submit Now" />
          </div>
    </form>
  </div>
  <script src="assets/scripts/script.js"></script>
</body>

</html>