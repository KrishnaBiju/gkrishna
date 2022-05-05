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
            <h5 class="title-small mb-1">Sales</h5>
            <h3 class="title-style">History</h3>
        </div>
        <div class="row">

            <?php
            include '../dbconnection.php';
            $qry = mysqli_query($conn, "SELECT DISTINCT u.* FROM `cart` c,`product` p,`user` u WHERE c.`uid`=u.`uid` AND c.`pid`=p.`pid` AND c.`status`='Delivered'");
            if (mysqli_fetch_array($qry) > 0) {
                $qry = mysqli_query($conn, "SELECT DISTINCT u.* FROM `cart` c,`product` p,`user` u WHERE c.`uid`=u.`uid` AND c.`pid`=p.`pid` AND c.`status`='Delivered'");

                while ($row = mysqli_fetch_array($qry)) {
            ?>



                    <div class="col-lg-3 col-md-6 grids-feature mt-md-0 mt-4" style="margin-bottom: 25px">
                        <div class="area-box">
                            <div class="icon-style">
                                <img src="../<?php echo $row['img'] ?>" width="140px" height="140px" style="border-radius: 50%;" />
                            </div>







                            <h4><a href="#feature" class="title-head"><?php echo $row['name'] ?></a></h4>
                            <a href="ViewHistoryById.php?uid=<?php echo $row['uid'] ?>" class="btn more p-0">More Details<i class="fas fa-long-arrow-alt-right ms-1"></i></a>
                        </div>
                    </div>


                <?php
                }
            } else {
                ?>
        </div>
    </div>
    <img src="../nodata.png" height="20%" width="20%" style=" margin-left: 500px; margin-right: auto;" />

<?php
            }
?>



</section>



<?php

include '../Footer.php';
?>