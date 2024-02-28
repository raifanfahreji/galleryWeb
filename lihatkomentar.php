<?php
  session_start();
    if (!isset($_SESSION['userid'])) {
        header("location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Komentar</title>
    <style>
body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    background: #f0f0f0;
    color: #333;
}

h1 {
    margin: 0;
    padding: 20px;
    color: #fff;
    background: linear-gradient(to right, #3498db, #6ab0f3);
    text-align: center;
    font-size: 2em;
    border-radius: 10px;
}

ul {
    list-style-type: none;
    padding: 0;
    margin: 20px 0;
    background: linear-gradient(to right, #3498db, #6ab0f3);
    overflow: hidden;
    text-align: center;
    border-radius: 10px;
}

li {
    display: inline-block;
    margin: 10px;
}

li a {
    display: block;
    color: #ecf0f1;
    text-align: center;
    padding: 14px 20px;
    text-decoration: none;
    border-radius: 8px;
    transition: background-color 0.3s ease;
}

li a:hover {
    background: linear-gradient(to right, #2980b9, #3498db, red);
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th,
td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background: linear-gradient(to right, #3498db, #6ab0f3);
    color: #fff;
}

tr:hover {
    background-color: #f5f5f5;
}

input[type="text"],
input[type="submit"] {
    padding: 15px;
    margin-bottom: 10px;
    width: calc(100% - 30px);
    box-sizing: border-box;
    border: 1px solid #3498db;
    border-radius: 8px;
    background: linear-gradient(to right, #ecf0f1, #3498db);
    color: #34495e;
}

input[type="submit"] {
    background: linear-gradient(to right, #3498db, #6ab0f3);
    color: #fff;
    cursor: pointer;
    border: none;
    border-radius: 8px;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background: linear-gradient(to right, #2980b9, #3498db);
}

img {
    max-width: 100%;
    height: auto;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(52, 73, 94, 0.3);
}

    </style>
</head>

<body>
    <h1>Selamat datang <b><?=$_SESSION['namalengkap']?></b></h1>

    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="album.php">Album</a></li>
        <li><a href="foto.php">Foto</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Komentar</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include "koneksi.php";
            $userid = $_SESSION['userid'];
            $fotoid = $_GET ['fotoid'];
            $sql = mysqli_query($conn, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.userid = user.userid WHERE komentarfoto.fotoid = $fotoid");
            while ($data = mysqli_fetch_array($sql)) {
                ?>
                <tr>
                    <td><?= $data['komentarid'] ?></td>
                    <td><?= $data['namalengkap'] ?></td>
                    <td><?= $data['isikomentar'] ?></td>
                    <td><?= $data['tanggalkomentar'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>

