<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Establish SQLite3 database connection

$db = new SQLite3("pkj.db");

// Create a table if it doesn't exist
$query = "CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT,
    alias TEXT,
    password TEXT,
    usertype TEXT
)";
$db->exec($query);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $alias = $_POST["alias"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $usertype = $_POST["usertype"];

    // Insert user data into the database
    $stmt = $db->prepare("INSERT INTO users (username, alias, password, usertype) VALUES (:username, :alias, :password, :usertype)");
    $stmt->bindValue(":username", $username, SQLITE3_TEXT);
    $stmt->bindValue(":alias", $alias, SQLITE3_TEXT);
    $stmt->bindValue(":password", $password, SQLITE3_TEXT);
    $stmt->bindValue(":usertype", $usertype, SQLITE3_TEXT);

    $result = $stmt->execute();

    if ($result) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false]);
    }
}
?>
