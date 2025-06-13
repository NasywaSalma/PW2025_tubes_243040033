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
             echo "<script>
                alert('Sucssesed to Register!');
                document.location.href = 'subscribe.php';
              </script>";
        } else {
            echo "<script>
                alert('Failed to Register or Your account already registered!');
                document.location.href = 'subscribe.php';
              </script>";
        }

    } 
} 

$conn->close();
?>
