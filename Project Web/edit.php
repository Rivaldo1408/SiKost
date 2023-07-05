<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['username']) || $_SESSION['status'] !== "login") {
    // Redirect to the login page if not logged in
    header("Location: index.php");
    exit;
}
?>

<?php
include "koneksi.php";
$sql = mysqli_query($conn,  "SELECT * FROM customers where nohp = '$_GET[update]'");
$result = mysqli_fetch_array($sql);
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
</br><h1 >Edit Customers</h1></br>


<form method="POST" action="">

    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label ">Nama </label>
        <div class="col-sm-10">
      <input type="text" class="form-control" name="rivaldo" value="<?php echo $result['nama']; ?>">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="nohp" class="col-sm-2 col-form-label ">No HP</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="nohp" value="<?php echo $result['nohp']; ?>">
    </div>
  </div>


  <div class="mb-3 row">
    <label for="jk" class="col-sm-2 col-form-label ">Jenis Kelamin</label>
    <div class="col-sm-10">
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="jk">
  <option selected>Pilih Jenis Kelamin</option>
  <option value="laki-laki">Laki-Laki</option>
  <option value="perempuan">Perempuan</option>
    </select>
    </div>
  </div>
  


  <div class="mb-3 row">
    <label for="tipe" class="col-sm-2 col-form-label ">Tipe Penginapan</label>
    <div class="col-sm-10">
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="tipe">
  <option selected>Pilih Tipe Penginapan</option>
  <option value="Harian">Harian</option>
  <option value="Bulanan">Bulanan</option>
    </select>
    </div>
  </div>

  <div class="mb-3 row">
    <label for="harga" class="col-sm-2 col-form-label ">Harga</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="harga"value="<?php echo $result['harga']; ?>">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="statuskos" class="col-sm-2 col-form-label ">Status</label>
    <div class="col-sm-10">
    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="statuskos">
  <option selected>Status Pembayaran</option>
  <option value="Dibayar">Dibayar</option>
  <option value="Belum Dibayar">Belum DIbayar</option>
    </select>
    </div>
  </div>


  <div class="mb-3 row">
    <label for="alamat" class="col-sm-2 col-form-label ">Alamat Asal</label>
    <div class="col-sm-10">
      <textarea class="form-control" name="alamat" rows="3"><?php echo $result['alamat']; ?></textarea>
    </div>
  </div>

  <input type="submit" value="update" name="update" class="btn btn-primary">
  <a href="customers.php" class="btn btn-danger">Kembali</a>


  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>

<?php

if(isset($_POST['update'])){
    mysqli_query($conn, "UPDATE customers SET
    nama = '$_POST[rivaldo]',
    nohp = '$_POST[nohp]',
    jenis_kelamin = '$_POST[jk]',
    tipe = '$_POST[tipe]',
    harga = '$_POST[harga]',
    statuskos = '$_POST[statuskos]',
    alamat = '$_POST[alamat]' WHERE nohp=$_GET[update]") or die(mysqli_error($conn));

    echo "<script>alert('Data Tersimpan');
    document.location='customers.php'</script>";

}

?>