<?php
session_start();

// Cek apakah pengguna sudah login, jika belum, redirect ke halaman login
if (!isset($_SESSION['username'])) {
    header("location: ../Admin/login.php");
    exit();
}

include 'koneksi.php';
if (isset($_POST['id'], $_POST['status'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];

    // Perform the database update
    $sql = "UPDATE pengembalian SET status = '$status' WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Update successful
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        // Update failed
        echo "Error updating status: " . mysqli_error($conn);
    }
} else {
    // Missing parameters
    echo "Invalid request";
}


// Fetch data from the "pengembalian" table
$queryPengembalian = "SELECT * FROM pengembalian";
$resultPengembalian = mysqli_query($conn, $queryPengembalian);

// Check if the query was successful
if (!$resultPengembalian) {
    die("Query failed: " . mysqli_error($conn));
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengembalian</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/global.css">
</head>

<body>
    <div class="container-fluid">
        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>

        <!-- Header -->
        <?php
        // Set a variable to be used in header.php
        $customHeaderContent = '<div class="halamansaatini">
                                    <a href="pengembalian.php">Pengembalian</a>
                                </div>';
    ?>

        <!-- Include the header.php file -->
        <?php include 'header.php'; ?>

        <!-- Konten -->

    </div>

    <div class="content" id="pengembalianContent">
        <h1 style=" font-size: 15px; position: absolute; left: 350px;  top: 110px;">
            Dashboard > Pengembalian
        </h1>

        <h2 style="font-size: 15px; position: absolute; left: 350px; top: 240px;">
            Validasi Pengembalian
        </h2>


        <form id="carinamaform" style="position: absolute; left: 881px; top: 184px;">
            <label for="search" style="position: relative; display: inline-block;">
                <input type="search" name="search" id="search" placeholder="Search ..."
                    style="width: 300px; height: 32px; border-radius: 20px; box-shadow: inset 0px 4px 4px rgba(0, 0, 0, 0.25);">
                <img src="assets/global/iconsearch.png" alt="Search Icon"
                    style="position: absolute; left: 210px; top: 50%; transform: translateY(-50%) scale(0.2); cursor:pointer">
            </label>
        </form>

        <button style=" position: absolute; 
                        width: 130px;
                        height: 32px;
                        border-radius: 20px;
                        left: 1040px;
                        top: 240px;
                        background-color: #6499E9;
                        cursor: pointer;
                        color: white; /* Set text color to white */
                        transition: background-color 0.3s; /* Add transition for smooth color change */
                        display: flex;
                        font-size: 12px;
                        font-weight: bold;
                        align-items: center;
        " onmouseover="this.style.backgroundColor='#ff0000'" onmouseout="this.style.backgroundColor='#6499E9'"
            onclick="window.location.href='riwayatkembali.php';">
            <img src="assets/global/icon history.png" alt="Tambah Buku"
                style="width: 18px; height: 27px; margin-right: 5px;">
            <span>Lihat Riwayat</span>
        </button>





        <table style="position: absolute;
              background-color: #9EDDFF;
              border-collapse: collapse;
              border-top-left-radius: 20px;
              border-top-right-radius: 20px;
              width: 838px;
              left: 350px;
              top: 280px;
              font-size: 20px;">
            <thead>
                <tr style="font-weight: bold;">
                    <!-- Kolom "No" -->
                    <td style="text-align: center; padding: 10px;">No</td>

                    <!-- Kolom "Nama" -->
                    <td style="text-align: center; padding: 10px;">Nama</td>

                    <!-- Kolom "Judul" -->
                    <td style="text-align: center; padding: 10px;">Judul</td>

                    <!-- Kolom "Tanggal" -->
                    <td style="text-align: center; padding: 10px;">Tanggal</td>

                    <!-- Kolom "Tenggat" -->
                    <td style="text-align: center; padding: 10px;">Tenggat</td>

                    <!-- Kolom "jumlah" -->
                    <td style="text-align: center; padding: 10px;">Jumlah</td>

                    <!-- Kolom "denda" -->
                    <td style="text-align: center; padding: 10px;">Denda</td>

                    <!-- Kolom "aksi" -->
                    <td style="text-align: center; padding: 10px;">Aksi</td>
                </tr>
            </thead>
            <tbody>
            <tbody>
                <?php
$no = 1; // Initialize a variable to store the sequential number
while ($rowPengembalian = mysqli_fetch_assoc($resultPengembalian)) {
    $rowColor = ($no % 2 == 0) ? '#9EDDFF' : '#F4F4F4'; // Set background color based on row number
    echo "<tr style='background-color: {$rowColor};'>";
    echo "<td style='text-align: center;'>{$no}</td>"; // Display the sequential number
    echo "<td style='text-align: center;'>{$rowPengembalian['nama']}</td>";
    echo "<td style='text-align: center;'>{$rowPengembalian['judul']}</td>";
    echo "<td style='text-align: center;'>{$rowPengembalian['tanggal']}</td>";
    echo "<td style='text-align: center;'>{$rowPengembalian['tenggat']}</td>";
    echo "<td style='text-align: center;'>{$rowPengembalian['jumlah']}</td>";
    echo "<td style='text-align: center;'>Rp. {$rowPengembalian['denda']}</td>";
    // You can add the actions column as needed
    $statusColor = '';
    if ($rowPengembalian['status'] == 'menunggu') {
        $statusColor = 'color: gray;';
    } elseif ($rowPengembalian['status'] == 'disetujui') {
        $statusColor = 'color: green;';
    } elseif ($rowPengembalian['status'] == 'ditolak') {
        $statusColor = 'color: red;';
    }
    echo "<td style='text-align: center; padding: 10px; {$statusColor}'>{$rowPengembalian['status']}</td>";

    if($rowPengembalian['status'] == 'menunggu') {
    echo "<td style='text-align: center; padding: 10px;'>
            <a href='javascript:void(0)' class='status-link' style='color:green' data-status='disetujui' data-id='{$rowPengembalian['id']}'>Disetujui</a>
            <a href='javascript:void(0)' class='status-link' style='color:red' data-status='ditolak' data-id='{$rowPengembalian['id']}'>Ditolak</a>
            <img src='assets/global/iconhapus.png' alt='Hapus' style='cursor:pointer; scale: 0.7' onclick='hapusData(this)' data-id='{$rowPengembalian['id']}'>
        </td>";
    } else if($rowPengembalian['status'] == 'disetujui') {
        echo "<td style='text-align: center; padding: 10px;'>
            <a href='javascript:void(0)' class='status-link' style='color:red' data-status='ditolak' data-id='{$rowPengembalian['id']}'>Ditolak</a>
            <a href='javascript:void(0)' class='status-link' style='color:gray' data-status='menunggu' data-id='{$rowPengembalian['id']}'>Menunggu</a>
            <img src='assets/global/iconhapus.png' alt='Hapus' style='cursor:pointer; scale: 0.7' onclick='hapusData(this)' data-id='{$rowPengembalian['id']}'>
        </td>";
    } else if($rowPengembalian['status'] == 'ditolak'){
        echo "<td style='text-align: center; padding: 10px;'>
            <a href='javascript:void(0)' class='status-link' style='color:green' data-status='disetujui' data-id='{$rowPengembalian['id']}'>Disetujui</a>
            <a href='javascript:void(0)' class='status-link' style='color:gray' data-status='menunggu' data-id='{$rowPengembalian['id']}'>Menunggu</a>
            <img src='assets/global/iconhapus.png' alt='Hapus' style='cursor:pointer; scale: 0.7' onclick='hapusData(this)' data-id='{$rowPengembalian['id']}'>
        </td>";
    }
    echo "</tr>";
    $no++; // Increment the sequential number for the next row
}
?>

            </tbody>
            </tbody>
        </table>
    </div>


    <!-- Popup -->
    <?php include 'popup.php'; ?>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Get all elements with the class 'status-link'
            var statusLinks = document.querySelectorAll('.status-link');

            // Add click event listeners to each status link
            statusLinks.forEach(function (link) {
                link.addEventListener('click', function (event) {
                    event.preventDefault();

                    // Get the data attributes
                    var status = this.getAttribute('data-status');
                    var id = this.getAttribute('data-id');

                    // Perform AJAX request to update the status
                    updateStatus(id, status);
                });
            });

            // Function to perform the AJAX request
            function updateStatus(id, status) {
                console.log('Updating status:', id, status);
                // Create a new XMLHttpRequest object
                var xhr = new XMLHttpRequest();

                xhr.open('POST', 'pengembalian.php', true);

                // Set the request header
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                xhr.onload = function() {
                    if (xhr.status === 200) {
                        // Success
                        // Reload the page after a short delay
                        setTimeout(function() {
                            location.reload();
                        }, 500);
                    } else {
                        // Error
                        alert('Error: ' + xhr.status);
                    }
                };

                // Prepare the data to be sent in the request body
                var data = 'id=' + encodeURIComponent(id) + '&status=' + encodeURIComponent(status);

                // Send the request with the data
                xhr.send(data);
            }
        });
    </script>

    <script>
        // Fungsi hapusData untuk menghapus data dengan konfirmasi
        function hapusData(element) {
            var idToDelete = element.getAttribute('data-id');
            var confirmation = confirm("Apakah Anda yakin ingin menghapus data ini?");
            if (confirmation) {
                window.location.href = 'hapus_data.php?id=' + idToDelete + '&name=pengembalian';
            }
        }
    </script>
    <script src=" https://code.jquery.com/jquery-3.2.1.slim.min.js "></script>
    <script src=" https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js "></script>
    <script src=" https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js "></script>
    <script src=" script/global.js">
    </script>

</body>

</html>