<?php
include_once "../koneksi/koneksi.php";
try {
    $sql = "SELECT * FROM mahasiswa";
    $stm = $pdo->prepare($sql);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
} catch (\Throwable $th) {
    echo json_encode(["error" => true, "msg" => "Failed fetch data : ".$th->getMessage()." "]);
}