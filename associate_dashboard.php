<?php
// Start or resume the session
session_start();

// Check if the user is logged in and has the appropriate usertype
if (!isset($_SESSION["username"]) || ($_SESSION["usertype"] !== "associate")) {
    // Redirect to the login page if the user is not authenticated
    header("Location: login.html");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Leader Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-200">
<?php include 'navbar.php'; ?>
    <div class="flex justify-center items-center h-screen">
        <div class="container mx-auto bg-white p-8 rounded-lg shadow-lg w-96">
            <h1 class="text-2xl text-center mb-4">Welcome, Associate!</h1>
            <p class="text-center">This is the dashboard for associates. You can access your tasks and information here.</p>
            <a href="logout.php" class="block mt-4 text-blue-500 hover:text-blue-700 text-center">Logout</a>
        </div>
    </div>
</body>
</html>
