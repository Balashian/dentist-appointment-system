<?php
if (basename($_SERVER["PHP_SELF"]) == basename(__FILE__)) {
    header("Location: ../../index.php");
    exit();
}
$host = "localhost";
$dbname = "teeth_clinic";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>