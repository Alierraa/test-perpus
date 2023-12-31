<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
    <link rel="stylesheet" href="css/profile.css" />
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
            <h3> Hai Amma !</h3>
            <h3>Ini Halaman Profile Kamu</h3>
            <div class="sosmed">
                <a href="https://www.instagram.com/radsgn89/"><i class='bx bxl-instagram-alt'>@radsgn89</i></a>
                <a href=""><i class='bx bxs-phone-call'></i>0831-3880-0039</a>
            </div>
        </div>
        </form>
        </div>
        <div class="imghome">
            <img src="img/profile.png" alt="" />
        </div>
    </section>

    <section class="biodata">
        <h3 style="font-size: 18px;">Pengaturan Data Diri </h3>
        <div class="cardbio">
            <div class="form-group">
                <div class="overlay" id="overlay" style="display: none;">

                </div>
                <label class="form-label">Username</label>
                <input type="text" class="form-control mb-1" value="amma" readonly>
            </div>
            <div class="form-group">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" value=" Rahma Wati" readonly>
            </div>
            <div class="form-group">
                <label class="form-label">E-mail</label>
                <input type="text" class="form-control mb-1" value="rahma@mail.com" readonly>
            </div>
            <div class="form-group">
                <label class="form-label">NIS</label>
                <input type="text" class="form-control" value=" 119119119." readonly>
            </div>
            <div class="form-group">
                <label class="form-label">Kelas</label>
                <input type="text" class="form-control" value=" XI IPA 1." readonly>
            </div>
            <div class="form-group">
                <label class="form-label">Alamat</label>
                <input type="text" class="form-control" value=" Perum Kita Bersama Nanti." readonly>
            </div>
            <button type="button" class="btn btn-primary" onclick="toggleEditMode()">Edit</button>
            <button type="button" class="btn btn-success" onclick="saveChanges()">Simpan</button>
        </div>
    </section>

    <script>
    function toggleEditMode() {
        var formControls = document.querySelectorAll('.form-control');
        var overlay = document.getElementById('overlay');

        formControls.forEach(function(control) {
            control.readOnly = !control.readOnly;
        });

        // Toggle the display of the overlay
        overlay.style.display = overlay.style.display === 'none' ? 'flex' : 'none';
    }

    function saveChanges() {
        // Perform actions to save changes (e.g., send data to the server)
        alert('Changes saved!');
    }

    // Function to initialize the form with readonly attributes
    function initializeForm() {
        var formControls = document.querySelectorAll('.form-control');
        var overlay = document.getElementById('overlay');

        formControls.forEach(function(control) {
            control.readOnly = true;
        });

        // Display the overlay initially
        overlay.style.display = 'flex';
    }

    // Call initializeForm when the page loads
    window.onload = initializeForm;
    </script>
</body>

</html>