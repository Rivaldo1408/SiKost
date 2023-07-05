<?php
include "koneksi.php";
// mengambil data dari form
$nama = $_POST['nama'];
$nohp = $_POST['nohp'];
$jenis_kelamin = $_POST['jk'];
$tipe = $_POST["tipe"];
$harga = $_POST["harga"];
$statuskos = $_POST["statuskos"];
$alamat = $_POST["alamat"];
// menyimpan/menambah data ke database
$sql = "INSERT INTO customers (nama, nohp, jenis_kelamin, tipe, harga , statuskos, alamat) VALUES ('$nama', '$nohp', '$jenis_kelamin', '$tipe', '$harga', '$statuskos', '$alamat')";

if (mysqli_query($conn, $sql)) {
    echo "Data berhasil ditambahkan.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
header('Location: customers.php');
exit();
