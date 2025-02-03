<?php 
session_start();

$dbHost = "localhost";
$dbUsername = "root";
$dbPass = "";
$dbName = "db_laundry";

$conn = mysqli_connect($dbHost, $dbUsername, $dbPass, $dbName);

if (isset($_POST['login'])) {
  $pesan_error = "";

  $username = htmlentities(strip_tags(trim($_POST["username"])));;
  $pass = htmlentities(strip_tags(trim($_POST["password"])));

  $login = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");
  $cekUser = mysqli_num_rows($login);
  if ($cekUser > 0) {
    $row = mysqli_fetch_assoc($login);
    if (password_verify($pass, $row['password'])) {
      $_SESSION['username'] = $username;
      $_SESSION['userid'] = $row['id'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['phone'] = $row['phone'];
      $_SESSION['created_at'] = $row['created_at'];
      $_SESSION['login'] = true;

      echo "
      <script>
        alert('Login berhasil');
        window.location.href = 'index.php';
      </script>
      ";
    }else{
      $pesan_error .= "Username / Password anda salah";
    }
  }else{
    $pesan_error .= "Username / Password anda salah";
  }
}else{
  $pesan_error = "";
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <link rel="shortcut icon" href="../gambar/logobpp.png" type="image/png"/>
        <title>Login Page</title>
        <link href="assets/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/assets/css/style.css" rel="stylesheet" type="text/css">
    </head>
    <style>
        .accountbg {
            background-image: black;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>

    <body class="fixed-left">
        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">
            <div class="card">
                <div class="card-body">
                    <h3 class="text-center mt-0 m-b-15">
                        <a href="login.php"><img src="../gambar/logo12.png" width="200px"></a>
                    </h3>

                    <div class="p-3">
                        <h4 class="text-center mt-0 m-b-15">Login Users</h4>

                        <?php if(!$pesan_error == "") : ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $pesan_error; ?>
                            </div>
                        <?php endif; ?>

                        <form class="form-horizontal m-t-20" action="" method="POST">

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="text" required placeholder="ID" name="username" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="password" required placeholder="Password" name="password">
                                </div>
                            </div>

                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-danger btn-block waves-effect waves-light" type="submit" name="login">Log In</button>
                                </div>
                            </div>
                            
                            <br>
                            <p>forgot password? <a href="forgot_password.php">click here</a></p>
                            <p>don't have a account? <a href="register.php">click here</a></p>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- jQuery  -->
        <script src="assets/assets/js/jquery.min.js"></script>
        <script src="assets/assets/js/popper.min.js"></script>
        <script src="assets/assets/js/bootstrap.min.js"></script>
        <script src="assets/assets/js/modernizr.min.js"></script>
        <script src="assets/assets/js/detect.js"></script>
        <script src="assets/assets/js/fastclick.js"></script>
        <script src="assets/assets/js/jquery.slimscroll.js"></script>
        <script src="assets/assets/js/jquery.blockUI.js"></script>
        <script src="assets/assets/js/waves.js"></script>
        <script src="assets/assets/js/jquery.nicescroll.js"></script>
        <script src="assets/assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="assets/assets/js/app.js"></script>

    </body>
</html>