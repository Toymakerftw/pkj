<?php
// Start or resume the session
session_start();

// Check if the user is logged in as a Team Leader
if (!isset($_SESSION["username"]) || $_SESSION["usertype"] !== "teamleader") {
    http_response_code(403); // Forbidden
    exit();
}

// Establish SQLite3 database connection
$db = new SQLite3("pkj.db");

// Retrieve all associates
$stmt = $db->prepare("SELECT username, alias FROM users WHERE usertype = 'associate'");
$result = $stmt->execute();

if ($result) {
    $associates = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $associates[] = $row;
    }

    echo json_encode($associates);
} else {
    echo json_encode([]);
}
?>
