<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['userid'])) {
    header("location:login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fotoid = $_POST['fotoid'];
    $judulfoto = $_POST['judulfoto'];
    $deskripsifoto = $_POST['deskripsifoto'];
    $albumid = $_POST['albumid'];

    // Periksa apakah file diunggah
    if ($_FILES['lokasifile']['error'] == 0) {
        $lokasifile = $_FILES['lokasifile']['name'];
        $lokasi_temp = $_FILES['lokasifile']['tmp_name'];

        // Upload file ke direktori yang diinginkan
        move_uploaded_file($lokasi_temp, "direktori_upload/" . $lokasifile);

        // Perbarui data di database termasuk lokasi file baru
        $sql = "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', albumid='$albumid', lokasifile='$lokasifile' WHERE fotoid='$fotoid'";
    } else {
        // Jika file tidak diunggah, perbarui data tanpa mengubah lokasi file
        $sql = "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', albumid='$albumid' WHERE fotoid='$fotoid'";
    }

    // Jalankan query update
    if (mysqli_query($conn, $sql)) {
        // Redirect ke halaman foto setelah berhasil mengubah
        header("location: foto.php");
        exit();
    } else {
        // Jika terjadi kesalahan, tampilkan pesan kesalahan
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Jika halaman diakses tanpa melalui formulir, redirect ke halaman yang sesuai
    header("location: index.php");
    exit();
}
?>
