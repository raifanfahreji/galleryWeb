<?php
include "koneksi.php";

if (isset($_GET['search'])) {
    $searchTerm = mysqli_real_escape_string($conn, $_GET['search']);
    $sql = "SELECT * FROM foto, user WHERE foto.userid=user.userid AND (judulfoto LIKE '%$searchTerm%' OR deskripsifoto LIKE '%$searchTerm%' OR namalengkap LIKE '%$searchTerm%') ORDER BY foto.fotoid DESC";
} else {
    $sql = "SELECT * FROM foto, user WHERE foto.userid=user.userid ORDER BY foto.fotoid DESC";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Landing</title>
    <style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
    color: #333;
}

h1 {
    margin: 20px 0;
    padding: 20px;
    color: #fff;
    background-color: #3498db;
    text-align: center;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.7);
}

nav {
    background-color: #e74c3c;
    overflow: hidden;
    border-radius: 15px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
}

nav a {
    float: left;
    display: block;
    color: white;
    text-align: center;
    padding: 20px 20px;
    text-decoration: none;
    border-radius: 8px;
    transition: background-color 0.3s ease;
}

nav a:hover {
    background: linear-gradient(to right, green, #3498db, gray);
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

th, td {
    border: 1px solid #ddd;
    padding: 15px;
    text-align: left;
}

th {
    background-color: #3498db;
    color: white;
    border-radius: 8px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
}

img {
    max-width: 100%;
    height: auto;
    border-radius: 15px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.4);
}

td a {
    text-decoration: none;
    padding: 10px 20px;
    margin: 8px;
    display: inline-block;
    background-color: #2ecc71;
    color: white;
    border-radius: 8px;
    transition: background-color 0.3s ease;
}

td a:hover {
    background-color: #27ae60;
}


label {
    margin: 100px 10px;
    color: #333;
    text-align: center;
    font-size: 20px;
    border: 1px solid #ccc; 
    border-radius: 5px; 
    padding: 10px;
    background: linear-gradient(to right, green, #3498db, gray);
     
}

#search {
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

input[type="submit"] {
  padding: 10px 15px;
  font-size: 16px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: #45a049;
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.8);
}




    </style>
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION['userid'])){
    ?>
            <nav>
                <a href="register.php">Register</a>
                <a href="login.php">Login</a>
            </nav>
    <?php
        }else{
    ?>   
        <h1>Selamat datang <b><?=$_SESSION['namalengkap']?></b></h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="album.php">Album</a>
            <a href="foto.php">Foto</a>
            <a href="logout.php">Logout</a>
        </nav>
    <?php
        }
    ?>
    <table>
    <tr>
        <th>Judul</th>
        <th>Deskripsi</th>
        <th>Foto</th>
        <th>Uploader</th>
        <th>Jumlah Like</th>
        <th>Lihat Komentar</th>
        <th>Aksi</th>
    </tr>
    <?php
    while ($data = mysqli_fetch_array($result)) {
    ?>
        <tr>
            <td><?=$data['judulfoto']?></td>
            <td><?=$data['deskripsifoto']?></td>
            <td>
                <img src="gambar/<?=$data['lokasifile']?>" width="200px">
            </td>
            <td><?=$data['namalengkap']?></td>
            <td>
                <?php
                $fotoid = $data['fotoid'];
                $sql2 = mysqli_query($conn, "select * from likefoto where fotoid='$fotoid'");
                echo mysqli_num_rows($sql2);
                ?>
            </td>
            <td>
                <a href="lihatkomentar.php?fotoid=<?=$data['fotoid']?>">Lihat Komentar</a>
            </td>
            <td>
                <a href="like.php?fotoid=<?=$data['fotoid']?>">Suka</a>
                <a href="komentar.php?fotoid=<?=$data['fotoid']?>">Komentar</a>
            </td>
        </tr>
    <?php
    }
    ?>
    <br>
    <form action="index.php" method="GET">
    <label for="search">Cari:</label>
    <input type="text" id="search" name="search">
    <input type="submit" value="Cari">
</form>

</table>

    
</body>
</html>

