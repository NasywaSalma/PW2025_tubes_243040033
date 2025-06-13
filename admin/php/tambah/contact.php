<?php
include '../../../public/php/function.php';

$conn = koneksi();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];
    

    $query = "INSERT INTO contact (
    name, email, number, message
) VALUES (
    '$name', '$email', '$number', '$message'
)";

    mysqli_query($conn, $query);

    
    header("Location: ../cars.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ubah Data Mobil</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', Arial, sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #e0e7ef 100%);
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #2d3a4b;
            margin-top: 40px;
            font-size: 2.2rem;
            letter-spacing: 1px;
        }

        form {
            background: #fff;
            max-width: 480px;
            margin: 40px auto 0 auto;
            padding: 32px 36px 28px 36px;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(44, 62, 80, 0.13);
            display: flex;
            flex-direction: column;
            gap: 18px;
        }

        label {
            font-weight: 600;
            color: #2d3a4b;
            margin-bottom: 6px;
            font-size: 1rem;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            padding: 10px 12px;
            border: 1.5px solid #cfd8dc;
            border-radius: 7px;
            font-size: 1rem;
            background: #f7fafc;
            transition: border 0.2s;
            margin-bottom: 4px;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #4f8cff;
            outline: none;
            background: #f0f7ff;
        }

        button[type="submit"] {
            background: linear-gradient(90deg, #4f8cff 0%, #1e3c72 100%);
            color: #fff;
            font-weight: 700;
            border: none;
            border-radius: 7px;
            padding: 12px 0;
            font-size: 1.08rem;
            cursor: pointer;
            margin-top: 10px;
            box-shadow: 0 2px 8px rgba(44, 62, 80, 0.08);
            transition: background 0.2s, transform 0.1s;
        }

        button[type="submit"]:hover {
            background: linear-gradient(90deg, #1e3c72 0%, #4f8cff 100%);
            transform: translateY(-2px) scale(1.03);
        }

        img {
            border-radius: 8px;
            border: 1.5px solid #e0e7ef;
            margin-bottom: 8px;
            box-shadow: 0 2px 8px rgba(44, 62, 80, 0.07);
        }

        small {
            color: #6c7a89;
            font-size: 0.93rem;
            margin-bottom: 8px;
            display: block;
        }

        @media (max-width: 600px) {
            form {
                padding: 18px 10px 16px 10px;
                max-width: 98vw;
            }
            h1 {
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>
    <h1>Add Data</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="name">Car Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>

        <label for="number">Number:</label>
        <input type="number" id="number" name="number"  required>

        <label for="message">Message:</label>
        <input type="text" id="message" name="message"  required>

        <button type="submit" name="submit">Ubah</button>
    </form>
</body>
</html>
