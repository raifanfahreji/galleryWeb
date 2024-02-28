<?php
    session_start();
    if(!isset($_SESSION['userid'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Komentar</title>
    <style>
      /* Reset CSS */
body {
    margin: 0;
    padding: 0;
    font-family: 'Montserrat', sans-serif;
    background-color: #f9f9f9;
    color: #333;
}
h1 {
    text-align: center;
    margin-bottom: 10px;
}

/* Layout Container */
.container {
    margin: 20px;
}

/* Header */
.header {
    border-radius: 10px;
    color: #fff;
    background-color: #495057;
    padding: 20px;
    margin-bottom: 20px;
}

/* Navigation */
ul {
    list-style-type: none;
    padding: 0;
    margin: 20px 0;
    background-color: #3498db;
    overflow: hidden;
    border-radius: 10px;
    text-align: center; /* Menengahkan elemen di dalam container */
}

li {
    display: inline-block; /* Mengatur item navigasi agar sejajar */
    float: none; /* Membuat item navigasi tidak terapung */
}

li a {
    display: block;
    color: #fff;
    text-align: center;
    padding: 14px 20px;
    text-decoration: none;
    border-radius: 8px;
    transition: background-color 0.3s ease;
}

li a:hover {
    background: linear-gradient(to right, green, #3498db, red);
}

/* Main Content */
.content {
    border-radius: 10px;
    padding: 20px;
    background-color: #495057;
}

/* Form Styles */
form {
    margin: 20px;
}

input[type="text"], input[type="submit"] {
    padding: 12px;
    margin-bottom: 10px;
    border: 1px solid #495057;
    border-radius: 8px;
    background-color: #fff;
    color: #495057;
}

input[type="submit"] {
    background-color: green;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background: linear-gradient(to right, #2980b9, #3498db, red);
}

/* Table Styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #495057;
    color: white;
}

/* Hover Effect on Table Rows */
tr:hover {
    background-color: #f5f5f5;
}

/* Image Styles */
img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(52, 73, 94, 0.3);
}

    </style>
</head>
<body>
    <h1>Halaman Komentar</h1>
    
    
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a>Selamat datang <b><?=$_SESSION['namalengkap']?></b> 
        <li><a href="logout.php">Logout</a></li>
    </ul>

    <form action="tambah_komentar.php" method="post">
        <?php
            include "koneksi.php";
            $fotoid=$_GET['fotoid'];
            $sql=mysqli_query($conn,"select * from foto where fotoid='$fotoid'");
            while($data=mysqli_fetch_array($sql)){
        ?>
        <input type="text" name="fotoid" value="<?=$data['fotoid']?>" hidden>
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judulfoto" value="<?=$data['judulfoto']?>"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsifoto" value="<?=$data['deskripsifoto']?>"></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td><img src="gambar/<?=$data['lokasifile']?>" width="200px"></td>
            </tr>
            <tr>
                <td>Komentar</td>
                <td><input type="text" name="isikomentar"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
        <?php
            }
        ?>
    </form>
</body>
</html>