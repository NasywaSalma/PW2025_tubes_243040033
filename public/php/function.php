<?php
function koneksi()
{
    $conn = mysqli_connect('localhost', 'root', '', 'pw2024_tubes_243040033'); //connect ke databse
    return $conn;
}

function query($query)
{
    $conn = koneksi();
    $result = mysqli_query($conn, $query); //query ke tabel mahasiswa

    //ubah datanya kedalam array
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
    }

    return $rows;
}



//tambah produk cars
function tambah_produk($data)
{
    $conn = koneksi();
    $id = $data['id'];
    $name = ($data['name']);
    $year = ($data['year']);
    $price = ($data['price']);
    $transmission = ($data['transmission']);
    $fuel_type = ($data['fuel_type']);
    $rate = ($data['rate']);
    $info = ($data['info']);
    $sold = ($data['sold']);
    $img = upload();

    if (!$img) {
        return false;
    }

    $query = "UPDATE cars 
                SET 
                    name = '$name',
                    year = '$year',
                    price = '$price',
                    transmission = '$transmission',
                    fuel_type = '$fuel_type',
                    info = '$info',
                    sold = '$sold',
                    rate = '$rate',
                    img = '$img'
                WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//function untuk menghapus cars

function hapus_menu($id) {
     $conn = koneksi();
    $query = "DELETE FROM cars WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//ubah produk vehicles
function tambah_vehicles($data)
{
    $conn = koneksi();
    $id = $data['id'];
    $name = ($data['name']);
    $price = ($data['price']);
    $year = ($data['year']);
    $transmission = ($data['transmission']);
    $fuel_type = ($data['fuel_type']);
    $horsepower = ($data['horsepower']);
    $info = ($data['info']);
    $sold = ($data['sold']);
    $img = upload();

    if (!$img) {
        return false;
    }

    $query = "UPDATE popularvehicles 
                SET 
                    name = '$name',
                    price = '$price',
                    year = '$year',
                    transmission = '$transmission',
                    fuel_type = '$fuel_type',
                    horsepower = '$horsepower',
                    info = '$info',
                    sold = '$sold',
                    img = '$img'
                WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//function untuk menghapus vehicles

function hapus_vehicles($id) {
     $conn = koneksi();
    $query = "DELETE FROM popularvehicles WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//function untuk mengupload gambar

function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
              </script>";
        return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
                alert('Yang anda upload bukan gambar!');
              </script>";
        return false;
    }

    //cek jika ukuran terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('Ukuran gambar terlalu besar!');
              </script>";
        return false;
    }

    //lolos pengecekan, gambar siap diupload
    //generate nama baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../../../img/' . $namaFileBaru);

    return $namaFileBaru;
}



//function untuk menghapus contact

function hapus_contact($id) {
     $conn = koneksi();
    $query = "DELETE FROM contact WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//function untuk menghapus subscribe

function hapus_subscribe($id) {
     $conn = koneksi();
    $query = "DELETE FROM subscribe WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//function untuk menghapus orders
function hapus_orders($id) {
     $conn = koneksi();
    $query = "DELETE FROM orders WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//ubah produk contact
function tambah_contact($data)
{
    $conn = koneksi();
    $id = $data['id'];
    $name = ($data['name']);
    $email = ($data['email']);
    $number = ($data['number']);
    $message = ($data['message']);
    
    $query = "UPDATE contact 
                SET 
                    name = '$name',
                    email = '$email',
                    number = '$number',
                    message = '$message'
                WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//ubah subscribe
function tambah_subscribe($data)
{
    $conn = koneksi();
    $id = $data['id'];
    $email = ($data['email']);
    
    $query = "UPDATE subscribe
                SET 
                    email = '$email'
                WHERE id = $id";               
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//tambah produk orders
function tambah_orders($data)
{
    $conn = koneksi();
    $id = $data['id'];
    $vehicle_id = ($data['vehicle_id']);
    $first_name = ($data['first_name']);
    $last_name = ($data['last_name']);
    $draving_license = ($data['draving_license']);
    $address0 = ($data['address0']);
    $address1 = ($data['address1']);
    $town_city = ($data['town_city']);
    $pastcode_zip = ($data['pastcode_zip']);
    $country_state = ($data['country_state']);
    $email = ($data['email']);
    $phone = ($data['phone']);
    $note = ($data['note']);
    $payment = ($data['payment']);

    
    $query = "UPDATE orders 
                SET 
                    vehicle_id = '$vehicle_id',
                    first_name = '$first_name',
                    last_name = '$last_name',
                    draving_license = '$draving_license',
                    address0 = '$address0',
                    address1 = '$address1',
                    town_city = '$town_city',
                    pastcode_zip = '$pastcode_zip',
                    country_state = '$country_state',
                    email = '$email',
                    phone = '$phone',
                    note = '$note',
                    payment = '$payment',
                WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//function untuk menghapus orders
function hapus_user($id) {
     $conn = koneksi();
    $query = "DELETE FROM login WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
//function untuk menghapus country
function hapus_country($id) {
     $conn = koneksi();
    $query = "DELETE FROM checkoutcountry WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


//ubah country
function tambah_country($data)
{
    $conn = koneksi();
    $id = $data['id'];
    $country = ($data['country']);

    $query = "UPDATE checkoutcountry
                SET 
                    country = '$country'
                WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}