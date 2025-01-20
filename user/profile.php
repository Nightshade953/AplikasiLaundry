<?php
require_once "include/sidebars.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Profil Pengguna</title>
    <style>
        .profile-header {
            text-align: center;
            margin-left: 500px;
        }
        .profile-header img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #007bff;
        }
        .profile-header h2 {
            margin-top: 15px;
            font-size: 24px;
        }
        .profile-header p {
            font-size: 16px;
            color: #6c757d;
        }
    </style>
</head>
<body>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
        <h1 class="mt-4">Profile</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Profile</li>
            </ol>
            <div class="profile-header">
                <img src="../gambar/logo12.png" alt="Foto Profil">
                <h2>Nama Pengguna</h2>
                <p>Deskripsi singkat tentang pengguna.</p>
            </div>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

