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
include 'koneksi.php';

$query ="SELECT * FROM customers";
$sql =  mysqli_query($conn, $query) ;
$no = 1;
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
          <a class="nav-link  me-3" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-3" href="addcustomers.php">Add Customers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active me-3" href="customers.php">Customers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link me-3" href="logout.php" onclick="return confirm('Apakah Anda yakin Untuk Keluar ? ');">Log Out</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container">
</br><h1 >Customers</h1></br>
<div class="table-responsive">
            <table class="table table-striped-columns">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>NO HP</th>
                        <th>Jenis Kelamin</th>
                        <th>tipe</th>
                        <th>Harga</th>
                        <th>Status Pembayaran</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($result = mysqli_fetch_assoc($sql)) { ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?= $result['nama']; ?></td>
                        <td><?= $result['nohp']; ?></td>
                        <td><?= $result['jenis_kelamin']; ?></td>
                        <td><?= $result['tipe']; ?></td>
                        <td><?= $result['harga']; ?></td>
                        <td><?= $result['statuskos']; ?></td>
                        <td><?= $result['alamat']; ?></td>
                        <td>
                          
                        <a href="edit.php?update=<?php echo $result['nohp']; ?>">
                                <button type="button" class="btn btn-primary" value="Edit">Edit</button>
                            </a>
                        <a href="hapus.php?nohp=<?php echo $result['nohp']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                <button type="button" class="btn btn-danger">Delete</button>
                            </a>
                    </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>