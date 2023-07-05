<?php
include "koneksi.php";
 session_start();
 session_destroy();
 $_SESSION['status'] = "notlogin";
 header("Location: index.php");

 $_SESSION = array();
// Invalidate the session cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-86400, '/');
}
// Destroy the session
session_destroy();

 ?>