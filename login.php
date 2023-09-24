<?php
// Start a new session or resume the existing session
session_start();

// Establish SQLite3 database connection
$db = new SQLite3("pkj.db");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Retrieve user data from the database
    $stmt = $db->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindValue(":username", $username, SQLITE3_TEXT);
    $result = $stmt->execute();

    if ($result) {
        $row = $result->fetchArray(SQLITE3_ASSOC);

        if ($row && password_verify($password, $row["password"])) {
            // Store user information in the session
            $_SESSION["username"] = $username;
            $_SESSION["usertype"] = $row["usertype"];

            echo json_encode(["success" => true, "usertype" => $row["usertype"]]);
        } else {
            echo json_encode(["success" => false]);
        }
    } else {
        echo json_encode(["success" => false]);
    }
}
?>
