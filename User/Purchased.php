<?php
session_start();
if (!isset($_SESSION['USERID'])) {
    header('location:../index.php');
}
include '../Header.php';
?>



<section class="w3l-bottom-grids-6 py-5" id="features">
    <div class="container py-md-5 py-4">
        <div class="title-heading-w3 text-center mb-sm-5 mb-4">
            <h5 class="title-small mb-1">My</h5>
            <h3 class="title-style">Orders</h3>
        </div>
        <div class="row">


            <?php
            include '../dbconnection.php';
            $uid = $_SESSION['USERID'];
            $qry = mysqli_query($conn, "SELECT p.*,c.`qty`,c.`total` FROM `cart` c,`product` p,`login` l WHERE c.`pid`=p.`pid` AND c.`uid`=l.`uid` AND c.`status`='Paid' AND l.`uid`='$uid'");
            if (mysqli_fetch_array($qry) > 0) {
                $qry = mysqli_query($conn, "SELECT p.*,c.`qty`,c.`total`,c.`cid` FROM `cart` c,`product` p,`login` l WHERE c.`pid`=p.`pid` AND c.`uid`=l.`uid` AND c.`status`='Paid' AND l.`uid`='$uid'");

                while ($row = mysqli_fetch_array($qry)) {
            ?>


                    <div class="col-lg-3 col-md-6 grids-feature" style="margin-bottom: 25px">
                        <div class="area-box bg-light">
                            <div class="icon-style">
                                <i><img src="../<?php echo $row['pimg'] ?>" style="height: 50px;width: 100px;padding-right: 26px;padding-bottom: 5px;border-radius: 100%"></i>
                            </div>
                            <h4><a href="" class="title-head text-dark"><?php echo $row['pname'] ?></a></h4>
                            <h6><a href="" class="title-head">Price &#8377; <?php echo $row['price'] ?></a></h6>
                            <h6><a href="" class="title-head">Quantity <?php echo $row['qty'] ?></a></h6>
                            <h6><a href="" class="title-head">Total &#8377; <?php echo $row['total'] ?></a></h6>
                            <a href="ViewProductsById.php?id=<?php echo $row['pid'] ?>" class="btn more p-0 text-dark">Explore More<i class="fas fa-long-arrow-alt-right ms-1"></i></a><br>
                            <a href="bill.php?id=<?php echo $row['cid'] ?>" class="btn more p-0 text-dark">Generate Bill</a>
                        </div>
                    </div>

                <?php
                }
            } else {
                ?>
                <img src="../order.png" style="width: 35%;height: 35%;margin-left: 400px; margin-right: auto;">

            <?php
            }
            ?>

        </div>
    </div>
</section>
<!-- //grids section -->

<!-- service section -->
<?php
$qry1 = mysqli_query($conn, "SELECT SUM(`total`) AS gtotal FROM `cart` WHERE `status`='Paid' and uid='$uid'");
if (mysqli_fetch_array($qry1) > 0) {
?>
    <section class="w3l-servicesblock1 py-1" id="services">
        <div class="container py-md-5 py-4">

            <?php
            $qry1 = mysqli_query($conn, "SELECT SUM(`total`) AS gtotal FROM `cart` WHERE `status`='Paid' and uid='$uid'");

            while ($row1 = mysqli_fetch_array($qry1)) {
            ?>


                <div class="title-heading-w3 text-center mb-sm-5 mb-4">
                    <h5 class="title-small mb-1">Your Bill Of Current Purchase</h5>

                </div>
                <div class="w3-services-grids py-lg-4">
                    <div class="fea-gd-vv row">
                        <div class="col-lg-6 col-md-12 mt-md-10 mt-8">
                            <div class="feature-gd icon-blue">
                                <div class="icon">
                                    <i><img src="../curr.png" style="width: 75px;padding-right: 11px;padding-bottom: 5px"></i>
                                </div>
                                <div class="icon-info">
                                    <h5 class="title-style">Total Amount Paid : &#8377; <?php echo $row1['gtotal'] ?></h5>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            <?php
            }
            ?>

        </div>
    </section>
<?php
} else {
}
?>

<?php
include '../Footer.php';
?>