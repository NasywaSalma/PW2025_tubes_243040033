<?php 
include '../../../public/php/function.php';

$id = (int)$_GET['id'];

if (hapus_orders($id) >0) {
    echo "<script>alert('Data menu berhasil dihapus.'); window.location.href='../contact.php';</script>";
} else {
    echo "<script>alert('Data menu gagal dihapus.');</script>";
}
?>