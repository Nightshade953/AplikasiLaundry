<?php
include "include/conn.php";

if (isset($_GET['id_riwayat'])){
    $id = $_GET['id_riwayat'];


    $sql = "DELETE FROM tb_riwayat WHERE id_riwayat = $id";
    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Riwayat berhasil dihapus');
                window.location='riwayat.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus Riwayat.');
                window.location='riwayat.php';
              </script>";
    }
} else {
    header("Location: riwayat.php");
}
 



?>