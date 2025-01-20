<?php
require_once "include/sidebars.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Beri Ulasan - Laundry SMK BPP</title>
    <style>
        html, body {
            width: 100%;
            height: 100%;
            overflow-x: hidden; /* Mencegah scroll horizontal */
            margin: 0;
            padding: 0;
        }

        #layoutSidenav_content {
            min-height: 100vh;
            padding-bottom: 50px; /* Memberikan ruang agar footer tidak terpotong */
            width: 100%;
            overflow-x: hidden; /* Pastikan tidak ada scroll horizontal */
        }

        .container-fluid {
            max-width: 100%; /* Menghindari lebar kontainer melebihi layar */
            padding-right: 15px;
            padding-left: 15px;
        }
        form{
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <h1 class="mt-4">Beri Ulasan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Beri Ulasan</li>
            </ol>
            <div class="card">
                <div class="card-header">
                   <i class="fa-solid fa-star"></i> Formulir Ulasan Pengguna
                </div>
                <div class="card-body">
                    <form action="submit_ulasan.php" method="POST">
                        <div class="mb-3">
                            <label for="namaPengguna" class="form-label">Nama Pengguna</label>
                            <input type="text" class="form-control" id="namaPengguna" name="namaPengguna" required>
                        </div>
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating</label>
                            <select class="form-select" id="rating" name="rating" required>
                                <option value="">Pilih Rating</option>
                                <option value="1">&#9733;</option>
                                <option value="2">&#9733;&#9733;</option>
                                <option value="3">&#9733;&#9733;&#9733;</option>
                                <option value="4">&#9733;&#9733;&#9733;&#9733;</option>
                                <option value="5">&#9733;&#9733;&#9733;&#9733;&#9733;</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="ulasan" class="form-label">Ulasan</label>
                            <textarea class="form-control" id="ulasan" name="ulasan" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

