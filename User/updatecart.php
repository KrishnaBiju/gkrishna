<?php

include "../dbconnection.php";

$cartid = $_GET['cartid'];
$qty = $_GET['qty'];
$price = $_GET['price'];
$stock = $_GET['stock'];
$proid = $_GET['proid'];

$tprice = $price * $qty;
$newStock = $stock - $qty;

$qry = "UPDATE `cart` SET `qty`='$qty', `total`='$tprice' WHERE `cid`='$cartid'";
$qryStk = "UPDATE `product` SET `stock`='$newStock' WHERE `pid`='$proid'";
if (mysqli_query($conn, $qry) == TRUE && mysqli_query($conn, $qryStk) == TRUE) {
?>
    <script>
        alert("Quantity Updated..")
        window.location = 'ViewCart.php'
    </script>
<?php
}



?>