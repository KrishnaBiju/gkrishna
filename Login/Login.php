
<?php
session_start();

?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content=" Login Form " />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
   
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> 
    <link rel="stylesheet" href="css/font-awesome.css"> 
   
    <link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    
</head>

<body>
    <div data-vide-bg="video/animation">
        <div class="center-container">
            <div class="header-w3l">
                <h1>Login</h1>
            </div>
            <div class="main-content-agile">
                <div class="left-w3l-mk">
                    <img src="images/pro.jpg" alt=" ">
                    <div class="social-icon">

                    </div>
                </div>
                <div class="sub-main-w3">
                    <div class="wthree-pro">
                        <h2><span>Connect</span> to Your Account</h2>
                    </div>
                    <form method="POST">
                        <input placeholder="E-mail" name="email" class="user" type="email" required="">
                        <span class="icon1"><i class="fa fa-user" aria-hidden="true"></i></span><br><br>
                        <input placeholder="Password" name="psw" class="pass" type="password" required="">
                        <span class="icon2"><i class="fa fa-unlock" aria-hidden="true"></i></span><br>


                        <div class="sub-w3l">
                            <h6><a href="../UserRegister.php">Sign Up</a></h6>
                            <div class="right-w3l">
                                <input type="submit" value="Login" name="submit">
                            </div>
                        </div>
                    </form>


                    
                   <?php
                    include '../dbconnection.php';
                    if (isset($_POST['submit'])) {
                        $uname = $_POST['email'];
                        $psw = $_POST['psw'];
                        $qry = "SELECT * FROM `login` WHERE `uname`='$uname' AND `psw`='$psw' AND `status`='Approved'";

                        $check = mysqli_query($conn, $qry);
                        if (mysqli_num_rows($check) == 0) {
                            echo "<script>alert('Invalid Username or password');</script>";
                            echo $qry;
                        } else {
                            $row = mysqli_fetch_assoc($check);
                            $_SESSION["USERID"] = $row["uid"];
                            if ($row["type"] == "admin") {
                                echo "<script>window.location='../Admin/AdminHome.php'</script>";
                            } elseif ($row["type"] == "user") {
                                echo "<script>window.location='../User/UserHome.php'</script>";
                            } elseif ($row["type"] == "staff") {
                                echo "<script>window.location='../Staff/StaffHome.php'</script>";
                            } else {
                                echo "<script>alert('Please check Your User name and Password');</script>";
                            }
                        }
                    }
                    ?>


                    

                    <a href="" </div>
                        <div class="clear"></div>
                </div>
                
                <div class="footer">
                    <p>&copy; 2022 All rights reserved | E-Grocery </p>
                </div>
                
            </div>
        </div>
    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
      
        <script src="js/jquery.vide.min.js"></script>
</body>

</html>