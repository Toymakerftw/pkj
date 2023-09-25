<?php
session_start();

if (!isset($_SESSION["username"]) || ($_SESSION["usertype"] !== "associate")) {
    header("Location: login.html");
    exit();
}

$db = new SQLite3("pkj.db");

if (!$db) {
    die("Database connection failed.");
}

$associateUsername = $_SESSION["username"];

$query = "SELECT sol_id, description, link, allocation_date, closing_date, closing_time, associate, status FROM solicitation WHERE associate = :associateUsername";
$stmt = $db->prepare($query);
$stmt->bindValue(':associateUsername', $associateUsername, SQLITE3_TEXT);
$result = $stmt->execute();

// Query to get the count of assigned RFQs
$countQuery = "SELECT COUNT(*) as count FROM solicitation WHERE associate = :associateUsername";
$countStmt = $db->prepare($countQuery);
$countStmt->bindValue(':associateUsername', $associateUsername, SQLITE3_TEXT);
$countResult = $countStmt->execute();
$countRow = $countResult->fetchArray(SQLITE3_ASSOC);
$assignedRFQCount = $countRow['count'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Associate Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <style>
        .border-a {
            border: none;
        }
        .hidden {
            display: none;
        }
        #table-container {
            overflow-x: auto;
        }
    </style>
</head>
<body class="bg-gray-200">
    <?php include 'navbar.php'; ?>
    <div class="flex justify-center items-center h-screen">
        <div class=" w-full sm:w-3/4 bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl text-center mb-4">Welcome, Associate!</h1>
            <p class="text-center">This is the dashboard for associates. You can access your tasks and information here.</p>

            <!-- Display assigned RFQ count -->
            <h2 class="text-lg mt-4">Your Assigned RFQs: <?php echo $assignedRFQCount; ?></h2>

            <div id="table-container">
                <table class="w-full border-collapse mt-4 hidden" id="rfq-table">
                    <thead>
                        <tr>
                            <th class="border-a">ID</th>
                            <th class="border-a">Description</th>
                            <th class="border-a">Link</th>
                            <th class="border-a">Allocation Date</th>
                            <th class="border-a">Closing Date</th>
                            <th class="border-a">Closing Time</th>
                            <th class="border-a">Associate</th>
                            <th class="border-a">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetchArray(SQLITE3_ASSOC)): ?>
                            <tr>
                                <td class="border-a"><?php echo $row['sol_id']; ?></td>
                                <td class="border-a"><?php echo $row['description']; ?></td>
                                <td class="border-a"><?php echo $row['link']; ?></td>
                                <td class="border-a"><?php echo $row['allocation_date']; ?></td>
                                <td class="border-a"><?php echo $row['closing_date']; ?></td>
                                <td class="border-a"><?php echo $row['closing_time']; ?></td>
                                <td class="border-a"><?php echo $row['associate']; ?></td>
                                <td class="border-a"><?php echo $row['status']; ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

            <button onclick="showTable()" class="block mt-4 text-white-500 hover:text-white-700 text-center">View Assigned RFQ</button>
            <a href="logout.php" class="block mt-4 text-blue-500 hover:text-blue-700 text-center">Logout</a>
        </div>
    </div>

    <script>
        function showTable() {
            const table = document.getElementById('rfq-table');
            const container = document.getElementById('table-container');
            
            if (table && container) {
                table.classList.remove('hidden');
                container.style.width = table.offsetWidth + 'px';
            }
        }
    </script>
</body>
</html>

<?php
$db->close();
?>
