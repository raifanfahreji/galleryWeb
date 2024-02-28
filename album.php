<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("location:login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Album</title>
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
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.5);
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
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
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
    border-radius: 12px;
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

li a:hover {
    background: linear-gradient(to right, green, #3498db, red);
}



    </style>
</head>

<body>
    <br>
    <h1>Halaman Album <b><?=$_SESSION['namalengkap']?></b></h1>

    <br>

    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <br>

    <form action="tambah_album.php" method="post">
        <table>
            <tr>
                <td>Nama Album</td>
                <td><input type="text" name="namaalbum" required></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td><input type="text" name="deskripsi" required></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>

    <table border="1" cellpadding=5 cellspacing=0>
        <tr>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Tanggal dibuat</th>
            <th>Aksi</th>
        </tr>
        <?php
        include "koneksi.php";
        $userid = $_SESSION['userid'];
        $sql = mysqli_query($conn, "select * from album where userid='$userid'");
        while ($data = mysqli_fetch_array($sql)) {
        ?>
            <tr>
                <td><?=$data['namaalbum']?></td>
                <td><?=$data['deskripsi']?></td>
                <td><?=$data['tanggaldibuat']?></td>
                <td>
                    <a href="hapus_album.php?albumid=<?=$data['albumid']?>" style="background-color: red; color: white;">Hapus</a>
                    <a href="edit_album.php?albumid=<?=$data['albumid']?>">Edit</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const form = document.querySelector('form');
                    form.addEventListener('submit', (e) => {
                        if (!confirm('Apakah anda ingin menambahkan data Album ?')) {
                            e.preventDefault();
                        }
                    });
                });
            </script>
</body>

</html>




