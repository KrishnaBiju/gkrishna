<?php
session_start();
include '../dbconnection.php';
$id = $_SESSION['UID'];
$qry = "UPDATE `cart` SET `status`='Delivered' WHERE `uid`='$id' AND `status`='Paid'";
$exe = mysqli_query($conn,$qry);
if ($qry) {
    echo '<script>alert("Marked as delivered")</script>';
    echo '<script>location.href="../Admin/ViewPurchaseReq.php"</script>';
} else {
    echo '<script>alert("Failed to Mark")</script>';
    echo '<script>location.href="../Admin/ViewPurchaseReq.php"</script>';
}
