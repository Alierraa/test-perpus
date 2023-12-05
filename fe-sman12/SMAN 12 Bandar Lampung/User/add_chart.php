<?php
session_start();
include 'config.php';

$judul = isset($_GET['judul']) ? $_GET['judul'] : '';
$nomor = isset($_GET['nomor']) ? $_GET['nomor'] : '';
$jumlah = isset($_GET['jumlah']) ? $_GET['jumlah'] : '';

$stmt = $conn->prepare("INSERT INTO cart_peminjaman (nama, judul, nomor, jumlah) VALUES (?, ?, ?, ?)
    ON DUPLICATE KEY UPDATE jumlah = jumlah + VALUES(jumlah)");

$stmt->bind_param("sssi", $nama, $judul, $nomor, $jumlah);

$nama = $_SESSION['username'];

$stmt->execute();

$stmt->close();

$conn->close();

header("location: ../user/homepagelogin.php");
?>
