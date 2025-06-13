<?php


include_once '../function.php';
$conn = koneksi();
$country = query("SELECT * FROM checkoutcountry");

// Ambil id kendaraan dari GET
$vehicle_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
$car_data = query("SELECT * FROM cars WHERE id = $vehicle_id LIMIT 1");
$row = $car_data[0] ?? null; // Ambil baris pertama jika ada, atau null


//$result = mysqli_query($conn, $query);

// Ambil data gabungan orders + cars (kalau mau dipakai nanti)
$sql_view = "SELECT o.*, c.name AS car_name FROM orders o JOIN cars c ON o.vehicle_id = c.id";
$orders = query($sql_view);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitasi input
    $name1      = mysqli_real_escape_string($conn, $_POST['first_name']);
    $name2      = mysqli_real_escape_string($conn, $_POST['last_name']);
    $license    = mysqli_real_escape_string($conn, $_POST['draving_license'] ?? '');
    $address0   = mysqli_real_escape_string($conn, $_POST['address0']);
    $address1   = mysqli_real_escape_string($conn, $_POST['address1']);
    $city       = mysqli_real_escape_string($conn, $_POST['town_city']);
    $zip        = mysqli_real_escape_string($conn, $_POST['pastcode_zip']);
    $countryVal = mysqli_real_escape_string($conn, $_POST['country_state']);
    $email      = mysqli_real_escape_string($conn, $_POST['email']);
    $phone      = mysqli_real_escape_string($conn, $_POST['phone']);
    $note       = mysqli_real_escape_string($conn, $_POST['note']);
    $payment    = mysqli_real_escape_string($conn, $_POST['payment']);
    $date       = date('Y-m-d H:i:s'); 

    // Validasi jika vehicle_id tidak dipilih
    if ($vehicle_id == 0) {
        echo "<script>alert('Kendaraan belum dipilih!'); window.history.back();</script>";
        exit;
    }

    $sql_insert = "INSERT INTO orders 
    (vehicle_id, first_name, last_name, draving_license, address0, address1, `town/city`, `pastcode/zip`, `country/state`, email, phone, note, payment, order_date)
    VALUES 
    ('$vehicle_id', '$name1', '$name2', '$license', '$address0', '$address1', '$city', '$zip', '$countryVal', '$email', '$phone', '$note', '$payment', '$date')";

   if (mysqli_query($conn, $sql_insert)) {
    $order_id = mysqli_insert_id($conn);
    echo "<script>alert('Pesanan berhasil dikirim!'); window.location.href='../gallery.php?id=$order_id';</script>";
} else {
    echo "Error: " . mysqli_error($conn);
}


    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Checkout Only</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- style tetap sama -->
    <style>
    :root {
      --yellow: #f9d806;
      --light-yellow: #ffee80;
      --black: #130f40;
      --light-color: #666;
      --border: .1rem solid rgba(0,0,0,.1);
      --box-shadow: 0 .5rem 1rem rgba(0,0,0,.1);
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Arial, sans-serif;
      background: var(--light-yellow);
      color: var(--black);
      min-height: 100vh;
    }

    .checkout-container {
      background: #fff;
      box-shadow: var(--box-shadow);
      border-radius: 18px;
      padding: 2.5rem 2rem 2rem 2rem;
      max-width: 600px;
      margin: 3rem auto;
      transition: box-shadow 0.2s;
    }

    .checkout-container h2 {
      font-size: 2.2rem;
      font-weight: 700;
      color: var(--black);
      margin-bottom: 0.5rem;
      letter-spacing: 1px;
    }

    .login-note {
      color: var(--yellow);
      font-size: 1.1rem;
      margin-bottom: 2rem;
      font-weight: 500;
      letter-spacing: 0.5px;
    }

    .checkout-content {
      display: flex;
      flex-direction: column;
      gap: 2rem;
    }

    .billing-form {
      width: 100%;
    }

    .billing-form h3 {
      margin-bottom: 1.2rem;
      color: var(--black);
      font-size: 1.3rem;
      font-weight: 600;
      letter-spacing: 0.5px;
    }

    .billing-form label {
      display: block;
      margin: 1rem 0 0.4rem;
      font-weight: 500;
      color: var(--black);
      letter-spacing: 0.2px;
    }

    .billing-form input,
    .billing-form select,
    .billing-form textarea {
      width: 100%;
      padding: 0.7rem 1rem;
      border: var(--border);
      border-radius: 8px;
      background: #faf9f6;
      font-size: 1rem;
      margin-bottom: 0.2rem;
      transition: border 0.2s;
      color: var(--black);
    }

    .billing-form input:focus,
    .billing-form select:focus,
    .billing-form textarea:focus {
      border-color: var(--yellow);
      outline: none;
      background: #fff;
    }

    .billing-form .btn {
      width: 100%;
      padding: 1rem;
      background: linear-gradient(90deg, var(--yellow) 60%, var(--light-yellow) 100%);
      color: var(--black);
      border: none;
      margin-top: 1.5rem;
      cursor: pointer;
      font-weight: bold;
      border-radius: 8px;
      font-size: 1.1rem;
      letter-spacing: 1px;
      box-shadow: var(--box-shadow);
      transition: background 0.2s, box-shadow 0.2s;
    }

    .billing-form .btn:hover {
      background: linear-gradient(90deg, var(--light-yellow) 60%, var(--yellow) 100%);
      box-shadow: 0 4px 16px rgba(249,216,6,0.13);
    }

    .billing-form .row {
      display: flex;
      gap: 1rem;
    }

    .billing-form .row label {
      flex: 1;
      margin-bottom: 0;
    }

    .options {
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
      margin-top: 1rem;
    }

    .options label {
      font-size: 0.97rem;
      color: var(--light-color);
      font-weight: 400;
      letter-spacing: 0.1px;
    }

    .billing-form textarea {
      min-height: 70px;
      resize: vertical;
    }

    a {
      color: var(--yellow);
      text-decoration: none;
      transition: color 0.2s;
    }
    a:hover {
      color: var(--black);
    }

    @media (max-width: 700px) {
      .checkout-container {
        padding: 1.2rem 0.5rem;
        max-width: 98vw;
      }
      .billing-form .row {
        flex-direction: column;
        gap: 0.2rem;
      }
    }
  </style>
</head>
<body>

  <main class="checkout-container">
    
    <?php $car_data = [$row]; // bungkus satu baris jadi array
foreach ($car_data as $mhs):
?>
    <h2><?= htmlspecialchars($mhs['name']); ?> (ID: <?= $vehicle_id ?>)</h2>
    <p class="login-note">Customer</p>
    <?php endforeach; ?>
    
    <div class="checkout-content">
      
    <form class="billing-form" method="POST" action="">
    <h3>Billing Info</h3>

    <label>Country
        <select name="country_state" required>
            <?php foreach ($country as $mhs): ?>
                <option value="<?= htmlspecialchars($mhs['country']); ?>">
                    <?= htmlspecialchars($mhs['country']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>

    <div class="row">
        <label>First Name
            <input type="text" name="first_name" required>
        </label>
        <label>Last Name
            <input type="text" name="last_name" required>
        </label>
    </div>

    <label>Driving License
        <input type="text" name="draving_license" required>
    </label>

    <label>Payment
         <select name="payment" required>
                <option value="">Pilih Metode Pembayaran</option>
                <option value="Direct Bank Transfer">Direct Bank Transfer</option>
                <option value="Cheque Payment">Cheque Payment</option>
                <option value="Cash">Cash</option>
        </select>       
    </label>

    <label>Address
        <input type="text" name="address0" placeholder="Street address" required>
    </label>
    <label>
        <input type="text" name="address1" placeholder="Apartment, suite, etc. (optional)">
    </label>

    <div class="row">
        <label>Town / City
            <input type="text" name="town_city" required>
        </label>
        <label>Postcode / Zip
            <input type="text" name="pastcode_zip" required>
        </label>
    </div>

    <label>Email Address
        <input type="email" name="email" required>
    </label>

    <label>Phone
        <input type="text" name="phone" required>
    </label>

    <div class="options">
        <label><input type="checkbox"> Create an account?</label>
    </div>

    <label>Order Notes
        <textarea name="note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
    </label>

    <input type="hidden" name="order_date" value="<?= date('Y-m-d H:i:s'); ?>">

    <button type="submit" class="btn">Place Order</button>
    <a href="../gallery.php" class="btn" style="text-align: center; display: inline-block; text-decoration: none;">Cancel</a>

    </form>
    </div>
  </main>
</body>
</html>
