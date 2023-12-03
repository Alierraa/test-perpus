<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Pengecekan login untuk admin
    $queryAdmin = $conn->prepare("SELECT * FROM admin WHERE username = ?");
    $queryAdmin->bind_param("s", $username);
    $queryAdmin->execute();
    $resultAdmin = $queryAdmin->get_result();

    // Pengecekan login untuk siswa
    $querySiswa = $conn->prepare("SELECT * FROM siswa WHERE username = ?");
    $querySiswa->bind_param("s", $username);
    $querySiswa->execute();
    $resultSiswa = $querySiswa->get_result();

    if ($resultAdmin->num_rows == 1) {
        $user = $resultAdmin->fetch_assoc();
        if ($password == $user['password']) {
            $_SESSION['username'] = $username;
            header("location: ../Admin/dashboard.php");
        } else {
            header("location: ../Admin/login.php?error=Password Salah");
        }
    } elseif ($resultSiswa->num_rows == 1) {
        $user = $resultSiswa->fetch_assoc();
        if ($password == $user['password']) {
            $_SESSION['username'] = $username;
            header("location: ../user/homepagelogin.php");
        } else {
            header("location: ../Admin/login.php?error=Password Salah");
        }
    } else {
        header("location: ../Admin/login.php?error=Pengguna Tidak Ditemukan");
    }

    $queryAdmin->close();
    $querySiswa->close();
    $conn->close();
}
?>