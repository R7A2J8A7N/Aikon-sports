<?php 

$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'aikon-db';

$conn = mysqli_connect("$server","$username", "$password", "$dbname");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// mysqli_close($conn);

?>