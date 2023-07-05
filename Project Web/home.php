<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['username']) || $_SESSION['status'] !== "login") {
  // Clear all session data
  $_SESSION = array();
  // Invalidate the session cookie
  if (isset($_COOKIE[session_name()])) {
      setcookie(session_name(), '', time()-86400, '/');
  }
  // Destroy the session
  session_destroy();
  header("Location: index.php");
  exit;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary ">
  <div class="container-fluid ">
    <a class="navbar-brand" href="#">
    <img width="170" height="50" src="img/logo.png" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active me-3" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-3" href="addcustomers.php">Add Customers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-3" href="customers.php">Customers</a>
        </li>
        <li class="nav-item">
        <a class="nav-link me-3" href="logout.php" onclick="return confirm('Apakah Anda yakin Untuk Keluar ? ');">Log Out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
</br><h1 >Home</h1></br>
<div class="container-home">

<div class="left-section">
<iframe class="rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d672.4398359308866!2d105.24503828773284!3d-5.370100999893339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40db6d6e9b3a37%3A0xc82f87bcfb8d0352!2sGria%20Gedung%20Meneng%20Indah!5e0!3m2!1sid!2sid!4v1685459841408!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="right-section">
    
      <p><img width="170" height="50" src="img/logo.png"></br> 
        Si Kosan Berletak Di Gedong Meneng</br> manjadikan kost ini memiliki lokasi yang strategis untuk mahasiswa yang mana tempatnya</br>
        Berdekatan Dengan Universitas Lampung </p>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>