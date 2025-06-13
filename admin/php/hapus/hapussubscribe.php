<?php 
include '../../../public/php/function.php';

$id = (int)$_GET['id'];

if (hapus_subscribe($id) >0) {
    echo "<script>alert('Data menu berhasil dihapus.'); window.location.href='../subscribe.php';</script>";
} else {
    echo "<script>alert('Data menu gagal dihapus.');</script>";
}
?>