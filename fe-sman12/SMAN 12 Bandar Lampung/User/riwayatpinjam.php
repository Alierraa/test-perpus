<?php
session_start();

include 'config.php';

// Fetch data from the "peminjaman" table
$queryPeminjaman = "SELECT * FROM peminjaman";
$resultPeminjaman = mysqli_query($conn, $queryPeminjaman);

// Check if the query was successful
if (!$resultPeminjaman) {
    die("Query failed: " . mysqli_error($conn));
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>riwayatpinjam</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
    <link rel="stylesheet" href="css/riwayatpinjam.css" />
    <style>
    /* Styling for the overlay */
    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        justify-content: center;
        align-items: center;
        z-index: 1;
    }

    /* Styling for the modal */
    .modal {
        background-color: #fff;
        width: 860px;
        height: 135px;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        text-align: center;
    }

    .modal p {
        font-size: 18px;
        color: red;
    }

    /* Close button styling */
    .close-btn {
        cursor: pointer;
        margin-top: 10px;
        padding: 10px 20px;
        background-color: #007BFF;
        color: #fff;
        border: none;
        border-radius: 5px;
    }
    </style>
</head>

<body>
    <header class="header">
        <a href="#" class="logo"><img src="img/sman12.png" alt="" /></a>
        <nav class="navbar">
            <a href="#">Beranda</a>
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
            <h3>Daftar Riwayat </h3>
            <h3>Peminjaman Buku Mu</h3>
            <form action="">
                <div class="form-input">
                    <input type="search" placeholder="cari ..." />
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

    <section class="hero">
        <div class="table-data">
            <div class="head">

            </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Buku</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Jumlah</th>
                        <th>Status Peminjaman</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1; 
                    while ($rowPeminjaman = mysqli_fetch_assoc($resultPeminjaman)) {
                        $rowColor = ($no % 2 == 0) ? '#9EDDFF' : '#F4F4F4'; 
                        echo "<tr style='background-color: {$rowColor};'>";
                        echo "<td style='text-align: center;'>{$no}</td>";
                        echo "<td style='text-align: center;'>{$rowPeminjaman['nomor']}</td>";
                        echo "<td style='text-align: center;'>{$rowPeminjaman['judul']}</td>";
                        echo "<td style='text-align: center;'>{$rowPeminjaman['tanggal']}</td>";
                        echo "<td style='text-align: center;'>{$rowPeminjaman['tenggat']}</td>";
                        echo "<td style='text-align: center;'>{$rowPeminjaman['jumlah']}</td>";
                        echo "<td style='text-align: center;'>{$rowPeminjaman['status']}</td>";
                        echo "</tr>";
                        $no++; 
                    }
                    ?>
                </tbody>
            </table>

            </main>
    </section>

    <script>

    </script>
</body>

</html>