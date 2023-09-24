<?php
// Start or resume the session
session_start();

// Check if the user is logged in and has the appropriate usertype
if (!isset($_SESSION["username"]) || ($_SESSION["usertype"] !== "teamleader")) {
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
    <title>User Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-200">
<?php include 'navbar.php'; ?>
    <div class="flex justify-center items-center h-screen">
        <div class="container mx-auto bg-white p-8 rounded-lg shadow-lg w-96">
            <h1 class="text-2xl text-center mb-4">User Registration</h1>
            <form id="registration-form">
                <div class="mb-4">
                    <label for="username" class="block font-bold">Username:</label>
                    <input type="text" id="username" name="username" required class="w-full px-3 py-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="alias" class="block font-bold">Alias:</label>
                    <input type="text" id="alias" name="alias" required class="w-full px-3 py-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="password" class="block font-bold">Password:</label>
                    <input type="password" id="password" name="password" required class="w-full px-3 py-2 border rounded">
                </div>
                <div class="mb-4">
                    <label class="block font-bold">User Type:</label>
                    <div class="flex">
                        <input type="radio" id="associate" name="usertype" value="associate" checked class="mt-1 mr-1">
                        <label for="associate" class="mr-4">Associate</label>
                        <input type="radio" id="teamleader" name="usertype" value="teamleader" class="mt-1 mr-1">
                        <label for="teamleader">Team Leader</label>
                    </div>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-700 w-full">Register</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
