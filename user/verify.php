<?php
$dbHost = "localhost";
$dbUsername = "root";
$dbPass = "";
$dbName = "db_laundry";

$conn = mysqli_connect($dbHost, $dbUsername, $dbPass, $dbName);

if (isset($_GET['email'])) {
    $email = mysqli_real_escape_string($conn, $_GET['email']);
} else {
    die("Email parameter is missing!");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $verification_code = mysqli_real_escape_string($conn, $_POST['verification_code']);

    $query = "SELECT * FROM tb_user WHERE email='$email' AND verification_code='$verification_code'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $updateQuery = "UPDATE tb_user SET email_verified = 1, verification_code = NULL WHERE email = '$email'";
        if (mysqli_query($conn, $updateQuery)) {
            header("Location: login.php");
            exit;
        } else {
            $error = "Failed to verify account, please try again.";
        }
    } else {
        $error = "Invalid verification code!";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Verify Account</title>
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
                        <h4 class="text-center mb-4">Verify Your Account</h4>

                        <?php if (!empty($error)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>

                        <form action="" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter Verification Code" name="verification_code" required>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-block">Verify</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="assets/assets/js/jquery.min.js"></script>
        <script src="assets/assets/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
