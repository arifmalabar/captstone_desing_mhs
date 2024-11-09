<?php
//panggil file koneksi untuk memanggil variabel $pdo
include_once "../koneksi/koneksi.php";
try {
    //perintah SQL dalam bentuk string
    $sql = "SELECT * FROM mahasiswa";
    //mempersiapkan perintah SQL untuk diproses 
    $stm = $pdo->prepare($sql); 
    //eksekusi perintah SQL
    $stm->execute();
    //ambil data dan simpan dalam bentuk objek
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    //mengubah dari array ke format json 
    echo json_encode($result);
} catch (\Throwable $th) {
    //jalankan jika query error, tampilkan pesan error dalam bentuk json 
    echo json_encode(["error" => true, "msg" => "Failed fetch data : ".$th->getMessage()." "]);
}