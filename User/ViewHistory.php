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
            <h3 class="title-style">History</h3>
        </div>
        <div class="row">


            <?php
            include '../dbconnection.php';
            $uid = $_SESSION['USERID'];
            $qry = mysqli_query($conn, "SELECT p.*,c.`qty`,c.`total` FROM `cart` c,`product` p,`login` l WHERE c.`pid`=p.`pid` AND c.`uid`=l.`uid` AND c.`status`='Delivered' AND l.`uid`='$uid'");
            if (mysqli_fetch_array($qry) > 0) {
                $qry = mysqli_query($conn, "SELECT p.*,c.`qty`,c.`total` FROM `cart` c,`product` p,`login` l WHERE c.`pid`=p.`pid` AND c.`uid`=l.`uid` AND c.`status`='Delivered' AND l.`uid`='$uid'");

                while ($row = mysqli_fetch_array($qry)) {
            ?>


                    <div class="col-lg-3 col-md-6 grids-feature" style="margin-bottom: 25px">
                        <div class="area-box">
                            <div class="icon-style">
                                <i><img src="../<?php echo $row['pimg'] ?>" style="height: 50px;width: 100px;padding-right: 26px;padding-bottom: 5px;border-radius: 100%"></i>
                            </div>
                            <h4><a href="" class="title-head"><?php echo $row['pname'] ?></a></h4>
                            <h6><a href="" class="title-head">Price &#8377; <?php echo $row['price'] ?></a></h6>
                            <h6><a href="" class="title-head">Quantity <?php echo $row['qty'] ?></a></h6>
                            <h6><a href="" class="title-head">Total &#8377; <?php echo $row['total'] ?></a></h6>
                            <a href="ViewProductsById.php?id=<?php echo $row['pid'] ?>" class="btn more p-0">Explore More<i class="fas fa-long-arrow-alt-right ms-1"></i></a>
                        </div>
                    </div>

                <?php
                }
            } else {
                ?>
                <img src="../history.png" style="width: 35%;height: 35%;margin-left: 400px; margin-right: auto;">

            <?php
            }
            ?>

        </div>
    </div>
</section>




<?php
include '../Footer.php';
?>