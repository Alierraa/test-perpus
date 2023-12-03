<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idBuku = $_POST['id_buku'];
    $judulBuku = $_POST['judul_buku'];
    $stokTersedia = $_POST['stok_tersedia'];

    // Lakukan pemrosesan data di sini (kurangkan stok, tambahkan data peminjaman, dll.)
    // Contoh sederhana:
    $stokBaru = $stokTersedia - 1;
    // Simpan data peminjaman ke tabel peminjaman

    echo "Buku \"$judulBuku\" berhasil ditambahkan ke keranjang.";
}
?>