<?php
session_start();
if (!isset($_SESSION['USERID'])) {
    header('location:../index.php');
}
include '../Header.php';
include '../dbconnection.php';
$uid = $_SESSION["USERID"];
$qry = "SELECT * FROM `user`u, `login`l WHERE u.`uid`='$uid' AND u.`email`=l.`uname`";
$res = mysqli_query($conn, $qry);
$row = mysqli_fetch_array($res);
?>


<section class="w3l-contact " id="contact">
    <div class="container">
        <div class="title-heading-w3 text-center mb-sm-5 mb-4">
            <h5 class="title-small"></h5>
            <h3 class="title-style">Profile</h3>
        </div>
        <div class="row contact-block">

            <div class="col-md-12  mt-5 text-center">
                <form method="POST" class="signin-form" enctype="multipart/form-data">
                    <div class="input text-center">
                        <input type="text" name="name" id="w3lName" value="<?php echo $row['name'] ?>" placeholder="Your Name*" class="contact-input" required="" />
                        <input type="email" name="email" id="w3lSender" value="<?php echo $row['email'] ?>" placeholder="Your Email*" class="contact-input" required="" />
                        <input type="text" name="phone" id="w3lSubect" value="<?php echo $row['phone'] ?>" placeholder="Phone*" pattern="[6789][0-9]{9}" maxlength="10" class="contact-input" required="" />
                        <input type="text" name="age" id="w3lWebsite" value="<?php echo $row['age'] ?>" placeholder="Age*" pattern="[0-9]{2}" class="contact-input" required="" />
                        <input type="text" name="place" id="w3lWebsite" value="<?php echo $row['place'] ?>" placeholder="Place*" class="contact-input" required="" />
                        <input type="password" name="psw" id="w3lWebsite" value="<?php echo $row['psw'] ?>" placeholder="Enter your password*" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="contact-input" required="" />
                    </div>
                    <div class="form-input">
                        <textarea name="address" id="w3lMessage" value="" placeholder="Type your Address here*" required=""><?php echo $row['address'] ?></textarea>
                    </div>
                    <button class="btn btn-style" name="submit" style="margin: auto;">Update</button>
                </form>


                

                <?php
                if (isset($_POST['submit'])) {
                    $name = $_POST['name'];
                    $address = $_POST['address'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $age = $_POST['age'];
                    $place = $_POST['place'];
                    $psw = $_POST['psw'];

                    $qry = "UPDATE `user` SET `name`='$name',`address`='$address',`place`='$place',`age`='$age',`phone`='$phone',`email`='$email' WHERE `uid`='$uid'";
                    $exe = mysqli_query($conn, $qry);
                    $qry2 = mysqli_query($conn, "UPDATE `login` SET `psw`='$psw' WHERE `uid`='$uid' AND `type`='user'");

                    if ($exe && $qry2) {
                        echo '<script>alert("Profile Updated"); window,location="UserProfile.php"</script>';
                    } else {
                        echo '<script>alert("Failed to Update")</script>';
                    }
                }
                ?>








                <!--            
    Action
-->



            </div>
        </div>
    </div>
</section>
<!-- map -->
<div class="map-iframe">
    <img src="assets/images/foot.jpg" width="100%" height="400" frameborder="0" style="border: 0px;" allowfullscreen="" />
</div>
<!-- //contact -->

<?php
include '../Footer.php';
?>