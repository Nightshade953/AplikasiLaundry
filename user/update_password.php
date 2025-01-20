<?php
session_start();

if (!isset($_SESSION['verified']) || $_SESSION['verified'] !== true) {
    header("Location: forgot_password.php");
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "db_ecomerce");

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Memeriksa kesesuaian password
    if ($new_password === $confirm_password) {
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
        $email = $_SESSION['email'];

        $sql = "UPDATE users SET password='$hashed_password' WHERE email='$email'";
        if (mysqli_query($conn, $sql)) {
            echo "<div class='alert alert-success text-center'>Password berhasil diubah. Silakan login kembali.</div>";
            session_destroy();
        } else {
            echo "<div class='alert alert-danger text-center'>Gagal mengubah password.</div>";
        }
    } else {
        echo "<div class='alert alert-danger text-center'>Password tidak cocok. Silakan coba lagi.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Update Password</title>
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
            background-color:
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
        <div class="checkout-title">UPDATE PASSWORD</div>
        <form action="" method="POST">
            <div class="form-group">
                <label for="new_password">New Password:</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" name="send" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>

</body>
</html>