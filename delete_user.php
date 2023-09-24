<?php
// Start or resume the session
session_start();

// Check if the user is logged in and has the appropriate usertype
if (!isset($_SESSION["username"]) || ($_SESSION["usertype"] !== "teamleader")) {
    // Redirect to the login page if the user is not authenticated
    header("Location: login.html");
    exit();
}

// Retrieve the request data
$data = json_decode(file_get_contents("php://input"));

if ($data && isset($data->username)) {
    // Establish SQLite3 database connection
    $db = new SQLite3("pkj.db");

    // Delete the user
    $stmt = $db->prepare("DELETE FROM users WHERE username = :username");
    $stmt->bindValue(":username", $data->username, SQLITE3_TEXT);
    $result = $stmt->execute();

    if ($result) {
        // Fetch the updated user list
        $stmt = $db->prepare("SELECT username, alias, usertype FROM users WHERE username != :current_user");
        $stmt->bindValue(":current_user", $_SESSION["username"], SQLITE3_TEXT);
        $result = $stmt->execute();

        if ($result) {
            $users = [];
            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                $users[] = $row;
            }

            echo json_encode(["success" => true, "users" => $users]);
        } else {
            echo json_encode(["success" => true, "users" => []]);
        }
    } else {
        echo json_encode(["success" => false]);
    }
} else {
    http_response_code(400); // Bad Request
}
?>

