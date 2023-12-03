<?php
include 'koneksi.php'; // Sesuaikan dengan file koneksi database Anda

// Cek apakah ID buku ada di URL
if (!isset($_GET['id'])) {
    echo "ID buku tidak ditemukan!";
    exit;
}

$id = $_GET['id']; // Mendapatkan ID dari URL

// Query untuk mendapatkan data buku
$query = "SELECT * FROM buku WHERE id = $id";
$result = mysqli_query($conn, $query);

// Jika buku tidak ditemukan
if (mysqli_num_rows($result) == 0) {
    echo "Buku tidak ditemukan!";
    exit;
}

$buku = mysqli_fetch_assoc($result);

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nomor_buku = $_POST['nomor'];
    $judul_buku = $_POST['judul'];
    $penerbit = $_POST['penerbit'];
    $pengarang = $_POST['pengarang'];
    $kategori = $_POST['kategori'];
    $tahun = $_POST['tahun'];
    $jumlah = $_POST['jumlah'];

    // Tangani upload sampul buku jika ada
    if ($_FILES['sampul']['name']) {
        // Tambahkan kode untuk menangani upload file di sini
    }

    // Query update data buku
    $update_query = "UPDATE buku SET nomor_buku = '$nomor_buku', judul_buku = '$judul_buku', penerbit = '$penerbit', pengarang = '$pengarang', kategori = '$kategori', tahun = '$tahun', jumlah = $jumlah WHERE id = $id";
    if (mysqli_query($conn, $update_query)) {
        echo "Data buku berhasil diperbarui!";
        // Redirect ke halaman buku.php atau tampilkan pesan sukses
    } else {
        echo "Gagal memperbarui data buku: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Buku</title>
    <!-- Sertakan file CSS Anda di sini -->
</head>

<body>
    <h2>Edit Buku</h2>
    <form id="popupForm" action="" method="post" enctype="multipart/form-data" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: white; padding: 20px; border-radius: 29px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); z-index:5; height:550px; background-image: url('assets/dashboard/bg\ popup.jpg');
      background-size: cover; /* Untuk memastikan gambar selalu menutupi seluruh latar belakang */
      background-repeat: no-repeat; /* Menghindari pengulangan gambar di latar belakang */">
        <!-- ID buku tersembunyi -->
        <input type="hidden" name="id" value="<?= $buku['id'] ?>">

        <label for="nomor"></label>
        <input type="text" id="nomorInput" name="nomor" placeholder="Nomor Buku" required
            value="<?= $buku['nomor_buku'] ?>"
            style="background-color: #f2f2f2; border-radius:20px; width:410px; height:45px; margin-bottom: 10px;"><br>

        <label for="judul"></label>
        <input type="text" id="judulInput" name="judul" placeholder="Judul Buku " required
            value="<?= $buku['judul_buku'] ?>"
            style="background-color: #f2f2f2; border-radius:20px; width:410px; height:45px; margin-bottom: 10px;"><br>

        <label for="penerbit"></label>
        <input type="text" id="penerbitInput" name="penerbit" placeholder="Penerbit" required
            value="<?= $buku['penerbit'] ?>"
            style="background-color: #f2f2f2; border-radius:20px; width:410px; height:45px; margin-bottom: 10px;"><br>

        <label for="pengarang"></label>
        <input type="text" id="pengarangInput" name="pengarang" placeholder="Pengarang" required
            value="<?= $buku['pengarang'] ?>"
            style="background-color: #f2f2f2; border-radius:20px; width:410px; height:45px; margin-bottom: 10px;"><br>


        <!-- Bagian untuk kategori -->
        <div style="flex: 1; margin-right: 10px;">
            <label for="kategori"></label>
            <select id="kategoriInput" name="kategori" required>
                <option value="pendidikan" <?= $buku['kategori'] == 'pendidikan' ? 'selected' : '' ?>>Pendidikan
                </option>
                <option value="fiksi" <?= $buku['kategori'] == 'fiksi' ? 'selected' : '' ?>>Fiksi</option>
                <option value="nonfiksi" <?= $buku['kategori'] == 'nonfiksi' ? 'selected' : '' ?>>Nonfiksi</option>
            </select><br>
        </div>

        <div style="flex: 1; margin-left: 10px;">
            <label for="tahun"></label>
            <input type="text" id="tahunInput" name="tahun" placeholder="Tahun" required value="<?= $buku['tahun'] ?>"
                style="background-color: #f2f2f2; border-radius:20px;"><br>
        </div>
        </div>

        <div style="display: flex; justify-content: space-between; width: 100%;">
            <div style="flex: 1; margin-right: 10px;">
                <label for="jumlah"></label>
                <input type="text" id="jumlahInput" name="jumlah" placeholder="Jumlah" required
                    value="<?= $buku['jumlah'] ?>" style="background-color: #f2f2f2; border-radius:20px;"><br>
            </div>
            <div style="flex: 1; margin-left: 10px;">
                <label for="sampul"></label>
                <input type="file" id="sampulInput" name="sampul" accept="image/*"><br>
                <!-- Tampilkan sampul buku saat ini jika ada -->
            </div>
        </div>

        <button type="submit"
            style="width: 430px; height: 50px; background: #9EDDFF; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 20px;">Simpan
            Perubahan</button>

        <button type="button" onclick="closePopup()"
            style="position: absolute; top: 10px; right: 10px; font-size: 20px; cursor: pointer;">X</button>
    </form>
</body>

</html>