<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "scuola";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// close connection when query finished  !!! not here !!!
?>