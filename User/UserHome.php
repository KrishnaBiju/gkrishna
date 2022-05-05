
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
                    <i class="fab fa-etsy">-Grocery</i>
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
                    <h4>Online Grocery</h4>
                    <h3 class="mb-3 mt-1">Groceryshop</h3>
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
    

    <section class="w3l-bottom-grids-6 pt-sm-5 pb-5" id="features">
        <div class="container pt-lg-4">
            <div class="grids-area-hny main-cont-wthree-fea row">
                <div class="col-md-3 col-sm-4 ps-xl-5">
                    <h4 class="ab-exper-count mb-sm-4 ps-lg-4">Best</h4>
                    <p class="ab-content ps-lg-4">Service is what we provide</p>
                </div>
                <div class="col-xl-8 col-md-9 col-sm-8 offset-xl-1 ps-xl-0 pe-xl-5 mt-sm-0 mt-4">
                    <h3 class="title-style mb-sm-5 mb-4">We have the best service in present day, We can give the best</h3>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 grids-feature">
                            <div class="area-box active">
                                <div class="icon-style">
                                    <i class="fas fa-lightbulb"></i>
                                </div>
                                <h4><a href="#feature" class="title-head">Creative Methods</a></h4>

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 grids-feature mt-md-0 mt-4">
                            <div class="area-box">
                                <div class="icon-style">
                                    <i class="fas fa-laptop-code"></i>
                                </div>
                                <h4><a href="#feature" class="title-head">Better UI</a></h4>

                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 grids-feature mt-lg-0 mt-4">
                            <div class="area-box">
                                <div class="icon-style">
                                    <i class="fas fa-layer-group"></i>
                                </div>
                                <h4><a href="#feature" class="title-head">Best Branding</a></h4>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    <section class="w3l-gallery pb-5" id="gallery">
        <div class="container py-md-5 py-4">
            <div class="title-heading-w3 text-center mb-sm-5 mb-4">
                <h3 class="title-style">Some of my most recent products</h3>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 item">
                    <a href="assets/images/g1.jpg" data-lightbox="example-set" data-title="Project 1" class="zoom d-block">
                        <img class="card-img-bottom d-block" src="assets/images/g1.jpg" alt="Card image cap">
                        <span class="overlay__hover"></span>
                        <span class="hover-content">
                            <span class="title">Butter Cake</span>
                            <span class="content"></span>
                        </span>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 item mt-md-0 mt-4">
                    <a href="assets/images/11.jpg" data-lightbox="example-set" data-title="Project 2" class="zoom d-block">
                        <img class="card-img-bottom d-block" src="assets/images/11.jpg" alt="Card image cap">
                        <span class="overlay__hover"></span>
                        <span class="hover-content">
                            <span class="title">Cardamom</span>
                            <span class="content"></span>
                        </span>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6 item mt-lg-0 mt-4">
                    <a href="assets/images/g3.jpg" data-lightbox="example-set" data-title="Project 3" class="zoom d-block">
                        <img class="card-img-bottom d-block" src="assets/images/g3.jpg" alt="Card image cap">
                        <span class="overlay__hover"></span>
                        <span class="hover-content">
                            <span class="title">Heavy Pizza</span>
                            <span class="content"></span>
                        </span>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6 item mt-4 pt-lg-2">
                    <a href="assets/images/7.jpg" data-lightbox="example-set" data-title="Project 4" class="zoom d-block">
                        <img class="card-img-bottom d-block" src="assets/images/7.jpg" alt="Card image cap">
                        <span class="overlay__hover"></span>
                        <span class="hover-content">
                            <span class="title">Strawberry</span>
                            <span class="content"></span>
                        </span>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6 item mt-4 pt-lg-2">
                    <a href="assets/images/6.jpg" data-lightbox="example-set" data-title="Project 5" class="zoom d-block">
                        <img class="card-img-bottom d-block" src="assets/images/6.jpg" alt="Card image cap">
                        <span class="overlay__hover"></span>
                        <span class="hover-content">
                            <span class="title">Onion</span>
                            <span class="content"></span>
                        </span>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6 item mt-4 pt-lg-2">
                    <a href="assets/images/1.jpg" data-lightbox="example-set" data-title="Project 6" class="zoom d-block">
                        <img class="card-img-bottom d-block" src="assets/images/1.jpg" alt="Card image cap">
                        <span class="overlay__hover"></span>
                        <span class="hover-content">
                            <span class="title">Face Wash</span>
                            <span class="content"></span>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    

    <?php
    include '../Footer.php';
    ?>