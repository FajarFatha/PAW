<?php
$host = "127.0.0.1";
$username = "root";
$password = "";
$db = "db_047";

$koneksi = new mysqli($host, $username, $password, $db);

if(!$koneksi){
    echo "koneksi gagal!!!";
}
?>