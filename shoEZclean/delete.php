<?php
// include database connection file
include_once("config.php");

// Get id from URL to delete that user
$id = $_GET['id'];
$query=$_GET['query'];

// Delete user row from table based on given id
    if($query==='toko') $result = mysqli_query($mysqli, "DELETE FROM toko WHERE id_admin=$id");
    if($query==='pesanan') $result = mysqli_query($mysqli, "DELETE FROM pesanan WHERE id_pesanan=$id");
    if($query==='pelanggan') $result = mysqli_query($mysqli, "DELETE FROM pelanggan WHERE id_pelanggan=$id");
    if($query==='sepatu') $result = mysqli_query($mysqli, "DELETE FROM sepatu WHERE id_sepatu=$id");
    if($query==='transaksi') $result = mysqli_query($mysqli, "DELETE FROM transaksi WHERE id_transaksi=$id");
    if($query==='driver') $result = mysqli_query($mysqli, "DELETE FROM driver WHERE id_driver=$id");
// $result = mysqli_query($mysqli, "ALTER TABLE toko AUTO_INCREMENT=$id");
// After delete redirect to Home, so that latest user list will be displayed.
header("Location:Home.php");
?>
