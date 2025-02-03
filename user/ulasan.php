<?php
require_once "include/sidebars.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namaPengguna = htmlspecialchars($_POST['namaPengguna']);
    $rating = htmlspecialchars($_POST['rating']);
    $ulasan = htmlspecialchars($_POST['ulasan']);
    $tanggal = htmlspecialchars($_POST['tanggal']);

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'sharpsensix.official@gmail.com';
        $mail->Password   = 'yyjw owlu oiwl tvfa';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('sharpsensix.official@gmail.com', 'Laundry SMK BPP');
        $mail->addAddress('sharpsensix.official@gmail.com', 'Laundry SMK BPP');

        $mail->isHTML(true);
        $mail->Subject = "Ulasan Baru dari $namaPengguna";
        $mail->Body    = "
        <html>
        <head><title>Ulasan Pengguna</title></head>
        <body>
            <h2>Ulasan Baru</h2>
            <p><strong>Nama:</strong> $namaPengguna</p>
            <p><strong>Rating:</strong> $rating Bintang</p>
            <p><strong>Ulasan:</strong><br>$ulasan</p>
            <p><strong>Tanggal:</strong> $tanggal</p>
        </body>
        </html>
        ";

        $mail->send();
        echo "<script>alert('Ulasan berhasil dikirim!'); window.location.href='hasilUlasan.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Gagal mengirim ulasan: {$mail->ErrorInfo}'); window.location.href='ulasan.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Beri Ulasan - Laundry SMK BPP</title>
    <style>
        html, body {
            width: 100%;
            height: 100%;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }
        #layoutSidenav_content {
            min-height: 100vh;
            padding-bottom: 50px;
            width: 100%;
            overflow-x: hidden;
        }
        .container-fluid {
            max-width: 100%;
            padding-right: 15px;
            padding-left: 15px;
        }
        form {
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
                <form method="POST">
                    <div class="mb-3">
                        <label for="namaPengguna" class="form-label">Nama Pengguna</label>
                        <input type="text" class="form-control" id="namaPengguna" name="namaPengguna" required value='<?=$_SESSION['username']?>'>
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
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>