<?php
require_once "include/sidebars.php";
include "include/conn.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$sql = "SELECT * FROM tb_riwayat";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
        crossorigin="anonymous">
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <title>Riwayat Laundry SMK BPP</title>
  <style>
    html, body {
        height: 100%;
        overflow-x: hidden; 
    }
    #layoutSidenav_content {
        min-height: 100vh; 
        overflow-y: auto; 
    }
    .card-body {
        overflow-x: auto; 
        width:1000px;
    }
  </style>
</head>
<body>
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <h1 class="mt-4">Riwayat</h1>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Riwayat</li>
      </ol>
      <div class="card">
        <div class="card-header">
          <i class="fa-solid fa-list"></i> Riwayat Pesanan
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover" id="datatablesSimple">
              <thead>
                <tr>
                  <th scope="col"><center>No</center></th>
                  <th scope="col"><center>Jenis</center></th>
                  <th scope="col"><center>Tanggal</center></th>
                  <th scope="col"><center>Status</center></th>
                  <th scope="col"><center>Total</center></th>
                  <th scope="col"><center>Aksi</center></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td align='center'>{$no}</td>
                                <td align='center'>{$row['jenis']}</td>
                                <td align='center'>{$row['tanggal']}</td>
                                <td align='center'>{$row['status']}</td>
                                <td align='center'>{$row['total']}</td>
                                <td align='center'>
                                  <a href='hapus.php?id_riwayat={$row['id_riwayat']}' class='btn btn-danger'>Hapus</a>
                                </td>
                              </tr>";
                        $no++; 
                    }
                } else {
                    echo "<tr><td colspan='6' align='center'>Tidak ada data riwayat</td></tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
          integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
          crossorigin="anonymous"></script>
</div>
</body>
</html>
