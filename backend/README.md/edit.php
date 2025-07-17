<?php
include 'koneksi.php';

$data = json_decode(file_get_contents("php://input"));

if (isset($data->id) && isset($data->nama) && isset($data->harga)) {
    $id = $data->id;
    $nama = $data->nama;
    $harga = $data->harga;

    $query = "UPDATE produk SET nama='$nama', harga='$harga' WHERE id=$id";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo json_encode(["message" => "Produk berhasil diperbarui"]);
    } else {
        echo json_encode(["message" => "Gagal memperbarui produk"]);
    }
} else {
    echo json_encode(["message" => "Data tidak lengkap"]);
}
?>
