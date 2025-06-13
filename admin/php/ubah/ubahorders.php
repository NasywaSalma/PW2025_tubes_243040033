<?php
include '../../../public/php/function.php';

// Ambil ID mobil dari parameter GET
$id = (int)$_GET['id'];
$cars = query("SELECT * FROM orders WHERE id = $id");
$cars = $cars[0];

if (isset($_POST['submit'])) {
    if (tambah_orders($_POST) > 0) {
        echo "<script>
                alert('Data mobil berhasil diubah!');
                document.location.href = '../cars.php';
              </script>";
    } else {
        echo "<script>
                alert('Data mobil gagal diubah!');
                document.location.href = '../cars.php';
              </script>";
    }
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
            background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }
        h1 {
            text-align: center;
            color: #2d3a4b;
            margin-top: 48px;
            letter-spacing: 1px;
            font-weight: 700;
        }
        form {
            background: #fff;
            max-width: 420px;
            margin: 48px auto 0 auto;
            padding: 36px 44px 28px 44px;
            border-radius: 18px;
            box-shadow: 0 8px 32px rgba(44, 62, 80, 0.13);
            border: 1.5px solid #e3eaf1;
            position: relative;
        }
        label {
            font-weight: 600;
            color: #2d3a4b;
            letter-spacing: 0.5px;
        }
        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 10px 12px;
            margin-top: 7px;
            margin-bottom: 22px;
            border: 1.5px solid #b6c6d6;
            border-radius: 7px;
            box-sizing: border-box;
            font-size: 15.5px;
            background: #f8fafc;
            transition: border 0.2s;
        }
        input[type="text"]:focus,
        input[type="number"]:focus {
            border: 1.5px solid #007bff;
            outline: none;
            background: #f0f7ff;
        }
        button[type="submit"] {
            background: linear-gradient(90deg, #007bff 60%, #00c6ff 100%);
            color: #fff;
            border: none;
            padding: 12px 0;
            width: 100%;
            border-radius: 7px;
            font-size: 17px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0,123,255,0.08);
            letter-spacing: 0.5px;
            transition: background 0.2s, box-shadow 0.2s;
        }
        button[type="submit"]:hover {
            background: linear-gradient(90deg, #0056b3 60%, #0096c7 100%);
            box-shadow: 0 4px 16px rgba(0,123,255,0.13);
        }
        small {
            color: #7b8ca5;
            font-size: 12.5px;
            display: block;
            margin-bottom: 18px;
        }
        @media (max-width: 500px) {
            form {
                padding: 22px 10px 18px 10px;
                max-width: 98vw;
            }
        }
    </style>
</head>
</head>
<body>
    <h1>Change Order</h1>
   
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= htmlspecialchars($cars['id']) ?>">

        <label for="vehicle_id">Name:</label>
        <input type="text" id="name" name="vehicle_id" value="<?= htmlspecialchars($cars['vehicle_id']) ?>" required>

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?= htmlspecialchars($cars['first_name']) ?>" required>

        <label for="last_name">Last name:</label>
        <input type="text" id="last_name" name="last_name" value="<?= htmlspecialchars($cars['last_name']) ?>" required>

        <label for="draving_license">Driving Car:</label>
        <input type="number" id="draving_license" name="draving_license" value="<?= htmlspecialchars($cars['draving_license']) ?>" required>

        <label for="address0">Address1:</label>
        <input type="text" id="address0" name="address0" value="<?= htmlspecialchars($cars['address0']) ?>" required>

        <label for="address1">Address2:</label>
        <input type="text" step="0.1" id="address1" name="address1" value="<?= htmlspecialchars($cars['address1']) ?>" required>

        <label for="town_city">Town/city:</label>
        <input type="text" id="town_city" name="town_city" value="<?= htmlspecialchars($cars['town/city']) ?>" required>

         <label for="pastcode_zip">PastCode/Zip:</label>
        <input type="number" id="pastcode_zip" name="pastcode_zip" value="<?= htmlspecialchars($cars['pastcode/zip']) ?>" required>

        <label for="country_state">Country State:</label>
        <input type="text" id="country_state" name="country_state" value="<?= htmlspecialchars($cars['country/state']) ?>" required>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?= htmlspecialchars($cars['email']) ?>" required>

        <label for="phone">Phone:</label>
        <input type="number" id="phone" name="phone" value="<?= htmlspecialchars($cars['phone']) ?>" required>

        <label for="login">Note:</label>:</label>
        <input type="text" id="note" name="note" value="<?= htmlspecialchars($cars['note']) ?>" required>

        <label for="payment">payment:</label>
        <input type="text" id="payment" name="payment" value="<?= htmlspecialchars($cars['payment']) ?>" required>


        <button type="submit" name="submit">Change Data</button>
    </form>
</body>
</html>
