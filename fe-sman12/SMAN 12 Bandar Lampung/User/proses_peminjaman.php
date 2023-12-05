<?php
session_start();
include 'config.php';

$id = isset($_GET['id']) ? $_GET['id'] : '';
$nama = isset($_GET['nama']) ? $_GET['nama'] : '';
$judul = isset($_GET['judul']) ? $_GET['judul'] : '';
$nomor = isset($_GET['nomor']) ? $_GET['nomor'] : '';
$jumlah = isset($_GET['jumlah']) ? $_GET['jumlah'] : '';
$tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : '';
$tenggat = isset($_GET['tenggat']) ? $_GET['tenggat'] : '';

// Masukkan data ke dalam tabel peminjaman
$sqlInsert = "INSERT INTO peminjaman (id, nama, judul, nomor, jumlah, tanggal, tenggat, status)
              VALUES ('$id', '$nama', '$judul', '$nomor', '$jumlah', '$tanggal', '$tenggat','menunggu')";
$resultInsert = mysqli_query($conn, $sqlInsert);

if (!$resultInsert) {
    // Gagal memasukkan data
    echo "Error: " . $sqlInsert . "<br>" . mysqli_error($conn);
} else {
    // Sukses memasukkan data, sekarang hapus data dari tabel cart_peminjaman
    $sqlDelete = "DELETE FROM cart_peminjaman WHERE id = '$id'";
    $resultDelete = mysqli_query($conn, $sqlDelete);

    if (!$resultDelete) {
        // Gagal menghapus data dari cart_peminjaman
        echo "Error deleting record: " . mysqli_error($conn);
    } else {
        header("location: ../user/keranjangpinjam.php");
    }
}

// Tutup koneksi database
mysqli_close($conn);
?>
