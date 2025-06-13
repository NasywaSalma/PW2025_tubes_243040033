<?php

$host = "localhost";
$user = "root";         
$password = "";          
$dbname = "pw2024_tubes_243040033"; 

$conn = new mysqli($host, $user, $password, $dbname);


if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars(trim($_POST["email"]));

    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Simpan ke database
        $stmt = $conn->prepare("INSERT INTO subscribe (email) VALUES (?)");
        $stmt->bind_param("s", $email);

        if ($stmt->execute()) {
            echo "Berhasil berlangganan.";
            
            $to = "admin@example.com";
            $subject = "Langganan Baru";
            $message = "Email baru berlangganan: $email";
            $headers = "From: no-reply@example.com";

            mail($to, $subject, $message, $headers);
        } else {
            echo "Email sudah terdaftar atau terjadi kesalahan.";
        }

        $stmt->close();
    } else {
        echo "Email tidak valid.";
    }
} else {
    echo "Metode tidak diizinkan.";
}

$conn->close();
?>
