<?php
$server_name  = "localhost";
$username = "root";
$password = "";
$db = "aplikasi_laundry";

$conn = new mysqli($server_name, $username, $password, $db);

if ($conn->connect_error){
    die("Koneksi gagal: " . $conn->connect_error);
}

bijiKuad

?>
