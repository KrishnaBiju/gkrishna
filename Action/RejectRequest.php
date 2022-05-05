<?php
session_start();
include '../dbconnection.php';
$id = $_GET['id'];
$qry = "DELETE FROM `login` WHERE `lid`='$id'";
$exe = mysql_query($qry);
if ($qry) {
    echo '<script>alert("Canceled Successfully")</script>';
   
    echo '<script>location.href="../Admin/ViewUserReq.php"</script>';
} else {
    echo '<script>alert("Failed to Cancel")</script>';
    echo '<script>location.href="../Admin/ViewUserReq.php"</script>';
}
?>