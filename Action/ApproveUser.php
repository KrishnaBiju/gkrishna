<?php
session_start();
include '../dbconnection.php';
$id = $_GET['id'];
$qry = "UPDATE `login` SET `status`='Approved' WHERE `lid`='$id'";
$exe = mysqli_query($conn, $qry);
if ($qry) {
    echo '<script>alert("Approved User Successfully")</script>';

    echo '<script>location.href="../Admin/ViewUserReq.php"</script>';
} else {
    echo '<script>alert("Failed to Approve")</script>';
    echo '<script>location.href="../Admin/ViewUserReq.php"</script>';
}
?><a href=""