<?php
session_start();
include 'config.php';

$nama = isset($_GET['nama']) ? $_GET['nama'] : '';
$judul = isset($_GET['judul']) ? $_GET['judul'] : '';
$nomor = isset($_GET['nomor']) ? $_GET['nomor'] : '';
$jumlah = isset($_GET['jumlah']) ? $_GET['jumlah'] : '';
$tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : '';
$tenggat = isset($_GET['tenggat']) ? $_GET['tenggat'] : '';
$denda = isset($_GET['denda']) ? $_GET['denda'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';

$sql = "INSERT INTO pengembalian (nama,judul, nomor, tanggal, tenggat, jumlah,denda,status) VALUES ('$nama','$judul', '$nomor', '$tanggal', '$tenggat', '$jumlah','$denda','$status')";

if ($conn->query($sql) === TRUE) {
    header("Location: " . $_SERVER['HTTP_REFERER']);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi database
$conn->close();
?>
