<?php
session_start();
include '../dbconnection.php';
$uid = $_SESSION['USERID'];
$qry = "UPDATE `cart` SET `status`='Paid', `date`=(SELECT SYSDATE()) WHERE `status`='Pending' AND `uid`='$uid'";
$exe = mysqli_query($conn, $qry);
if ($qry) {
    echo '<script>alert("Paid Successfully")</script>';
    echo '<script>location.href="../User/Purchased.php"</script>';
} else {
    echo '<script>alert("Failed to Pay")</script>';
    echo '<script>location.href="../User/ViewCart.php"</script>';
}
?><a href=""