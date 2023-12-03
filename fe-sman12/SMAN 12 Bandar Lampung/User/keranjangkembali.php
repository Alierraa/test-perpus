<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>keranjangkembali</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
    <link rel="stylesheet" href="css/keranjangkembali.css" />
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
            <a href="homepagelogin.php">Beranda</a>
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
            <h3>Selesai Pinjam ?</h3>
            <h3>Kembalikan Tepat Waktu Ya</h3>
            <h3>Ke Perpustakaan SMAN 12 Bandar Lampung</h3>
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
                <p class="right"><a href="keranjangkembali.php">riwayat pengembalian</a> </p>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th></th>
                        <th></th>
                        <th>Nomor Buku</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Jumlah</th>
                        <th>Terlambat</th>
                        <th>Denda</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td><input type="checkbox" name="CHECK" value=""><br></td>
                        <td><img src="img/sman12.png" alt=""></td>
                        <td>xxx</td>
                        <td>123</td>
                        <td><input type="date"></td>
                        <td><input type="date"></td>
                        <td>40</td>
                        <td>2 Hari</td>
                        <td>Rp2000</td>

                    </tr>
                    <tr>
                        <td>2.</td>
                        <td><input type="checkbox" name="CHECK" value=""><br></td>
                        <td><img src="img/sman12.png" alt=""></td>
                        <td>xxx</td>
                        <td>123</td>
                        <td><input type="date"></td>
                        <td><input type="date"></td>
                        <td>40</td>
                        <td>2 Hari</td>
                        <td>Rp2000</td>

                    </tr>
                    <tr>
                        <td>3.</td>
                        <td><input type="checkbox" name="CHECK" value=""><br></td>
                        <td><img src="img/sman12.png" alt=""></td>
                        <td>xxx</td>
                        <td>123</td>
                        <td><input type="date"></td>
                        <td><input type="date"></td>
                        <td>40</td>
                        <td>2 Hari</td>
                        <td>Rp2000</td>


                    </tr>
                </tbody>
            </table>
            <div class="btnpinjam" style="position: absolute; left: 1250px; top: 400px;">
                <button onclick="openModal()">Ajukan Pengembalian</button>
            </div>
            <div id="myModal" class="overlay">
                <div class="modal">
                    <p>data pengembalian buku terupdate,<br>
                        ayok ke perpus kembalikan bukumu sekarang !<br>
                        ingat keterlambatan denda lohhh</p>
                    <button class="close-btn" onclick="closeModal()">Close</button>
                </div>
            </div>
        </div>
        </main>
    </section>

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