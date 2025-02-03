<?php
session_start();
include "include/conn.php";



?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Laundry SMK BPP</title>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">

    

    <!-- Bootstrap core CSS -->
<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="./assets/sidebars.css" rel="stylesheet">
  </head>
  <body>
<main>
  <h1 class="visually-hidden">Sidebars examples</h1>

  <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
    <a href="index.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <img src="../gambar/logobpp.png" alt="" class="logo">
      <span class="fs-4">Laundry SMK BPP</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">

        <a href="../user/index.php" class="nav-link text-white" aria-current="page">
        <i class="fa-solid fa-house"></i>
          Home
        </a>
      </li>
      <li>

        <a href="../user/about.php" class="nav-link text-white" aria-current="page">
        <i class="fa-solid fa-search"></i>
          About
        </a>
      </li>
      <li>

        <a href="../user/riwayat.php" class="nav-link text-white">
        <i class="fa-solid fa-clock-rotate-left"></i>
          Riwayat
        </a>
      </li>
      <li>

        <a href="../user/profile.php" class="nav-link text-white">
        <i class="fa-solid fa-user"></i>
          Profile
        </a>
      </li>
      <li>
        <a href="../user/ulasan.php" class="nav-link text-white">
        <i class="fa-solid fa-star"></i>
          Ulasan
        </a>
      </li>

      <li>
        <a href="../user/login.php" class="nav-link text-white">
        <i class="fa-solid fa-right-from-bracket"></i>
          Logout
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/user.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong><?= $_SESSION["username"]?></strong>
      </a>
    </div>
  </div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="../assets/sidebars.js"></script>
  </body>
</html>
