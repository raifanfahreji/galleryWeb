<?php
include "koneksi.php";
session_start();

if(!isset($_SESSION['userid'])){
    // Untuk bisa like harus login dulu
    header("location:index.php");
} else {
    $fotoid = $_GET['fotoid'];
    $userid = $_SESSION['userid'];
    // Cek apakah user sudah pernah like foto ini atau belum

    $sql = mysqli_query($conn, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");

    if(mysqli_num_rows($sql) == 1){
        // User pernah like foto ini
        header("location:index.php");
    } else {
        $tanggallike = date("Y-m-d");
        $insertQuery = "INSERT INTO likefoto VALUES (NULL, '$fotoid', '$userid', '$tanggallike')";
        
        // Use prepared statement to prevent SQL injection
        $stmt = mysqli_prepare($conn, $insertQuery);
        if ($stmt) {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header("location:index.php");
        } else {
            // Handle the error if the prepared statement fails
            echo "Error in prepared statement: " . mysqli_error($conn);
        }
    }
}
?>
