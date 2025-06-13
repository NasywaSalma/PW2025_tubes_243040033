<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "pw2024_tubes_243040033";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>


