<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$dbHost = "localhost";
$dbUsername = "root";
$dbPass = "";
$dbName = "db_laundry";

$conn = mysqli_connect($dbHost, $dbUsername, $dbPass, $dbName);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $error = "";

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $checkQuery = "SELECT * FROM tb_user WHERE username = '$username' OR email='$email'";
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
                $mail->Password = 'yyjw owlu oiwl tvfa';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('sharpsensix.official@gmail.com', 'ADMIN LAUNDRY');
                $mail->addAddress($email, $username);

                $mail->isHTML(true);
                $mail->Subject = 'Your Verification Code';
                $mail->Body = "Hello $username,<br><br>Your verification code is: <strong>$verification_code</strong><br><br>Please enter this code to complete your registration.";

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
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="assets/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/assets/css/icons.css" rel="stylesheet">
    <link href="assets/assets/css/style.css" rel="stylesheet">
</head>
<body class="fixed-left">
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center mt-0 mb-3">
                    <a href="login.php"><img src="../gambar/logo12.png" width="200px"></a>
                </h3>
                <div class="p-3">
                    <h4 class="text-center mt-0 mb-4">Register Users</h4>
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
                    <form action="" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Username" name="username" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Phone" name="phone" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <p class="text-center">Already have an account? <a href="login.php">Login here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/assets/js/jquery.min.js"></script>
    <script src="assets/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
