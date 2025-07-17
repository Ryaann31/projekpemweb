<?php
include 'koneksi.php';
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');

// Ambil data JSON dari input
$data = json_decode(file_get_contents("php://input"));

// Cek jika data kosong
if (!$data || !isset($data->id)) {
    echo json_encode(["message" => "ID tidak boleh kosong"]);
    exit;
}

$id = $data->id;
$nama = $data->nama;
$harga = $data->harga;
$status = $data->status;

// Query update
$query = "UPDATE produk SET nama_produk='$nama', harga='$harga', status='$status' WHERE id='$id'";
$hasil = mysqli_query($koneksi, $query);

// Hasil respon
if ($hasil) {
    echo json_encode(["message" => "Data berhasil diubah"]);
} else {
    echo json_encode(["message" => "Gagal mengubah data"]);
}
?>
