<?php
$host = getenv('DB_HOST') ?: "localhost"; 
$username = getenv('DB_USERNAME') ?: "root"; 
$password = getenv('DB_PASSWORD') ?: ""; 
$database = getenv('DB_NAME') ?: "aikon-db"; 

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    error_log("Database connection failed: " . $conn->connect_error);
    header("Location: ../errors/db.php");
    exit;
}
?>