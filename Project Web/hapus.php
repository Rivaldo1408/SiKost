<?php
include"koneksi.php";

// "TRUNCATE TABLE customers" delete all

$nohp = $_GET['nohp'];
$sql = "DELETE FROM customers WHERE nohp ='$nohp'";

// DELETE FROM nama_tabel;

if (mysqli_query($conn, $sql)) {
    echo "Data berhasil DiHapus.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
header('Location: customers.php');
exit();
?>