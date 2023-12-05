<?php
session_start();

// Cek apakah pengguna sudah login, jika belum, redirect ke halaman login
if (!isset($_SESSION['username'])) {
    header("location: ../Admin/login.php");
    exit();
}

include 'config.php';

// Fetch data from the "cart_peminjaman" table
$queryCartPeminjaman = "SELECT * FROM cart_peminjaman";
$resultPeminjaman = mysqli_query($conn, $queryCartPeminjaman);

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
    <title>keranjangpinjam</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
    <link rel="stylesheet" href="css/keranjangpinjam.css" />
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
            <h3>Keranjang Buku Mu</h3>
            <h3>Ayo Pinjam Sekarang</h3>
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

    <section class="hero">
        <div class="table-data">
            <div class="head">
                <p class="right"><a href="riwayatpinjam.php">riwayat peminjaman</a> </p>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Nomor Buku</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $no = 1;
                    while ($rowPeminjaman = mysqli_fetch_assoc($resultPeminjaman)) {
                        $rowColor = ($no % 2 == 0) ? '#9EDDFF' : '#F4F4F4';
                        echo "<tr style='background-color: {$rowColor};'>";
                        echo "<td style='text-align: center;'>{$no}</td>";
                        echo "<td style='text-align: center;'>{$rowPeminjaman['nama']}</td>";
                        echo "<td style='text-align: center;'>{$rowPeminjaman['nomor']}</td>";
                        echo "<td style='text-align: center;'>{$rowPeminjaman['judul']}</td>";
                        echo "<td style='text-align: center;'><input type='date' id='tanggal{$no}'></td>";
                        echo "<td style='text-align: center;'><input type='date' id='tenggat{$no}'></td>";
                        echo "<td style='text-align: center;'>{$rowPeminjaman['jumlah']}</td>";
                        echo "<td style='text-align: center; padding: 10px;'>
                            <a href='#' id='ajukan{$no}' data-id='{$rowPeminjaman['id']}' data-nama='{$rowPeminjaman['nama']}' data-judul='{$rowPeminjaman['judul']}' data-nomor='{$rowPeminjaman['nomor']}' data-jumlah='{$rowPeminjaman['jumlah']}'>Ajukan</a>
                            <a href='#' id='delete{$no}' data-id='{$rowPeminjaman['id']}'>Delete</a>
                            </td>";
                        echo "</tr>";
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
            <div class="btnpinjam" style="position: absolute; left: 1250px; top: 400px;">
                <button onclick="openModal()">Ajukan Peminjaman</button>
            </div>
            <div id="myModal" class="overlay">
                <div class="modal">
                    <p>peminjaman buku diproses, <br>
                        ayok ke perpus ambil bukumu sekarang !</p><br><br>
                    <button class="close-btn" onclick="closeModal()">Close</button>
                </div>
            </div>
        </div>
        </main>
    </section>
    <script>
        <?php for ($i = 1; $i <= $no; $i++) : ?>
            document.getElementById('delete<?php echo $i; ?>').addEventListener('click', function () {
                var idToDelete = this.getAttribute('data-id');
                var confirmation = confirm("Apakah Anda yakin ingin menghapus data ini?");
                if (confirmation) {
                    window.location.href = 'hapus_data.php?id=' + idToDelete + '&name=cart_peminjaman';
                }
            });
        <?php endfor; ?>
    </script>
    <script>
        // Tambahkan event listener untuk setiap input tanggal
        <?php for ($i = 1; $i <= $no; $i++) : ?>
            document.getElementById('tanggal<?php echo $i; ?>').addEventListener('change', function () {
                updateHref(<?php echo $i; ?>, 'tanggal');
            });

            // Tambahkan event listener untuk setiap input tenggat
            document.getElementById('tenggat<?php echo $i; ?>').addEventListener('change', function () {
                updateHref(<?php echo $i; ?>, 'tenggat');
            });
        <?php endfor; ?>

        function updateHref(index, type) {
            // Ambil nilai tanggal dan tenggat dari input
            var tanggalValue = document.getElementById('tanggal' + index).value;
            var tenggatValue = document.getElementById('tenggat' + index).value;

            // Ambil elemen <a> yang sesuai dengan index
            var ajukanLink = document.getElementById('ajukan' + index);

            // Dapatkan data judul dan nomor dari atribut data
            var judul = ajukanLink.getAttribute('data-judul');
            var nomor = ajukanLink.getAttribute('data-nomor');
            var jumlah = ajukanLink.getAttribute('data-jumlah');
            var nama = ajukanLink.getAttribute('data-nama');
            var id = ajukanLink.getAttribute('data-id');

            // Update href berdasarkan jenis perubahan (tanggal atau tenggat)
            if (type === 'tanggal') {
                ajukanLink.href = 'proses_peminjaman.php?judul=' + encodeURIComponent(judul) +
                    '&id=' + id +
                    '&nomor=' + nomor +
                    '&jumlah=' + jumlah +
                    '&nama=' + nama +
                    '&tanggal=' + tanggalValue +
                    '&tenggat=' + tenggatValue;
            } else if (type === 'tenggat') {
                ajukanLink.href = 'proses_peminjaman.php?judul=' + encodeURIComponent(judul) +
                    '&id=' + id +
                    '&nomor=' + nomor +
                    '&jumlah=' + jumlah +
                    '&nama=' + nama +
                    '&tanggal=' + tanggalValue +
                    '&tenggat=' + tenggatValue;
            }
        }
    </script>
    <script>
    // Function to open the modal
    function openModal() {
        document.getElementById('myModal').style.display = 'flex';
    }

    // Function to close the modal
    function closeModal() {
        document.getElementById('myModal').style.display = 'none';
    }
    </script>
</body>

</html>