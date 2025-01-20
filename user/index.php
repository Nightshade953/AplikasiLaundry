<?php
require_once "sidebars.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Home - Laundry SMK BPP</title>
    <style>
        html, body {
            height: 100%;
            overflow-x: hidden;
        }

        #layoutSidenav_content {
            min-height: 100vh;
        }

        .hero-section {
            background: url('laundry-banner.jpg') no-repeat center center/cover;
            color: black;
            padding: 40px 20px;
            text-align: center;
        }
        .hero-section h1 {
            font-size: calc(1.5rem + 1.5vw); /* Responsif berdasarkan ukuran layar */
            font-weight: bold;
            margin-bottom: 20px;
        }
        .hero-section p {
            font-size: 1.1rem;
            margin-top: 10px;
        }
        .card {
            transition: transform 0.3s ease-in-out;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card i {
            color: #007bff;
        }
        .testimonial {
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            margin-top: 40px;
        }
        .footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        .footer a {
            color: #d2f4ea;
            text-decoration: none;
        }
        .footer a:hover {
            color: #007bff;
        }

        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 1.8rem;
            }
            .hero-section p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
<div id="layoutSidenav_content">
    <main>
        <div class="container my-5">
            <div class="hero-section">
                <h1>Selamat Datang di Laundry SMK BPP</h1>
                <p>Layanan laundry cepat, bersih, dan terpercaya untuk siswa dan guru.</p>
            </div>
            <h2 class="text-center mb-4">Mengapa Memilih Kami?</h2>
            <div class="row g-4">
                <div class="col-md-4 col-sm-6">
                    <div class="card mb-4 text-center">
                        <div class="card-body">
                            <i class="fas fa-clock fa-3x mb-3"></i>
                            <h5>Proses Cepat</h5>
                            <p>Layanan laundry cepat dan efisien dengan hasil memuaskan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="card mb-4 text-center">
                        <div class="card-body">
                            <i class="fas fa-leaf fa-3x mb-3"></i>
                            <h5>Ramah Lingkungan</h5>
                            <p>Penggunaan bahan pencuci ramah lingkungan dan aman.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mx-auto">
                    <div class="card mb-4 text-center">
                        <div class="card-body">
                            <i class="fas fa-star fa-3x mb-3"></i>
                            <h5>Pelayanan Terbaik</h5>
                            <p>Kami selalu mengutamakan kepuasan pelanggan.</p>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="text-center mb-4">Testimonial Pelanggan</h2>
            <div class="testimonial">
                <blockquote class="blockquote text-center">
                    <p>"Pelayanan laundry terbaik di SMK BPP! Hasil cucian selalu bersih dan rapi."</p>
                    <footer class="blockquote-footer">Siswa SMK BPP</footer>
                </blockquote>
            </div>
        </div>
    </main>
    <footer class="footer">
        <p>&copy; 2025 Laundry SMK BPP. <a href="#">Hubungi Kami</a> | <a href="#">Kebijakan Privasi</a></p>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
