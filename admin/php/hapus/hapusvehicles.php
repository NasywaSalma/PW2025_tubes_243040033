<?php 
include '../../../public/php/function.php';

$id = (int)$_GET['id'];

if (hapus_vehicles($id) >0) {
    echo "<script>alert('Data menu berhasil dihapus.'); window.location.href='../vehicles.php';</script>";
} else {
    echo "<script>alert('Data menu gagal dihapus.');</script>";
}
?>