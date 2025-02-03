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
    <title>About Application</title>
    <style>
        .profile {
            display: flex;
            align-items: center;
            margin-top: 2rem;
            gap: 1.5rem;
        }
        .profile img {
            width: 200px;
            height: 200px;
            border: 3px solid #007bff;
            border-radius: 8px;
            object-fit: cover;
        }
        .profile-info {
            flex: 1;
        }
        .profile-info h2 {
            font-size: 24px;
            color: #007bff;
            margin-bottom: 1rem;
        }
        .profile-info p {
            font-size: 16px;
            color: #6c757d;
            line-height: 1.6;
        }
    </style>
</head>
<body>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">About</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">About</li>
            </ol>
            <div class="profile">
                <!-- Gambar di sisi kiri -->
                <img src="../user/assets/assets/images/bglaundry.jpg" alt="Laundry SMK BPP">

                <!-- Teks di sisi kanan -->
                <div class="profile-info">
                    <h2>Selamat Datang di Aplikasi Laundry SMK BPP</h2>
                    <p><strong><?= $_SESSION["username"] ?></strong>, terima kasih telah menggunakan layanan kami. Aplikasi ini dirancang khusus untuk mempermudah proses laundry Anda dengan fitur-fitur yang praktis dan efisien.</p>
                    <p>Aplikasi Laundry SMK BPP merupakan solusi modern bagi kebutuhan kebersihan Anda. Kami menyediakan layanan antar-jemput, pencucian profesional, dan pelacakan status laundry secara real-time melalui aplikasi ini.</p>
                    <p>Harap gunakan aplikasi ini dengan bijak dan manfaatkan seluruh fitur untuk mendukung aktivitas harian Anda. Terima kasih telah mempercayai layanan kami!</p>
                </div>
            </div>
        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
