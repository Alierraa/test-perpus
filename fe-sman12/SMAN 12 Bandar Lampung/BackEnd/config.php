<?php
$servername = "localhost";
$username = "root";
$password = "pFQL3]luH-@]V.-F";
$dbname = "siperpus_sman12";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>