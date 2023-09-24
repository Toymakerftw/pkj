<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Establish SQLite3 database connection
$db = new SQLite3("pkj.db");

// Create a table if it doesn't exist
$query = " CREATE TABLE IF NOT EXISTS solicitation (
    id INTEGER PRIMARY KEY,
    sol_id VARCHAR(30) NOT NULL UNIQUE,
    description VARCHAR(30),
    link VARCHAR(100),
    allocation_date DATE,
    closing_date DATE,
    closing_time TIME,
    associate VARCHAR(30),
    status VARCHAR(10),
    form_status VARCHAR(10),
    remarks VARCHAR(100)
)";
$db->exec($query);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $description = $_POST["description"];
    $link = $_POST["link"];
    $allocation_date = $_POST["allocation_date"];
    $closing_date = $_POST["closing_date"];
    $closing_time = $_POST["closing_time"];
    $associate = $_POST["associate"];
    $status = $_POST["status"];
    $form_status = $_POST["form_status"];
    $remarks = $_POST["remarks"];

    // Insert user data into the database
    $stmt = $db->prepare("INSERT INTO solicitation (sol_id, description, link, allocation_date, closing_date, closing_time, associate, status, form_status, remarks) VALUES (:sol_id, :description, :link, :allocation_date, :closing_date, :closing_time, :associate, :status, :form_status, :remarks)");

    // Bind values to placeholders
    $stmt->bindValue(":sol_id", $id, SQLITE3_INTEGER);
    $stmt->bindValue(":description", $description, SQLITE3_TEXT);
    $stmt->bindValue(":link", $link, SQLITE3_TEXT);
    $stmt->bindValue(":allocation_date", $allocation_date, SQLITE3_TEXT);
    $stmt->bindValue(":closing_date", $closing_date, SQLITE3_TEXT);
    $stmt->bindValue(":closing_time", $closing_time, SQLITE3_TEXT);
    $stmt->bindValue(":associate", $associate, SQLITE3_TEXT);
    $stmt->bindValue(":status", $status, SQLITE3_TEXT);
    $stmt->bindValue(":form_status", $form_status, SQLITE3_TEXT);
    $stmt->bindValue(":remarks", $remarks, SQLITE3_TEXT);

    // Execute the statement
    $result = $stmt->execute();

    // Assuming the data is successfully inserted into the database
    $response = ["success" => true];
    echo json_encode($response);
} else {
    // Handle any other cases, if necessary
    $response = ["success" => false];
    echo json_encode($response);
}
?>


