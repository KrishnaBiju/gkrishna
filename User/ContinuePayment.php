<?php
session_start();
if (!isset($_SESSION['USERID'])) {
    header('location:index.php');
}
$amt = $_GET['amt'];
?>
<br>
<html>

<head>
    <link href="../static/web/css/bootstrap.css" type="text/css" rel="stylesheet" media="all">
    <!-- shop css -->
    <link href="../static/web/css/shop.css" type="text/css" rel="stylesheet" media="all">
    <link href="../static/web/css/flexslider.css" type="text/css" rel="stylesheet" media="all">
    <link href="../static/web/css/style.css" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <link href="web/css/fontawesome-all.min.css" rel="stylesheet">
    <!-- //Custom Theme files -->
    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Elsie+Swash+Caps:400,900" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
    <!-- //online-fonts -->
</head>

<body>
    <form method="get" action="../Action/ProceedToPay.php">
        <!--Payment-->
        <section class="payment_w3ls py-5">
            <div class="container">
                <div class="privacy about">
                    <h5 class="head_agileinfo text-center text-capitalize pb-5">
                        <span>P</span>ayment Details
                    </h5>

                    <div class="tab4">
                        <div class="pay_info">
                            <div class="row">
                                <div class="col-md-6 tab-grid">
                                    <img class="pp-img" style="width:400px" src="../static/web/images/paypal.png" alt="Image Alternative text" title="Image Title">
                                    <h5 class="head_agileinfo text-center text-capitalize pb-5">
                                        <span>Amount:<label style="color:red">Rs.<?php echo $amt ?></label> </span>
                                    </h5>


                                </div>
                                <div class="col-md-6">
                                    <form action="../Action/ProceedToPay.php" method="post" class="creditly-card-form shopf-sear-headinfo_form">
                                        <section class="creditly-wrapper payf_wrapper">
                                            <div class="credit-card-wrapper">
                                                <div class="first-row form-group">



                                                    <label>Name on Card</label>
                                                    <input class="form-control" required title="enter name on card" type="text" name="name">

                                                    <label>Card Number</label>
                                                    <input class="number form-control" pattern="^[0-9]{16}" required title="enter proper card number" type="text" maxlength="16" name="cardnumber">

                                                    <label>Expiry Date</label>
                                                    <input type="date" class="credit-card-name form-control" pattern="^[a-z A-Z]" required title="enter name on card" type="text" name="date">

                                                    <div class="fpay_card_number_grid_right">
                                                        <div class="controls">
                                                            <label class="control-label">CVV</label>
                                                            <input class="security-code form-control" pattern="^[0-9]{3}" required title="enter proper cvv" type="password" name="cvv">
                                                        </div>
                                                    </div>
                                                    <div class="clear"> </div>
                                                </div>
                                            </div>
                                            <input class="btn btn-primary submit" type="submit" name="submit" value="Proceed Payment">
                                        </section>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
    <!--//tabs-->

    </div>
    <script src="../static/web/js/jquery-2.2.3.min.js"></script>
    <!-- //js -->
    <!-- smooth dropdown -->
    <script>
        $(document).ready(function() {
            $('ul li.dropdown').hover(function() {
                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(200);
            }, function() {
                $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(200);
            });
        });
    </script>
    <!-- //smooth dropdown -->
    <!-- script for password match -->
    <script>
        window.onload = function() {
            document.getElementById("password1").onchange = validatePassword;
            document.getElementById("password2").onchange = validatePassword;
        }

        function validatePassword() {
            var pass2 = document.getElementById("password2").value;
            var pass1 = document.getElementById("password1").value;
            if (pass1 != pass2)
                document.getElementById("password2").setCustomValidity("Passwords Don't Match");
            else
                document.getElementById("password2").setCustomValidity('');
            //empty string means no validation error
        }
    </script>
    <!-- script for password match -->

    <!-- cart-js -->
    <script src="../static/web/js/minicart.js"></script>
    <script>
        hub.render();

        hub.cart.on('new_checkout', function(evt) {
            var items, len, i;

            if (this.subtotal() > 0) {
                items = this.items();

                for (i = 0, len = items.length; i < len; i++) {}
            }
        });
    </script>
    <!-- //cart-js -->
    <!-- easy-responsive-tabs -->
    <script src="../static/web/js/easy-responsive-tabs.js"></script>
    <script>
        $(document).ready(function() {
            $('#horizontalTab').easyResponsiveTabs({
                type: 'default', //Types: default, vertical, accordion           
                width: 'auto', //auto or any width like 600px
                fit: true, // 100% fit in a container
                closed: 'accordion', // Start closed if in accordion view
                activate: function(event) { // Callback function if tab is switched
                    var $tab = $(this);
                    var $info = $('#tabInfo');
                    var $name = $('span', $info);
                    $name.text($tab.text());
                    $info.show();
                }
            });
        });
    </script>
    <!-- //easy-responsive-tabs -->

    <!-- credit-card -->
    <script src="../static/web/js/creditly.js"></script>
    <link rel="stylesheet" href="../static/web/css/creditly.css" type="text/css" media="all" />

    <script>
        $(function() {
            var creditly = Creditly.initialize(
                '.creditly-wrapper .expiration-month-and-year',
                '.creditly-wrapper .credit-card-number',
                '.creditly-wrapper .security-code',
                '.creditly-wrapper .card-type');

            $(".creditly-card-form .submit").click(function(e) {
                e.preventDefault();
                var output = creditly.validate();
                if (output) {
                    // Your validated credit card output
                    console.log(output);
                }
            });
        });
    </script>
    <!-- //credit-card -->
    <!-- start-smooth-scrolling -->
    <script src="../static/web/js/move-top.js"></script>
    <script src="../static/web/js/easing.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();

                $('html,body').animate({
                    scrollTop: $(this.hash).offset().top
                }, 1000);
            });
        });
    </script>
    <!-- //end-smooth-scrolling -->
    <!-- smooth-scrolling-of-move-up -->
    <script>
        $(document).ready(function() {
            /*
            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear' 
            };
            */

            $().UItoTop({
                easingType: 'easeOutQuart'
            });

        });
    </script>
    <script src="../static/web/js/SmoothScroll.min.js"></script>
    <!-- //smooth-scrolling-of-move-up -->
    <!-- Bootstrap core JavaScript
        ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../static/web/js/bootstrap.js"></script>
    <!-- //payment -->

</body>

</html>