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
    <title>Assign RFQs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-200">
    <?php include 'navbar.php'; ?>

    <div class="flex justify-center items-center" style="padding: 25px;">
        <div class="container mx-auto bg-white p-8 rounded-lg shadow-lg w-100">
            <h1 class="text-2xl text-center mb-4">Assign RFQs</h1>
            <form id="assign-rfq-form">
                <div class="mb-4">
                    <label for="id" class="block font-bold">ID:</label>
                    <input type="text" id="id" name="id" required class="w-full px-3 py-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="description" class="block font-bold">Description:</label>
                    <input type="text" id="description" name="description" required class="w-full px-3 py-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="link" class="block font-bold">Link:</label>
                    <input type="text" id="link" name="link" required class="w-full px-3 py-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="allocation_date" class="block font-bold">Allocation Date:</label>
                    <input type="date" id="allocation_date" name="allocation_date" value="<?php echo date('Y-m-d'); ?>" required class="w-full px-3 py-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="closing_date" class="block font-bold">Closing Date:</label>
                    <input type="date" id="closing_date" name="closing_date" required class="w-full px-3 py-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="closing_time" class="block font-bold">Closing Time:</label>
                    <input type="time" id="closing_time" name="closing_time" required class="w-full px-3 py-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="associate" class="block font-bold">Associate:</label>
                    <select id="associate" name="associate" required class="w-full px-3 py-2 border rounded">
                        <!-- Populate this dropdown dynamically using JavaScript -->
                    </select>
                </div>
                <div class="mb-4">
                    <label for="status" class="block font-bold">Status:</label>
                    <select id="status" name="status" required class="w-full px-3 py-2 border rounded">
                        <option value="Pool">Pool</option>
                        <option value="Requested">Requested</option>
                        <option value="Received">Received</option>
                        <option value="Cancelled">Cancelled</option>
                        <option value="InQc">InQc</option>
                        <option value="Qc-accepted">Qc-accepted</option>
                        <option value="Qc-rejected">Qc-rejected</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="form_status" class="block font-bold">Form Status:</label>
                    <select id="form_status" name="form_status" required class="w-full px-3 py-2 border rounded">
                        <option value="Drafted">Drafted</option>
                        <option value="Pending">Pending</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="remarks" class="block font-bold">Remarks:</label>
                    <textarea id="remarks" name="remarks" class="w-full px-3 py-2 border rounded"></textarea>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-700 w-full">Assign RFQ</button>
            </form>
        </div>
    </div>
    <script src="assign_rfqs.js"></script>
</body>
</html>
