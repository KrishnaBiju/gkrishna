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
            <h5 class="title-small">Product </h5>
            <h3 class="title-style">Add New Product details</h3>
        </div>
        <div class="row contact-block">

            <div class="col-md-6 contact-right mt-md-0 mt-5 ps-lg-0">
                <form method="POST" class="signin-form" enctype="multipart/form-data">
                    <div class="input-grids">
                        <input type="text" name="pname" id="w3lName" placeholder="Product Name*" class="contact-input" required="" />
                        <input type="number" name="price" id="w3lWebsite" placeholder="Price*" class="contact-input" required="" />
                        <input type="number" name="stock" id="w3lWebsite" placeholder="Stock*" class="contact-input" required="" />

                        <div class="custom-select" style="width:580px;">
                            <select name="cat">
                                <?php
                                include '../dbconnection.php';
                                $qry1 = "select * from category";
                                $res1 = mysqli_query($conn, $qry1);
                                while ($row1 = mysqli_fetch_array($res1)) {
                                    echo "<option value='" . $row1['category'] . "'>" . $row1['category'] . "</option>";
                                }
                                ?>
                            </select>

                        </div>

                        &nbsp;
                        <input type="file" name="file" id="w3lWebsite" placeholder="*" class="contact-input" required="" />
                    </div>
                    <div class="form-input">
                        <textarea name="dec" id="w3lMessage" placeholder="Type your description here*" required=""></textarea>
                    </div>
                    <button class="btn btn-style" name="submit">Add</button>
                </form>


                

                <?php
                include '../dbconnection.php';
                if (isset($_POST['submit'])) {
                    $pname = $_POST['pname'];
                    $price = $_POST['price'];
                    $stock = $_POST['stock'];
                    $cat = $_POST['cat'];
                    $dec = $_POST['dec'];

                    $folder = '../images/';
                    $file = $folder . basename($_FILES['file']['name']);
                    move_uploaded_file($_FILES['file']['tmp_name'], $file);
                    $folder = 'images/';
                    $file = $folder . basename($_FILES['file']['name']);

                    $sel = mysqli_query($conn, "SELECT COUNT(*) AS COUNT FROM `product` WHERE `pname`='$pname'");
                    $fetch = mysqli_fetch_array($sel);
                    if ($fetch['COUNT'] > 0) {
                        echo '<script>alert("Already Added")</script>';
                    } else {
                        $qry = "INSERT INTO `product`(`pname`,`desc`,`cat`,`price`,stock,pimg)values('$pname','$dec','$cat','$price','$stock','$file')";

                        $exe = mysqli_query($conn, $qry);
                        if ($qry) {
                            echo '<script>alert("Added Succesfull")</script>';
                        } else {
                            echo '<script>alert("Failed to Add")</script>';
                        }
                    }
                }
                ?>


                

            </div>
        </div>
    </div>
</section>


<?php
include '../Footer.php';
?>