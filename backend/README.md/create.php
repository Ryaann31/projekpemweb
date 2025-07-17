<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

// Sambungkan ke database
include 'koneksi.php';

// Ambil input JSON dari Postman
$data = json_decode(file_get_contents("php://input"));

// Cek apakah data dikirim
if (!$data) {
    echo json_encode(["message" => "Tidak ada data yang dikirim."]);
    exit;
}

// Ambil data dari JSON
$nama  = $data->nama;
$harga = $data->harga;
$status = $data->status;

// Simpan ke database
$query = "INSERT INTO produk (nama_produk, harga, status) VALUES ('$nama', '$harga', '$status')";
$hasil = mysqli_query($koneksi, $query);

if ($hasil) {
    echo json_encode(["message" => "Data berhasil ditambahkan"]);
} else {
    echo json_encode(["message" => "Gagal menambahkan data"]);
}
?>
