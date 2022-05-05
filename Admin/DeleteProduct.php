<?php
session_start();
if (!isset($_SESSION['USERID'])) {
    header('location:../index.php');
}
include "../dbconnection.php";
$pid = $_GET['id'];
$qry = "UPDATE `product` SET `status`='-1' where `pid`='$pid'";
if (mysqli_query($conn, $qry) == TRUE) {
    echo "<script>alert('Product Deleted');window.location='ViewProduct.php'</script>";
}
