<?php
include 'koneksi.php'; // Pastikan file koneksi.php sudah benar

$id = $_GET['id']; // Mendapatkan ID dari URL

// Query untuk menghapus data buku
$query = "DELETE FROM buku WHERE id = $id";
$result = mysqli_query($conn, $query);

if($result){
    // Redirect kembali ke buku.php atau tampilkan pesan sukses
    header('Location: buku.php');
} else {
    echo "Gagal menghapus data";
}
?>