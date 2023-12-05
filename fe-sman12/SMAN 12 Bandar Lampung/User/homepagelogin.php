<?php
// Menggabungkan koneksi dan query untuk mendapatkan data buku dari database
include 'config.php';
$queryBuku = $conn->query("SELECT * FROM buku");
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIPERPUS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
    <link rel="stylesheet" href="css/homepagelogin.css" />
    <style>
    /* Tambahkan CSS untuk menyesuaikan tata letak tombol Tambahkan */
    .boxcard .box .stok-text {
        margin-bottom: 10px;
        /* Sesuaikan dengan nilai yang sesuai */
    }

    .boxcard .box .btn {
        margin-top: 10px;
        /* Sesuaikan dengan nilai yang sesuai */
    }
    </style>



    <style>
    /* Aturan CSS untuk mengatur gambar */
    .boxcard .box img {
        max-width: 100%;
        /* batasi lebar gambar agar tidak melebihi kontainernya */
        max-height: 150px;
        /* batasi tinggi gambar */
        object-fit: contain;
        /* pastikan gambar tidak terdistorsi */
        margin: 25px;
        /* beri ruang di atas dan bawah gambar */
        display: block;
        /* membuat gambar menjadi block-level element */

    }
    </style>

</head>

<body>
    <header class="header">
        <a href="#" class="logo"><img src="img/sman12.png" alt="" /></a>
        <nav class="navbar">
            <a href="">Beranda</a>
            <div class="dropdown">
                <a href="#">Kategori <i class="bx bx-chevron-down"></i> </a>
                <div class="dropdown-content">
                    <a href="pendidikan.php">Pendidikan</a>
                    <a href="fiksi.php">Fiksi</a>
                    <a href="nonfiksi.php">Non-Fiksi</a>
                </div>
            </div>
            <a href="profile.php">Profil Saya</a>
            <a href="../FrontEnd Sistem Informasi Perpustakaan SMAN 12 Bandar Lampung/Login.php">Keluar</a>
        </nav>

        <div class="icons">
            <div class="dropdownicons">
                <a href="keranjangpinjam.php" style="color: white"><i class="bx bxs-cart-alt"></i><i
                        class="bx bx-chevron-down"></i></a>
                <div class="dropdown-contenticons">
                    <a href="keranjangkembali.php" style="color: white"><i class="bx bxs-archive-out"></i></a>
                    <a href="notif.php" style="color: white"><i class="bx bxs-message-dots"></i></a>
                </div>
            </div>
        </div>
    </header>

    <section class="home">
        <div class="content">
            <h3>Selamat Datang !</h3>
            <h3>Mau Baca Buku Apa Hari Ini ?</h3>
            <form action="">
                <div class="form-input">
                    <input type="search" placeholder="cari bukumu..." />
                    <button type="submit" class="search-btn">
                        <i class="bx bx-search-alt"></i>
                    </button>
                </div>
            </form>
        </div>
        <div class="imghome">
            <img src="img/book.png" alt="" />
        </div>
    </section>

    <section class="card" id="card">
        <div class="text">
            <h3>Pilih Bukunya dan Tambahkan Ke Keranjang Mu</h3>
            <p>
                Pinjam buku kini jadi lebih mudah. Ayok pinjam dan baca buku sekarang!
            </p>
        </div>
        <div class="boxcard">
            <?php
            // Loop through hasil query dan tampilkan data buku di dalam box
            while ($row = $queryBuku->fetch_assoc()) {
            ?>
            <div class="box">
                <!-- Ganti img dengan data gambar dari database -->
                <img src="uploads/<?php echo $row['sampul']; ?>" alt="">

                <!-- Ganti Judul Buku dengan data judul dari database -->
                <p><?php echo $row['judul_buku']; ?></p>

                <!-- Ganti Stok Tersedia dengan data stok dari database -->
                <p class="stok-text">Stok Tersedia: <?php echo $row['jumlah']; ?></p>

                <a href="add_chart.php?judul=<?php echo urlencode($row['judul_buku']); ?>&nomor=<?php echo $row['nomor_buku']; ?>&jumlah=1" class="btn">Tambahkan</a>
            </div>



            <?php
            }
            ?>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        var currentIndex = 0;
        var numBooks = $(".boxcard .box").length;
        var visibleBooks = 4;

        $("#prevBtn").click(function() {
            if (currentIndex > 0) {
                currentIndex -= visibleBooks;
                if (currentIndex < 0) {
                    currentIndex = 0;
                }
                updateBooks();
            }
        });

        $("#nextBtn").click(function() {
            if (currentIndex + visibleBooks < numBooks) {
                currentIndex += visibleBooks;
                updateBooks();
            }
        });

        function updateBooks() {
            var translateX = -currentIndex * (200 + 20) + "px";
            $(".boxcard").css("transform", "translateX(" + translateX + ")");
        }
    });
    </script>
</body>

</html>