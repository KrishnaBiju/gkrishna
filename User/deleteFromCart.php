<?php

include "../dbconnection.php";

$cid = $_GET['id'];

$qry = "DELETE FROM `cart` WHERE `cid`='$cid'";

if (mysqli_query($conn, $qry) == TRUE) {
?>
    <script>
        alert("Item Removed From Cart...")
        window.location = 'ViewCart.php'
    </script>
<?php
}
