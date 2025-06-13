<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "pw2024_tubes_243040033");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$message = $_POST['message'];

// Simpan ke database
$sql = "INSERT INTO contact (name, email, number, message) 
        VALUES ('$name', '$email', '$number', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Pesan berhasil dikirim!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>