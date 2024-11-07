<?php
require_once "../koneksi/koneksi.php";
$nim = $_GET['nim'];
try {
    $sql_search = "SELECT * FROM `mahasiswa` WHERE NIM = :nim";
    $eff_row = $pdo->prepare($sql_search);
    if($eff_row->rowCount() != 0){
        $sql = "DELETE FROM `mahasiswa` WHERE NIM = :nim ";
        $stm = $pdo->prepare($sql);
        $stm->bindParam("nim", $nim);
        $stm->execute();
        echo json_encode(["error" => false, "msg" => "Berhasil menghapus data"]);
    } else {
        throw new Exception("Data nim tidak ditemukan", 404);
    }
} catch (\Throwable $th) {
    if($th->getCode() == 404)
    {
        http_response_code($th->getCode());
    }
    echo json_encode(["error" => true, "msg" => "Error : ".$th->getMessage()." "]);
}