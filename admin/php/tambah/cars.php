<?php
include '../../../public/php/function.php';

$conn = koneksi();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $year = $_POST['year'];
    $price = $_POST['price'];
    $transmission = $_POST['transmission'];
    $fuel_type = $_POST['fuel_type'];
    $horsepower = $_POST['horsepower'];
    $rate = $_POST['rate'];
    $info = $_POST['info'];
    $sold = $_POST['sold'];
    $gambar_lama = $_POST['gambar_lama'];

    // Cek apakah ada file gambar baru diupload
    if ($_FILES['gambar']['error'] === 4) {
        $img = $gambar_lama;
    } else {
        $img = upload();
        if (!$img) {
            $img = $gambar_lama;
        }
    }

    $query = "INSERT INTO cars (
    name, year, price, transmission, fuel_type, rate, info, sold, img, horsepower
) VALUES (
    '$name', '$year', '$price', '$transmission', '$fuel_type', '$rate', '$info', '$sold', '$img', '$horsepower'
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

        <label for="year">Year:</label>
        <input type="number" id="year" name="year" required>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price"  required>

        <label for="transmission">Transmission:</label>
        <input type="text" id="transmission" name="transmission"  required>

        <label for="fuel_type">Fuel Type:</label>
        <input type="text" id="fuel_type" name="fuel_type"  required>

        <label for="horsepower">Horsepower:</label>
        <input type="number" id="horsepower" name="horsepower"  required>

        <label for="rate">Rate:</label>
        <input type="number" step="0.1" id="rate" name="rate"  required>

        <label for="info">Detail:</label>
        <input type="text" id="info" name="info"  required>

        <label for="sold">Sold Out:</label>
        <input type="number" id="sold" name="sold"  required>

        <label for="img">Img Right Now:</label><br>
        <?php if (!empty($cars['img'])): ?>
            <img src="../../../img/ alt="Mobil" width="120"><br><br>
        <?php else: ?>
            <span style="color:#888;">Img Empty</span><br><br>
        <?php endif; ?>

        <label for="gambar">Change Img:</label>
        <input type="file" id="gambar" name="gambar">
        <small>Skip if don't want to upload img.</small>
        <input type="hidden" name="gambar_lama" value="<?= htmlspecialchars($cars['img']) ?>">

        <button type="submit" name="submit">Change</button>
    </form>
</body>
</html>
