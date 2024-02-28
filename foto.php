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
    <title>Halaman Foto</title>
    <style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

h1 {
    margin: 0;
    padding: 20px;
    color: white;
    background-color: #3498db;
    text-align: center;
    border-radius: 12px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.7);
}

p {
    text-align: center;
    color: #555;
}

ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
    overflow: hidden;
    background-color: #34495e;
    border-radius: 12px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    border-radius: 8px;
    transition: background-color 0.3s ease;
}

li a:hover {
    background-color: #2c3e50;
}

form {
    margin: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    border-radius: 12px;
    overflow: hidden;
}

th, td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

td a {
    text-decoration: none;
    padding: 8px 14px;
    margin: 1px;
    display: inline-block;
    background-color: #2ecc71;
    color: white;
    border-radius: 8px;
    transition: background-color 0.3s ease;
}

td a:hover {
    background-color: #27ae60;
}

th {
    background-color: #34495e;
    color: white;
    border-radius: 10px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

tr:hover {
    background-color: #f5f5f5;
}

input[type="text"],
input[type="submit"] {
    padding: 10px;
    margin-bottom: 10px;
    width: calc(100% - 20px);
    box-sizing: border-box;
    border: 1px solid #ddd;
    border-radius: 8px;
}

input[type="submit"] {
    background-color: #3498db;
    color: white;
    cursor: pointer;
    border: none;
    border-radius: 8px;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #2980b9;
}

li a:hover{
    background: linear-gradient(to right, #2980b9, #3498db, red);
}
    </style>
</head>
<body>
    <br>
    <h1>Selamat datang <b><?=$_SESSION['namalengkap']?></b></h1>
    <br>
    
    
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <br>

    <form action="tambah_foto.php" method="post" enctype="multipart/form-data">
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judulfoto"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsifoto"></td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td><input type="file" name="lokasifile"></td>
            </tr>
            <tr>
                <td>Album</td>
                <td>
                    <select name="albumid">
                    <?php
                        include "koneksi.php";
                        $userid=$_SESSION['userid'];
                        $sql=mysqli_query($conn,"select * from album where userid='$userid'");
                        while($data=mysqli_fetch_array($sql)){
                    ?>
                            <option value="<?=$data['albumid']?>"><?=$data['namaalbum']?></option>
                    <?php
                        }
                    ?>
                    </select>
                    
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>

    <table border="1" cellpadding=5 cellspacing=0>
        <tr>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Tanggal Unggah</th>
            <th>Lokasi File</th>
            <th>Album</th>
            <th>Disukai</th>
            <th>Aksi</th>
        </tr>
        <?php
            include "koneksi.php";
            $userid=$_SESSION['userid'];
            $sql = mysqli_query($conn, "SELECT * FROM foto,album WHERE foto.userid='$userid' AND foto.albumid=album.albumid ORDER BY foto.fotoid DESC");
            while($data=mysqli_fetch_array($sql)){
        ?>
                <tr>
                    <td><?=$data['judulfoto']?></td>
                    <td><?=$data['deskripsifoto']?></td>
                    <td><?=$data['tanggalunggah']?></td>
                    <td>
                        <img src="gambar/<?=$data['lokasifile']?>" width="200px">
                    </td>
                    <td><?=$data['namaalbum']?></td>
                    <td>
                        <?php
                            $fotoid=$data['fotoid'];
                            $sql2=mysqli_query($conn,"select * from likefoto where fotoid='$fotoid'");
                            echo mysqli_num_rows($sql2);
                        ?>
                    </td>
                    <td>
                        <a href="hapus_foto.php?fotoid=<?=$data['fotoid']?>" style="background-color: red; color: white;">Hapus</a>
                        <a href="edit_foto.php?fotoid=<?=$data['fotoid']?>">Edit</a>
                    </td>
                </tr>
        <?php
            }
        ?>
    </table>
    <footer>Copyright © RAIFAN 2024 ©</footer>
</body>
<script>
                document.addEventListener('DOMContentLoaded', () => {
                    const form = document.querySelector('form');
                    form.addEventListener('submit', (e) => {
                        if (!confirm('Apakah anda ingin menambahkan Data?')) {
                            e.preventDefault();
                        }
                    });
                });
            </script>
</script>
</html>
