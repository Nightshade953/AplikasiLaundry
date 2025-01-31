<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$conn = mysqli_connect("localhost", "root", "", "db_laundry");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $checkQuery = "SELECT * FROM tb_user WHERE username='$username' OR email='$email'";
    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        $error = "Username or Email already used!";
    } else {
        $verification_code = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $query = "INSERT INTO tb_user (username, email, password, phone, verification_code) VALUES ('$username', '$email', '$password', '$phone', '$verification_code')";
        
        if (mysqli_query($conn, $query)) {
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'sharpsensix.official@gmail.com';
                $mail->Password = 'yyjw owlu oiwl tvfa'; // Pastikan untuk mengganti dengan password yang benar dan aman
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('sharpsensix.official@gmail.com', 'ADMIN SHARP SENSIX');
                $mail->addAddress($email, $username);

                $mail->isHTML(true);
                $mail->Subject = 'Your Verification Code';
                $mail->Body = "
<html lang='en'>
<head>
    <meta charset='utf-8'/>
    <meta content='width=device-width, initial-scale=1.0' name='viewport'/>
    <title>Verification Code</title>
    <style>
        body { background-color: #1a202c; color: #ffffff; font-family: Arial, sans-serif; text-align: center; padding: 20px; }
        .container { background-color: #2d3748; padding: 20px; border-radius: 8px; max-width: 400px; margin: auto; box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); }
        .button { background-color: #3182ce; color: #ffffff; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block; margin-top: 20px; }
        .footer { font-size: 12px; color: #a0aec0; margin-top: 20px; }
    </style>
</head>
<body>
    <div class='container'>
        <img alt='Google logo' src='https://placehold.co/100x40?text=Google&bg=4285F4&text_color=FFFFFF'/>
        <h1>Verification Code</h1>
        <p>Hello, <strong>$username</strong></p>
        <p>Your verification code is:</p>
        <a class='button'>$verification_code</a>
        <p class='footer'>
            You received this email to let you know about important changes to your account.<br/>
            © 2025 Laundry Barudak Pemuda Pancasila (BPP) LLC, 1600 Amphitheatre Parkway, Mountain View, CA 94043, USA
        </p>
    </div>
</body>
</html>";

                $mail->send();
                header("Location: verify.php?email=" . urlencode($email));
                exit;
            } catch (Exception $e) {
                $error = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            $error = "Failed to register, please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #1f2937; /* Warna latar belakang yang sama dengan index.php */
            color: #fff; /* Warna teks putih */
        }
        .register-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: #374151; /* Warna latar belakang kontainer */
            border-radius: 10px;
            border: 1px solid #ddd;
        }
        .register-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
        .btn-primary {
            animation: pulse 1s infinite;
            width: 100%; /* Membuat tombol lebar penuh */
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Warna hover tombol */
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
    <div class="register-container">
        <div class="register-title">REGISTER PAGE</div>
         <?php if (isset($error)): ?>
            <div class="alert alert-danger">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Your Username: </label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            </div>
            <br>
            <div class="form-group">
                <label for="email">Your Email: </label>
                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
            </div>
            <br>
            <div class="form-group">
                <label for="phone">Your Phone Number: </label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone Number" required>
            </div>
            <br>
            <div class="form-group">
                <label for="password">Your Password: </label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <br>
            <button type="submit" name="send" class="btn btn-primary">Daftar</button>
            <div class="text-center mt-3">
                <p>Already have an Account? <a href="login.php" style="color: #fbbf24;">Login here</a></p>
            </div>
        </form>
    </div>
</div>

</body>
</html>