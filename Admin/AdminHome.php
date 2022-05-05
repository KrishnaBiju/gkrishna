
<?php
session_start();
if (!isset($_SESSION['USERID'])) {
    header('location:../index.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>online Grocery</title>   
    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style-starter.css">
</head>

<body>
    <header id="site-header" class="fixed-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="">
                    <i class="fab fa-etsy">-Grosery</i>
                </a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                    <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </button>

                <?php
                include './Head.php';
                ?>

               
            </nav>
        </div>
    </header>
   
    <section class="w3l-banner py-5" id="home">
        <div class="container py-md-5 py-4">
            <div class="row align-items-center pt-4">
                <div class="col-md-6 banner-left pe-xl-5">
                    <h4>Grosery Online Ordering</h4>
                    <h3 class="mb-3 mt-1">E-Grosery</h3>
                    <p class="banner-sub me-md-5">The online products ordering and managing the sales
                        information by using the capabilities of a system.
                    </p>
                    <div class="d-flex align-items-center buttons-banner mt-sm-5 mt-4">
                        <a href="../Login/Login.php" class="btn btn-style me-2">Sign Out</a>
                    </div>
                </div>
                <div class="col-md-6">
                </div>
            </div>
        </div>
        
    </section>
    
   

    <?php
    include '../Footer.php';
    ?>