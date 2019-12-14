<?php
session_start();
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_URL, 'http://kpsjsuprojects.com/common_products.php');
$karanResult = curl_exec($curl);
$karan = json_decode(
    $karanResult, true
);
//function cmp($a, $b) {
//    return strcmp($a["name"], $b["name"]);
//}
//usort($karan, "cmp");
// This is for price in descending order
    usort($karan, function($a, $b) {
        if($a['price']==$b['price']) return 0;
        return $a['price'] < $b['price']?1:-1;
    });
curl_close($curl);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>MARXETPLACE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <?php
            if(isset($_SESSION['name'])){
                echo "<a class='navbar-brand' href='index.php'>WELCOME". $_SESSION['name']."</a>";
            }
            else{
                echo "<a class='navbar-brand' href='index.php'>MARXETPLACE</a>";
            }
        ?>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item active"><a href="shop.php" class="nav-link">Products</a></li>
                <li class="nav-item active"><a href="login.php" class="nav-link">Log In</a></li>
                <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
                <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span><?php echo isset($_SESSION["cart_item"]) ? sizeof($_SESSION["cart_item"]):0;?></a></li>

            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">Products</h1>
            </div>
        </div>
    </div>
</div>
<div class="row mt-5">
    <div class="col text-center">
        <div class="block-27">
            <ul>
                <li><a href="shop.php">All Products</a></li>
                <li><a href="house.php">Houses</a></li>
                <li><a href="travel.php">Travel Experience</a></li>
                <li class="active" ><a href="cloud.php">Cloud Services</a></li>
                <li><a href="chocolate.php">Chocolates</a></li>
                <li><a href="marvel.php">Marvel Products</a></li>
                <br>
                <li class="active"><a href="cloudhp.php">Highest Price</a></li>
                <li><a href="cloudlp.php">Lowest Price</a></li>
                <li><a href="cloudlexi.php">Sort A-Z</a></li>
            </ul>
        </div>
    </div>
</div>
<section class="ftco-section bg-light">
    <div class="container-fluid" >
        <div class="row">
            <?php
            foreach( $karan as $item){
                echo ('<div class="col-sm col-md-6 col-lg-3 ftco-animate">
                                                <div class="product">
                                                <a href="viewproduct.php?id=' .$item["id"].'" class="img-prod"><img class="img-fluid fixed-height" src="'.$item["image"].'" alt="Colorlib Template" style="width:100%" height="10" >
                                                </a>
                                                    <div class="text py-3 px-3">
                                                        <h3><a href="viewproduct.php?id=' .$item["id"].'">'.$item["name"].'</a></h3>
                                                        <div class="d-flex">
                                                            <div class="pricing">
                                                                <p class="price"><span>$'.$item["price"].' / hr.</span></p>
                                                            </div>
                                                            <div class="rating">
                                                                <p class="text-right">
                                                                    <span class="ion-ios-star-outline"></span>
                                                                    <span class="ion-ios-star-outline"></span>
                                                                    <span class="ion-ios-star-outline"></span>
                                                                    <span class="ion-ios-star-outline"></span>
                                                                    <span class="ion-ios-star-outline"></span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <p class="bottom-area d-flex">
                                                            <a href="shop.php?action=add&id='.$item["id"].'" class="add-to-cart"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
                                                            <a href="#" class="ml-auto"><span><i class="ion-ios-heart-empty"></i></span></a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            ');
            }
            ?>
        </div>
    </div>
</section>

<footer class="ftco-footer bg-light ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Modist</h2>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-5">
                    <h2 class="ftco-heading-2">Menu</h2>
                    <ul class="list-unstyled">
                        <li><a href="#" class="py-2 d-block">Shop</a></li>
                        <li><a href="#" class="py-2 d-block">About</a></li>
                        <li><a href="#" class="py-2 d-block">Journal</a></li>
                        <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Help</h2>
                    <div class="d-flex">
                        <ul class="list-unstyled mr-l-5 pr-l-3 mr-4">
                            <li><a href="#" class="py-2 d-block">Shipping Information</a></li>
                            <li><a href="#" class="py-2 d-block">Returns &amp; Exchange</a></li>
                            <li><a href="#" class="py-2 d-block">Terms &amp; Conditions</a></li>
                            <li><a href="#" class="py-2 d-block">Privacy Policy</a></li>
                        </ul>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">FAQs</a></li>
                            <li><a href="#" class="py-2 d-block">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">

                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>

</body>
</html>