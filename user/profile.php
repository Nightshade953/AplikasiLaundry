<?php
require_once "include/sidebars.php";

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Profil Pengguna</title>
    <style>
        .jumbotron {
            background: linear-gradient(135deg, #007bff, #00ff88);
            color: white;
            border-radius: 15px;
            padding: 3rem;
            margin-top: 2rem;
        }
        .jumbotron h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }
        .jumbotron p {
            font-size: 1.2rem;
        }
        .btn-edit {
            background-color: white;
            color: #007bff;
            border: none;
            font-weight: bold;
        }
        .btn-edit:hover {
            background-color: #f8f9fa;
        }
        .profile-header {
            text-align: center;
            margin-left: 400px;
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
                <img src="../user/assets/assets/images/person2.png" alt="Foto Profil">
                <h2><?= $_SESSION["username"]?></h2>
                <p>Selamat datang <?= $_SESSION["username"]?> di Aplikasi Laundry kami </p>
                 <p>harap gunakan dengan bijak..</p>        
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

