<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

session_start();
$dbHost = "localhost";
$dbUsername = "root";
$dbPass = "";
$dbName = "db_laundry";

$conn = mysqli_connect($dbHost, $dbUsername, $dbPass, $dbName);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $query = "SELECT * FROM tb_user WHERE email = '$email'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $code = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
            $_SESSION['email'] = $email;
            $_SESSION['verification_code'] = $code;

            $sql = "UPDATE tb_user SET verification_code='$code' WHERE email='$email'";
            mysqli_query($conn, $sql);

            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'sharpsensix.official@gmail.com';
                $mail->Password = 'yyjw owlu oiwl tvfa';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('sharpsensix.official@gmail.com', 'ADMIN SHARP SENSIX');
                $mail->addAddress($email);

                $mail->isHTML(true);
                $mail->Subject = 'Kode Verifikasi Update Password';
                $mail->Body = "Kode verifikasi Anda adalah: <b>$code</b>";

                $mail->send();
                echo "<div class='alert alert-success text-center'>Kode verifikasi telah dikirim ke email Anda.</div>";
            } catch (Exception $e) {
                echo "<div class='alert alert-danger text-center'>Gagal mengirim email. Error: {$mail->ErrorInfo}</div>";
            }
        } else {
            echo "<div class='alert alert-danger text-center'>Email tidak ditemukan.</div>";
        }
    }

    if (isset($_POST['verification_code'])) {
        $input_code = $_POST['verification_code'];

        if ($input_code == $_SESSION['verification_code']) {
            $_SESSION['verified'] = true;
            header("Location: update_password.php");
            exit;
        } else {
            echo "<div class='alert alert-danger text-center'>Kode verifikasi salah.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Lupa Password</title>
    <style>
        body {
            background-color: #1f2937;
            color: #fff;
        }
        .checkout-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #374151;
            border-radius: 10px;
            border: 1px solid #ddd;
        }
        .checkout-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
        .btn-primary {
            animation: pulse 1s infinite;
            width: 100%;
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="checkout-container">
        <div class="checkout-title">FORGOT PASSWORD</div>
        
        <form action="" method="POST">
            <div class="form-group">
                <label for="email">Your E-Mail:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Your E-Mail ( use '@' )" required>
            </div>
            <button type="submit" name="send" class="btn btn-primary">Send Code</button>
        </form>
        
        <br>

        <form action="" method="POST">
            <div class="form-group">
                <label for="verification_code">Verification Code:</label>
                <input type="text" class="form-control" id="verification_code" name="verification_code" required>
            </div>
            <button type="submit" name="send_code" class="btn btn-primary">Verify Code</button>
        </form>
    </div>
</div>

</body>
</html>