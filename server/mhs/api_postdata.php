<?php
require_once "../koneksi/koneksi.php";
$nim = $_POST['nim'];
$nama = $_POST['nama'];
try {
    $sql = "INSERT INTO `mahasiswa`(`NIM`, `nama`) VALUES (:nim,:nama)";
    $stm = $pdo->prepare($sql);
    $stm->bindParam(":nim", $nim);
    $stm->bindParam(":nama", $nama);
    $stm->execute();
    echo json_encode(["error" => false, "msg" => "berhasil menambah data"]);
} catch (\Throwable $th) {
    http_response_code(403);
    echo json_encode(["error" => true, "msg" => "gagal menambah data : ".$th." "]);
}