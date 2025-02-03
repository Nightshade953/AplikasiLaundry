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
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Home - Laundry SMK BPP</title>
    <style>
        html, body {
            min-height: 100%;
            overflow-x: hidden; /* Mencegah horizontal scroll */
            margin: 0;
        }

        #layoutSidenav_content {
            min-height: 100%;
            max-height: 100%;
            
            overflow: auto; /* Memastikan halaman bisa di-scroll */
        }

        .hero-section {
            background: url('assets/assets/images/bglaundry.jpg') no-repeat center center/cover;
            color: white;
            margin-top: -40px;
            margin-bottom: 20px;
            padding: 30px 20px;
            text-align: center;
            background-size: cover;
        }

        .hero-section h1 {
            font-size: calc(1.5rem + 1.5vw);
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
            padding: 40px;
            border-radius: 10px;
            margin-top: -20px;
            margin-bottom: 40px;
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

        .popup {
            display: flex;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 10000;
        }

        .popup-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            animation: popUp 0.5s ease-in-out;
            max-width: 400px;
            width: 90%;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        @keyframes popUp {
            0% { transform: scale(0.8); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }

        .robot {
            width: 100px;
            height: auto;
            animation: floating 2s infinite alternate ease-in-out;
        }

        @keyframes floating {
            0% { transform: translateY(0); }
            100% { transform: translateY(-10px); }
        }

        #loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        #loading .spinner-border {
            width: 3rem;
            height: 3rem;
        }

        .blur {
            filter: blur(5px);
        }

        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 1.8rem;
            }

            .hero-section p {
                font-size: 1rem;
            }

            .card-body i {
                font-size: 2rem;
            }
        }

        @media (max-width: 576px) {
            .hero-section {
                padding: 30px 10px;
            }
            .card-body {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

<div id="loading" class="loading">
    <div class="spinner-border text-light" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<div id="popup" class="popup">
    <div class="popup-content">
        <img src="assets/assets/images/logo1.png" alt="Robot Animasi" class="robot">
        <p>Selamat datang di Laundry SMK BPP! 🧺</p>
        <p>Sedang mengunduh beberapa komponen, jika ingin cepat dapatkan <b>Premium access</b> <a href="../easterEgg.php" style="color:white"> disini</a></p>
        <button id="closePopup" class="btn btn-primary">Oke</button>
    </div>
</div>

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
                            <p>Kami selalu mengutamakan kebersihan demi kepuasan pelanggan.</p>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="text-center mb-4">Testimonial Pelanggan</h2>
            <div class="testimonial">
                <blockquote class="blockquote text-center">
                    <p>"Pelayanan laundry terbaik di SMK BPP! Hasil cucian selalu bersih dan rapi."</p>
                    <footer class="blockquote-footer">Bu kepsek</footer>
    </blockquote>
            </div>
        </div>
    </main>
    <footer class="footer">
        <p>&copy; 2025 Laundry SMK BPP. <a href="#">Hubungi Kami</a> | <a href="#">Kebijakan Privasi</a></p>
    </footer>
</div>

<script>
    $(document).ready(function() {
        $("#layoutSidenav_content").addClass("blur");
        $("#loading").fadeIn();

        setTimeout(function() {
            $("#loading").fadeOut();
            $("#layoutSidenav_content").removeClass("blur");
        }, 1000);

        $("#popup").fadeIn();
        $("#closePopup").click(function() {
            $("#popup").fadeOut();
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
