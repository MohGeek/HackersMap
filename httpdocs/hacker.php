<?php
require_once('config.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$argv = $_POST;

$sql = "INSERT INTO hackers (ip, port, name, date)
VALUES ('" . mysqli_escape_string($conn, $argv[1]) . "', '" . mysqli_escape_string($conn, $argv[2]) . "', '" . mysqli_escape_string($conn, $argv[3]) . "', '" . date('Y-m-d H:i:s') . "')";
$conn->query($sql);

$conn->close();
?>
