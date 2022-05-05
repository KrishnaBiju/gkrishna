<?php
session_start();
if (!isset($_SESSION['USERID'])) {
    header('location:index.php');
}
include '../dbconnection.php';
$cmid = $_GET['id'];
$qry = "SELECT * FROM `cart`c, `product`p WHERE c.`cid`='$cmid' AND c.`pid`=p.`pid`";
$res = mysqli_query($conn, $qry);
$cid = $_SESSION['USERID'];
$qryCust = "SELECT * FROM `user` WHERE `uid`='$cid'";
$resCust = mysqli_query($conn, $qryCust);
$rowCust = mysqli_fetch_array($resCust);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="BillCss.css">
</head>

<body>
    <table class="body-wrap">
        <tbody>
            <tr>
                <td></td>
                <td class="container" width="600">
                    <div class="content">
                        <table class="main" width="100%" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td class="content-wrap aligncenter">
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td class="content-block">
                                                        <h2 style="text-align:center">Invoice</h2>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="content-block">
                                                        <table class="invoice">
                                                            <tbody>
                                                                <tr>
                                                                    <td>To:<br><?php echo $rowCust['name'] ?><br><?php echo $rowCust['address'] ?><br><?php echo $rowCust['email'] ?></td>
                                                                    <td align="right">Date: <?php echo date('Y/m/d') ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">
                                                                        <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                                            <tbody>
                                                                                <?php
                                                                                $total = 0;
                                                                                while ($row = mysqli_fetch_array($res)) {
                                                                                ?>
                                                                                    <tr>
                                                                                        <td style="border-right: 1px dotted black; padding: 10px"><strong><?php echo $row['pname'] ?></strong><br><?php echo $row['desc'] ?></td>
                                                                                        <td class="alignright">₹ <?php echo $row['price'] * $row['qty'] ?></td>
                                                                                    </tr>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="content-block">
                                                        <input type="button" value="Print" onclick="myFun()" id="pt" style="padding:10px">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="content-block">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="footer">
                            <table width="100%">
                                <tbody>
                                    <tr>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <script>
        function myFun() {
            document.getElementById("pt").style.display = "none"
            window.print()
            window.location = "Purchased.php"
        }
    </script>
</body>

</html>