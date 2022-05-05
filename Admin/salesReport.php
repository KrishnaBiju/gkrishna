<?php
session_start();
if (!isset($_SESSION['USERID'])) {
    header('location:../index.php');
}
include '../Header.php';
?>
<style>
    table,
    td,
    th {
        border: 1px solid brown;
        padding: 10px;
    }
</style>

<section class="w3l-servicesblock1 py-5" id="services">
    <div class="container py-md-5 py-4">
        <div class="title-heading-w3 text-center mb-sm-5 mb-4">
            <h5 class="title-small mb-1">View Sales Report</h5>
        </div>
        <?php

        include '../dbconnection.php';

        $qry = mysqli_query($conn, "SELECT * FROM  `cart` c, `user` u, `product` p WHERE c.`uid`=u.`uid` AND c.`pid`=p.`pid`");

        if (mysqli_fetch_array($qry) > 0) {
        ?>
            <table id="customers">
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Place</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Status</th>

                </tr>

                <?php

                $qry = mysqli_query($conn, "SELECT * FROM  `cart` c, `user` u, `product` p WHERE c.`uid`=u.`uid` AND c.`pid`=p.`pid`");

                while ($row = mysqli_fetch_array($qry)) {
                ?>

                    <tr>
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['phone'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['place'] ?></td>
                        <td><?php echo $row['pname'] ?></td>
                        <td><?php echo $row['cat'] ?></td>
                        <td><?php echo $row['qty'] ?></td>
                        <td><?php echo $row[5] ?></td>


                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td colspan="8" class="text-center"><input type="button" id="" value="Print" style="width: 100%;" onclick="window.print()"></td>
                </tr>
            </table>
        <?php
        } else {
        ?>

            <img src="../noData.png" width="30%" height="30%" style=" margin-left: auto; margin-right: auto;">

        <?php
        }
        ?>


    </div>
    </div>

    </div>
</section>


<?php
include '../Footer.php';
?>