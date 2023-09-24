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

// Retrieve all users except the current Team Leader
$stmt = $db->prepare("SELECT username, alias, usertype FROM users WHERE username != :current_user");
$stmt->bindValue(":current_user", $_SESSION["username"], SQLITE3_TEXT);
$result = $stmt->execute();

if ($result) {
    $users = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $users[] = $row;
    }

    echo json_encode($users);
} else {
    echo json_encode([]);
}
?>
