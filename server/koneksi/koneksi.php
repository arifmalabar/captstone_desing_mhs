<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "siakad";

//$pdo = null;
try {
    //buat variabel $pdo untuk menyimpan objek koneksi
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user,$pass);
} catch (\Throwable $th) {
    echo json_encode(["error" => true, "msg" => "Koneksi gagal ".$th->getMessage()." "]);
}