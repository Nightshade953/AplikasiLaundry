<?php
require_once "include/sidebars.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Riwayat Laundry SMK BPP</title>
</head>
<body>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4" >
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
                <table class="table table-hover" id="datatablesSimple">
  <thead>
    <tr>
      <th scope="col"><center>No</center></th>
      <th scope="col"><center>Jenis</center></th>
      <th scope="col"><center>Tanggal</center></th>    
      <th scope="col"><center>Status</center></th>
      <th scope="col"><center>Total</center></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td align="center">
                                    
                                        <button type="button" class="btn btn-sm btn-danger" id="btnHapus" 
                                            
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
    </tr>
    <?php  ?>
  </tbody>
</table>
                </div>
            </div>
        </div>
    </main>
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
<?php
require_once "footer.php";
?>