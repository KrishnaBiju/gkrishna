<?php
session_start();
if (!isset($_SESSION['USERID'])) {
    header('location:../index.php');
}
include '../Header.php';
?>
<style>
    .number {
        background: transparent;
        border: none;
        width: 50px;
    }
</style>


<section class="w3l-bottom-grids-6 py-5" id="features">
    <div class="container py-md-5 py-4">
        <div class="title-heading-w3 text-center mb-sm-5 mb-4">
            <h5 class="title-small mb-1">My</h5>
            <h3 class="title-style">Cart</h3>
        </div>
        <div class="row">


            <?php
            include '../dbconnection.php';
            $uid = $_SESSION['USERID'];
            $qry = mysqli_query($conn, "SELECT p.*,c.`qty`,c.`total` FROM `cart` c,`product` p,`login` l WHERE c.`pid`=p.`pid` AND c.`uid`=l.`uid` AND c.`status`='Pending' AND l.`uid`='$uid'");
            if (mysqli_fetch_array($qry) > 0) {
                $qry = mysqli_query($conn, "SELECT p.*,c.`qty`,c.`total`,c.`cid` FROM `cart` c,`product` p,`login` l WHERE c.`pid`=p.`pid` AND c.`uid`=l.`uid` AND c.`status`='Pending' AND l.`uid`='$uid'");
                $i = 0;
                while ($row = mysqli_fetch_array($qry)) {
                    ++$i;
            ?>

                    <input type="hidden" id="proid<?php echo $i ?>" value="<?php echo $row['pid'] ?>">
                    <input type="hidden" id="cartid<?php echo $i ?>" value="<?php echo $row['cid'] ?>">
                    <input type="hidden" id="price<?php echo $i ?>" value="<?php echo $row['price'] ?>">
                    <input type="hidden" id="stock<?php echo $i ?>" value="<?php echo $row['stock'] ?>">
                    <div class="col-lg-3 col-md-6 grids-feature" style="margin-bottom: 25px">
                        <div class="area-box bg-light text-dark">
                            <div class="icon-style">
                                <i><img src="../<?php echo $row['pimg'] ?>" style="height: 50px;width: 100px;padding-right: 26px;padding-bottom: 5px;border-radius: 100%"></i>
                            </div>
                            <h4><a href="" class="title-head text-dark"><?php echo $row['pname'] ?></a></h4>
                            <h6><a href="" class="title-head">Price &#8377; <?php echo $row['price'] ?></a></h6>
                            <h6>Quantity <input type="number" name="qty" class="number" id="qty<?php echo $i ?>" value="<?php echo $row['qty'] ?>" max='<?php echo $row['stock'] ?>' min="1"><input type="button" value="+" onclick="myFun(<?php echo $i ?>)"></h6>
                            <h6><a href="" class="title-head text-dark">Total &#8377; <?php echo $row['total'] ?></a></h6>
                            <a href="ViewProductsById.php?id=<?php echo $row['pid'] ?>" class="btn more p-0 text-dark">Explore More<i class="fas fa-long-arrow-alt-right ms-1"></i></a>
                            <br><a href="deleteFromCart.php?id=<?php echo $row['cid'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </div>
                    </div>

                <?php
                }
            } else {
                ?>
                <img src="../cart.png" style="width: 35%;height: 35%;margin-left: 400px; margin-right: auto;">

            <?php
            }
            ?>

        </div>
    </div>
</section>

<?php
$qry1 = mysqli_query($conn, "SELECT SUM(`total`) AS gtotal FROM `cart` WHERE `status`='Pending' and uid='$uid'");
if (mysqli_fetch_array($qry1) > 0) {
?>
    <section class="w3l-servicesblock1 py-1" id="services">
        <div class="container py-md-5 py-4">

            <?php
            $qry1 = mysqli_query($conn, "SELECT SUM(`total`) AS gtotal FROM `cart` WHERE `status`='Pending' and uid='$uid'");

            while ($row1 = mysqli_fetch_array($qry1)) {
            ?>

                <div class="title-heading-w3 text-center mb-sm-5 mb-4">
                    <h5 class="title-small mb-1">Continue With Your Payment ?</h5>
                    <h3 class="title-style">Price to pay</h3>
                </div>
                <div class="w3-services-grids py-lg-4">
                    <div class="fea-gd-vv row">
                        <div class="col-lg-6 col-md-12 mt-md-10 mt-8">
                            <div class="feature-gd icon-blue">
                                <div class="icon">
                                    <i><img src="../curr.png" style="width: 75px;padding-right: 11px;padding-bottom: 5px"></i>
                                </div>
                                <div class="icon-info">
                                    <h5 class="title-style">Total Amount To Pay : &#8377; <?php echo $row1['gtotal'] ?></h5>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <a href="ContinuePayment.php?amt=<?php echo $row1['gtotal'] ?>" class="btn btn-style">Proceed To Pay</a>
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
<script>
    function myFun(id) {
        cid = "cartid" + id
        qt = "qty" + id
        pri = "price" + id
        stk = "stock" + id
        pid = "proid" + id
        cartid = document.getElementById(cid).value
        qty = document.getElementById(qt).value
        price = document.getElementById(pri).value
        stock = document.getElementById(stk).value
        proid = document.getElementById(pid).value
        window.location = "updatecart.php?cartid=" + cartid + "&qty=" + qty + "&price=" + price + "&stock=" + stock + "&proid=" + proid + ""
    }
</script>
<?php
include '../Footer.php';
?>