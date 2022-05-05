<?php
session_start();
if (!isset($_SESSION['USERID'])) {
    header('location:../index.php');
}
include '../Header.php';
?>

<section class="w3l-aboutblock1 pt-lg-5 pt-2 pb-5" id="about">
    <div class="container py-md-5 py-4">

        <?php
        include '../dbconnection.php';
        $id = $_GET['id'];
        $qry = mysqli_query($conn, "SELECT l.`lid`,u.* FROM `login` l,`staff` u WHERE l.`uid`=u.`sid` AND l.`status`='Approved' AND l.`lid`='$id'");
        if (mysqli_fetch_array($qry) > 0) {
            $qry = mysqli_query($conn, "SELECT l.`lid`,u.* FROM `login` l,`staff` u WHERE l.`uid`=u.`sid` AND l.`status`='Approved' AND l.`lid`='$id'");

            while ($row = mysqli_fetch_array($qry)) {
        ?>

                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <div class="position-relative">
                            <img src="../<?php echo $row['img'] ?>" alt="" class="radius-image img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-8 ps-lg-5 mt-lg-0 mt-5">
                        <h3 class="title-style"><?php echo $row['name'] ?></h3>
                        <p class="mt-3"><?php echo $row['address'] ?></p>
                        <div class="my-info mt-md-5 mt-4">
                            <ul class="single-info">
                                <li class="name-style">Gender</li>
                                <li>:</li>
                                <li>
                                    <p><?php echo $row['gender'] ?></p>
                                </li>
                            </ul>
                            <ul class="single-info">
                                <li class="name-style">Age</li>
                                <li>:</li>
                                <li>
                                    <p><?php echo $row['age'] ?> Years</p>
                                </li>
                            </ul>
                            <ul class="single-info">
                                <li class="name-style">From</li>
                                <li>:</li>
                                <li>
                                    <p><?php echo $row['place'] ?></p>
                                </li>
                            </ul>
                            <ul class="single-info">
                                <li class="name-style">Contact</li>
                                <li>:</li>
                                <li>
                                    <p><?php echo $row['phone'] ?></p>
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