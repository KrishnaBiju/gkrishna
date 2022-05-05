<?php
session_start();
if (!isset($_SESSION['USERID'])) {
    header('location:../index.php');
}
include '../Header.php';
?>


<section class="w3l-contact py-5" id="contact">
    <div class="container py-lg-5 py-4">
        <div class="title-heading-w3 text-center mb-sm-5 mb-4">
            <h5 class="title-small">Join Us </h5>
            <h3 class="title-style">User Registration Page</h3>
        </div>
        <div class="row contact-block">

            <div class="col-md-6 contact-right mt-md-0 mt-5 ps-lg-0">
                <form method="POST" class="signin-form">
                    <div class="input-grids">
                        <input type="text" name="cat" id="w3lName" placeholder="Category*" class="contact-input" required="" />

                    </div>

                    <button class="btn btn-style" name="submit">Add</button>
                </form>


                

                <?php
                include '../dbconnection.php';
                if (isset($_POST['submit'])) {
                    $cat = $_POST['cat'];

                    $sel = mysqli_query($conn, "SELECT COUNT(*) AS COUNT FROM `category` WHERE `category`='$cat'");
                    $fetch = mysqli_fetch_array($sel);
                    if ($fetch['COUNT'] > 0) {
                        echo '<script>alert("Already Added")</script>';
                    } else {
                        $qry = "INSERT INTO `category`(`category`)values('$cat')";

                        $exe = mysqli_query($conn, $qry);
                        if ($qry) {
                            echo '<script>alert("Added Succesfull")</script>';
                        } else {
                            echo '<script>alert("Failed to Add")</script>';
                        }
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

<!-- //contact -->

<?php
include '../Footer.php';
?>