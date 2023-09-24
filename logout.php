<?php
// Start or resume the session
session_start();

// Destroy the session and redirect to the login page
session_destroy();

// Redirect to the login page
header("Location: login.html");
exit();
?>
