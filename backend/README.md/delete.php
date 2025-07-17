<?php
include 'koneksi.php';
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');

$data = json_decode(file_get_contents("php://input"));

if (!$data || !isset($data->id)) {
    echo json_encode(["message" => "ID tidak boleh kosong"]);
    exit;
}

$id = $data->id;

$query = "DELETE FROM produk WHERE id='$id'";
$hasil = mysqli_query($koneksi, $query);

if ($hasil) {
    echo json_encode(["message" => "Data berhasil dihapus"]);
} else {
    echo json_encode(["message" => "Gagal menghapus data"]);
}
?>
