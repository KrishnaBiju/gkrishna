<?php
session_start();
if (!isset($_SESSION['USERID'])) {
    header('location:../index.php');
}
include '../Header.php';
?>



<section class="w3l-about2 py-5">
    <div class="container py-lg-5 py-md-4 py-2">

        <?php
        include '../dbconnection.php';
        $id = $_GET['id'];
        $qry = mysqli_query($conn, "SELECT * FROM `product` WHERE `pid`='$id'");
        if (mysqli_fetch_array($qry) > 0) {
            $qry = mysqli_query($conn, "SELECT * FROM `product` WHERE `pid`='$id'");

            while ($row = mysqli_fetch_array($qry)) {
        ?>

                <div class="row align-items-center">
                    <div class="col-lg-6 pe-lg-5">
                        <h5 class="title-small mb-1"><?php echo $row['cat'] ?></h5>
                        <h3 class="title-style"><?php echo $row['pname'] ?></h3>
                        <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                        <div class="cwp23-text-cols mt-lg-5 mt-4">

                            <div class="column">

                                <span>Price : &#8377; <?php echo $row['price'] ?>/-</span>
                                <p><?php echo $row['desc'] ?></p>
                                <div class="text-center mt-5">
                                    &nbsp;
                                    &nbsp;
                                </div>


                                <form method="POST" class="signin-form">
                                    <div class="row contact-block">
                                        <div class="input-grids">
                                            <label>Current Stock : </label>
                                            <input type="number" name="stock" id="w3lWebsite" placeholder="<?php echo $row['stock'] ?> " class="contact-input" required="" />
                                        </div>
                                    </div>
                                    <div class="text-center mt-5">
                                        <button class="btn btn-style" name="submit">Update Stock</button>
                                    </div>

                                </form>

                                <?php
                                if (isset($_POST['submit'])) {
                                    $stock = $_POST['stock'];
                                    $qry = mysqli_query($conn, "UPDATE `product` SET `stock`='$stock' WHERE `pid`='$id'");
                                    if ($qry) {
                                        echo '<script>alert("Updated Stock Succesfull")</script>';
                                        echo '<script>location.href="ViewProduct.php"</script>';
                                    } else {
                                        echo '<script>alert("Failed to Update")</script>';
                                        echo '<script>location.href="ViewProduct.php"</script>';
                                    }
                                }
                                ?>

                            </div>


                        </div>
                    </div>
                    <div class="col-lg-6 cwp23-text align-self mt-lg-0 mt-5">
                        <img src="../<?php echo $row['pimg'] ?>" alt="" class="radius-image img-fluid" style="height: 100%;width: 100%">
                    </div>
                </div>

            <?php
            }
        } else {
            ?>

            <img src="../nodatafound.png" width="30%" height="30%" style=" margin-left: auto; margin-right: auto;">

        <?php
        }
        ?>


    </div>
</section>

<?php
include '../Footer.php';
?>