<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>CodePen - Sign In</title>
  <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css'>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
  <header>Sign In</header>
  <form action="#">
    <div class="field email-field">
      <div class="input-field">
        <input type="email" placeholder="Enter your email" class="email" />
      </div>
      <span class="error email-error">
        <i class="bx bx-error-circle error-icon"></i>
        <p class="error-text">Please enter a valid email</p>
      </span>
    </div>
    <div class="field create-password">
      <div class="input-field">
        <input type="password" placeholder="Enter password" class="password" />
        <i class="bx bx-hide show-hide"></i>
      </div>
      <span class="error password-error">
        <i class="bx bx-error-circle error-icon"></i>
        <p class="error-text">Please enter your password</p>
      </span>
    </div>
    <div class="input-field button">
      <input type="submit" value="Sign In" />
    </div>
  </form>
</div>
<script src="assets/scripts/script1.js"></script>
</body>
</html>
