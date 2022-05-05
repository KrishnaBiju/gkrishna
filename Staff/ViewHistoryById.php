<?php
session_start();
if (!isset($_SESSION['USERID'])) {
    header('location:../index.php');
}
include '../Header.php';
?>

<?php
include '../dbconnection.php';
$id = $_GET['uid'];
$qry = mysqli_query($conn, "SELECT DISTINCT u.* FROM `cart` c,`product` p,`user` u WHERE c.`uid`=u.`uid` AND c.`pid`=p.`pid` AND c.`status`='Delivered' AND u.`uid`='$id'");
if (mysqli_fetch_array($qry) > 0) {
    $qry = mysqli_query($conn, "SELECT DISTINCT u.* FROM `cart` c,`product` p,`user` u WHERE c.`uid`=u.`uid` AND c.`pid`=p.`pid` AND c.`status`='Delivered' AND u.`uid`='$id'");

    while ($row = mysqli_fetch_array($qry)) {
        $_SESSION["UID"] = $row["uid"];

?>

        <section class="w3l-aboutblock1 pt-lg-5 pt-2 pb-5" id="about">
            <div class="container py-md-5 py-4">



                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <div class="position-relative">
                            <img src="../<?php echo $row['img'] ?>" alt="" class="radius-image img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-8 ps-lg-5 mt-lg-0 mt-5">
                        <h5 class="title-small mb-1">Customer Details</h5>
                        <h3 class="title-style"><?php echo $row['name'] ?></h3>
                        <div class="my-info mt-md-5 mt-4">
                            <ul class="single-info">
                                <li class="name-style">Contact</li>
                                <li>:</li>
                                <li>
                                    <p><?php echo $row['phone'] ?></p>
                                </li>
                            </ul>
                            <ul class="single-info">
                                <li class="name-style">From</li>
                                <li>:</li>
                                <li>
                                    <p><?php echo $row['address'] ?></p>
                                </li>
                            </ul>
                            <ul class="single-info">
                                <li class="name-style">Email</li>
                                <li>:</li>
                                <li>
                                    <p><a href="<?php echo $row['email'] ?>"><?php echo $row['email'] ?></a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <section class="w3l-testimonials py-5" id="testimonials">
            <div class="container py-md-5 py-4">
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <div class="title-heading-w3 text-center mb-sm-5 mb-4">
                            <h5 class="title-small mb-1">Purchase Details</h5>
                        </div>
                        <div class="owl-two owl-carousel owl-theme">

                            <?php
                            include '../dbconnection.php';
                            $qry = mysqli_query($conn, "SELECT DISTINCT p.*,c.* FROM `cart` c,`product` p,`user` u WHERE c.`uid`=u.`uid` AND c.`pid`=p.`pid` AND c.`status`='Delivered' AND u.`uid`='$id'");
                            if (mysqli_fetch_array($qry) > 0) {
                                $qry = mysqli_query($conn, "SELECT DISTINCT p.*,c.* FROM `cart` c,`product` p,`user` u WHERE c.`uid`=u.`uid` AND c.`pid`=p.`pid` AND c.`status`='Delivered' AND u.`uid`='$id'");

                                while ($row = mysqli_fetch_array($qry)) {
                            ?>



                                    <div class="item">
                                        <div class="slider-info mt-lg-6 mt-5">
                                            <div class="message">
                                                <div class="name mt-4 mb-4">
                                                    <h4>Product : <?php echo $row['pname'] ?></h4>
                                                    <p>Price : <?php echo $row['price'] ?></p>
                                                    <p>Quantity : <?php echo $row['qty'] ?></p>
                                                    <p>Total : <?php echo $row['total'] ?></p>
                                                </div>
                                                <img src="assets/images/quote.png" alt="" class="img-fluid mb-2" />
                                            </div>
                                            <div class="img-circle">
                                                <img src="../<?php echo $row['pimg'] ?>" class="img-fluid radius-image" alt="client">
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
            </div>
        </section>

        <section class="w3l-servicesblock1 py-1" id="services">
            <div class="container py-md-5 py-4">

                <?php
                $qry1 = mysqli_query($conn, "SELECT SUM(`total`) AS gtotal FROM `cart` WHERE `status`='Delivered' and uid='$id'");

                while ($row1 = mysqli_fetch_array($qry1)) {
                ?>


                    <div class="title-heading-w3 text-center mb-sm-5 mb-4">
                        <h5 class="title-small mb-1">Mark as Delivered If the customer has accepted the product</h5>
                        <!--                        <h3 class="title-style">Price to pay</h3>-->
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
    }
} else {
    ?>
    </div>
    </div>
    <img src="../nodata.png" height="20%" width="20%" style=" margin-left: 500px; margin-right: auto;" />

<?php
}
?>

<?php
include '../Footer.php';
?>