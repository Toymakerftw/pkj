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
    <title>Delete User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <style>
        /* Add a style to hide the table border */
        table {
            border-collapse: collapse;
        }
    </style>
</head>
<body class="bg-gray-200">
<?php include 'navbar.php'; ?>
    <div class="flex justify-center items-center h-screen">
        <div class="container mx-auto bg-white p-8 rounded-lg shadow-lg w-96">
            <h1 class="text-2xl text-center mb-4">Delete User</h1>
            <p class="text-center">Only Team Leaders can delete users.</p>
            <table id="user-table" class="w-full mt-4">
                <thead>
                    <tr class="border-a">
                        <th class="py-2">Username</th>
                        <th class="py-2">Alias</th>
                        <th class="py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- User data will be loaded here using JavaScript -->
                </tbody>
            </table>
            <a href="teamleader_dashboard.php" class="block mt-4 text-blue-500 hover:text-blue-700 text-center">Back to Dashboard</a>
        </div>
    </div>

    <script src="delete_user.js"></script>
</body>
</html>
