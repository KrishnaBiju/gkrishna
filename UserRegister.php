<?php

include './Header.php';
?>


<section class="w3l-contact py-5" id="contact">
    <div class="container py-lg-5 py-4">
        <div class="title-heading-w3 text-center mb-sm-5 mb-4">
            <h5 class="title-small">Join Us </h5>
            <h3 class="title-style">User Registration Page</h3>
        </div>
        <div class="row contact-block">

            <div class="col-md-6 contact-right mt-md-0 mt-5 ps-lg-0">
                <form method="POST" class="signin-form" enctype="multipart/form-data">
                    <div class="input-grids">
                        <input type="text" name="name" id="w3lName" placeholder="Your Name*" class="contact-input" required="" />
                        <label class="container1">Male
                            <input type="radio" checked="checked" name="gender" value="male">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container1">Female
                            <input type="radio" name="gender" value="female">
                            <span class="checkmark"></span>
                        </label>
                        <input type="email" name="email" id="w3lSender" placeholder="Your Email*" class="contact-input" required="" />
                        <input type="text" name="phone" id="w3lSubect" placeholder="Phone*" pattern="[6789][0-9]{9}" maxlength="10" class="contact-input" required="" />
                        <input type="text" name="age" id="w3lWebsite" placeholder="Age*" pattern="[0-9]{2}" class="contact-input" required="" />
                        <input type="text" name="place" id="w3lWebsite" placeholder="Place*" class="contact-input" required="" />
                        <input type="password" name="psw" id="w3lWebsite" placeholder="Enter your password*" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="contact-input" required="" />
                        <input type="file" name="file" id="w3lWebsite" placeholder="*" class="contact-input" required="" />
                    </div>
                    <div class="form-input">
                        <textarea name="address" id="w3lMessage" placeholder="Type your Address here*" required=""></textarea>
                    </div>
                    <button class="btn btn-style" name="submit">Register</button>
                </form>


                

                <?php
                include './dbconnection.php';
                if (isset($_POST['submit'])) {
                    $name = $_POST['name'];
                    $address = $_POST['address'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $age = $_POST['age'];
                    $gender = $_POST['gender'];
                    $place = $_POST['place'];
                    $psw = $_POST['psw'];

                    $folder = 'images/';
                    $file = $folder . basename($_FILES['file']['name']);
                    move_uploaded_file($_FILES['file']['tmp_name'], $file);
                    $folder = 'images/';
                    $file = $folder . basename($_FILES['file']['name']);


                    $sel = mysqli_query($conn, "SELECT COUNT(*) AS COUNT FROM `user` WHERE `phone`='$phone' OR `email`='$email'");
                    $fetch = mysqli_fetch_array($sel);
                    if ($fetch['COUNT'] > 0) {
                        echo '<script>alert("Already Registered")</script>';
                    } else {
                        $qry = "INSERT INTO `user`(`name`,`address`,`place`,`gender`,`age`,`phone`,`email`,img)values('$name','$address','$place','$gender','$age','$phone','$email','$file')";

                        $exe = mysqli_query($conn, $qry);
                        if ($qry) {
                            $qry2 = mysqli_query($conn, "INSERT INTO `login`(`uid`,`uname`,`psw`,`type`)VALUES((SELECT MAX(`uid`)FROM `user`),'$email','$psw','user')");
                            echo '<script>alert("Registration Succesfull")</script>';
                        } else {
                            echo '<script>alert("Failed to Register")</script>';
                        }
                    }
                }
                ?>








                


            </div>
        </div>
    </div>
</section>

<div class="map-iframe">
    <img src="assets/images/foot.jpg" width="100%" height="400" frameborder="0" style="border: 0px;" allowfullscreen="" />
</div>


<?php
include './Footer.php';
?>