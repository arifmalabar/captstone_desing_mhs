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
    //membuat status kode response sukses
    http_response_code(201);
    //merubah data respons server kedalam bentuk json
    echo json_encode(["error" => false, "msg" => "berhasil menambah data"]);
} catch (\Throwable $th) {
    //membuat status kode respons gagal
    http_response_code(403);
    //merubah data response server ke json (pesan error)
    echo json_encode(["error" => true, "msg" => "gagal menambah data : ".$th." "]);
}