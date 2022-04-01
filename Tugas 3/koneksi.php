<?php
$host = "127.0.0.1";
$username = "root";
$password = "";
$database = "fajar";

$koneksi=new mysqli($host, $username, $password, $database);

if (!$koneksi){
    die("error!!!!".mysqli_connect_error());
};

?>