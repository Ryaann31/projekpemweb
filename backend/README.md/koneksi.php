<?php
$koneksi = mysqli_connect("localhost", "root", "", "uas_db");

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
