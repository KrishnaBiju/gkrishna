<?php
session_start();
if (!isset($_SESSION['USERID'])) {
    header('location:../index.php');
}
include '../Header.php';
?>

<section class="w3l-servicesblock1 py-5" id="services">
    <div class="container py-md-5 py-4">
        <div class="title-heading-w3 text-center mb-sm-5 mb-4">
            <h5 class="title-small mb-1"></h5>
            <h3 class="title-style">Products</h3>
        </div>
        <div class="search">
            <form action="" method="post">
                <input type="search" name="search">
                <input type="submit" name="ser" value="Search">
            </form>
        </div>
        <div class="w3-services-grids py-lg-4">
            <div class="fea-gd-vv row">

                <?php
                include '../dbconnection.php';
                $cou = 0;
                if (isset($_REQUEST['ser'])) {
                    $search = $_REQUEST['search'];
                    $qry = mysqli_query($conn, "SELECT * FROM `product` WHERE `status`='1' AND (`pname`LIKE'%$search%' OR `desc`LIKE'%$search%' OR `cat`LIKE'%$search%' OR `price`LIKE'%$search%')");
                    if (mysqli_fetch_array($qry) > 0) {
                        $qry = mysqli_query($conn, "SELECT * FROM `product` WHERE `status`='1' AND (`pname`LIKE'%$search%' OR `desc`LIKE'%$search%' OR `cat`LIKE'%$search%' OR `price`LIKE'%$search%')");
                        $cou = 1;
                    }
                } else {
                    $qry = mysqli_query($conn, "SELECT * FROM `product` WHERE `status`='1'");
                    if (mysqli_fetch_array($qry) > 0) {
                        $qry = mysqli_query($conn, "SELECT * FROM `product` WHERE `status`='1'");
                        $cou = 1;
                    }
                }
                if ($cou == 1) {
                    while ($row = mysqli_fetch_array($qry)) {
                ?>

                        <div class="col-lg-4 col-md-7" style="margin-bottom: 30px">
                            <div class="feature-gd icon-yellow">
                                <div class="icon">
                                    <i><img src="../<?php echo $row['pimg'] ?>" style="height: 50px;width: 100px;padding-right: 26px;padding-bottom: 5px;border-radius: 100%"></i>
                                </div>
                                <div class="icon-info">
                                    <a href="ViewProductsById.php?id=<?php echo $row['pid'] ?>"><?php echo $row['pname'] ?></a><br>
                                    <?php echo $row['cat'] ?>
                                </div>
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


    </div>
    </div>

    </div>
</section>


<?php
include '../Footer.php';
?>