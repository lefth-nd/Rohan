<!DOCTYPE html>
<html lang="en">
<head>
<title>About</title>
<meta charset="UTF-8" />
<meta name="author" content="TUJ_Rohan" />
<link rel="stylesheet" href="styles/style.css" />
<!-- <link rel="stylesheet" href="styles/about.css" /> -->
<link rel="icon" href="images/favicon.png">
<script src="scripts/script.js" defer></script>
</head>

<body>
    <?php session_start(); ?>
<div class="top_third">
    <div class="menu_container">
            <h1 class="menu_title_s"><a href="index.php">SENIOR</a></h1>
        <!--
        <div class="menu_title_s" id="logo">
            <img src="images/home_banner.png" width="40%">
        </div>
        -->
    </div>
        <div class="nav" id="nav_bottom">
            <div class="nav_list">
                <img src="images/watchlist.png">
                <a class="nav_links" href="wishlist.php">Wishlist<?php echo " (" . $_SESSION["wishcount"] . ")"?></a>
                <img src="images/cart.png">
                <a class="nav_links" href="cart.php">My Cart</a>
                <img src="images/checkout.png">
                <a class="nav_links" href="checkout.php">Checkout</a>
                <img src="images/login.png">
                <a class="nav_links" href="login.php">Login</a>
            </div>
        </div>
        <div class="nav" id="nav_top">
            <ul class="main_menu">
                <li class="list"><a href="index.php"><span class="media_text">Home</span></a></li>
                <li class="list"><a href="community.php"><span class="media_text">Community Marketplace</span></a></li>
                <li class="list"><a href="shopping.php"><span class="media_text">Shopping</span></a></li>
                <li class="list"><a href="about.php" id="selected"><span class="media_text">About</span></a></li>
                <li class="list"><a href="contact.php"><span class="media_text">Contact</span></a></li>
            </ul>
        </div>
</div>

    <div class="page_wrapper">
        
    <div class="home_body" id="news">
        <div class = "heading">
            <h2 style="text-align:center; font-size:40px">About Us</h2>
        </div>       
        <div class = "sub_heading">
            <h2 style="text-align:center">WHO WE ARE</h2>
        </div>
            <span>SENIOR is an online marketplace dedicated to recreational equipments for seniors.</span>

        <div class = "sub_heading">
            <h2 style="text-align:center">OUR GOALS</h2>
        </div>
        <p>
                <span>Reprehenderit ea cillum sit aute fugiat sit minim labore tempor magna amet reprehenderit. </span>
                <span>Mollit nisi laborum velit pariatur quis aliquip nostrud consectetur pariatur anim amet ipsum sit sit. </span>
                <span>In eiusmod reprehenderit ipsum fugiat. </span>
                <span>Laboris elit ut et ullamco esse et voluptate esse eu. </span>
                <span>Adipisicing deserunt eu id voluptate sint aliqua reprehenderit aliquip aute culpa. </span>
                <span>Ea aliqua adipisicing aute esse nulla esse cupidatat nostrud pariatur qui ex. </span>
                <span>Proident sunt dolore non id voluptate. </span>
                <span>Cillum do in tempor veniam reprehenderit excepteur ipsum pariatur excepteur. </span>
        </p>    

    </div>
    </div>
</body>