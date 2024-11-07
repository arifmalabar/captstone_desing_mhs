<?php
require_once "../koneksi/koneksi.php";
$last_nim = $_POST["last_nim"];
$old_nim = $_POST["old_nim"];
$nama = $_POST["nama"];

try {
    $sql = "UPDATE `mahasiswa` SET `NIM`=:last_nim,`nama`=:nama WHERE NIM = :old_nim";
    $stm = $pdo->prepare($sql);
    $stm->bindParam("last_nim",$last_nim);
    $stm->bindParam("nama", $nama);
    $stm->bindParam("old_nim", $old_nim);
    $stm->execute();
    echo json_encode(["error" => false, "msg" => "berhasil menambah data"]);
} catch (\Throwable $th) {
    http_response_code(401);
    echo json_encode(["error" => true, "msg" => "Gagal mengubah data ".$th->getMessage().""]);
}