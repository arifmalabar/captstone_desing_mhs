<?php
//panggil file koneksi untuk memanggil variabel $pdo
require_once "../koneksi/koneksi.php";

//tangkap nilai request dalam bentuk method POST
$nim = $_POST['nim'];
$nama = $_POST['nama'];

try {
    //perintah SQL dalam bentuk string
    $sql = "INSERT INTO `mahasiswa`(`NIM`, `nama`) VALUES (:nim,:nama)";
    //mempersiapkan perintah SQL untuk diproses 
    $stm = $pdo->prepare($sql);
    //nilai parameter yang diisi untuk :nim, :nama
    $stm->bindParam(":nim", $nim);
    $stm->bindParam(":nama", $nama);
    //eksekusi query
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