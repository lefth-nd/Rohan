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

    <!-- testing column categories -->
    <style>
        * {
            box-sizing: border-box;
        }

        .row {
            display: flex;
        }


        .column {
            flex: 50%;
            padding: 10px;
            height: 300px;
        }
    </style>


</head>

<body>

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
                <a class="nav_links" href="wishlist.php">Wishlist<?php echo " (" . $_SESSION["wishcount"] . ")" ?></a>
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

        <div class="home_body" id="news" style="width:1500px">
            <div class="heading">
                <h1 style="text-align:center; font-size:55px">About Us</h1>
            </div>
            <div class="row">
                <div class="column">
                    <div class="sub_heading">
                        <h2 style="font-size: 40px; text-align:center">WHO WE ARE</h2>
                    </div>
                    <p>
                        <span style="font-size: 20px;">SENIOR is an online marketplace launched in 20XX dedicated to offer recreational equipments to seniors.</span>
                    </p>
                </div>

                <div class="column">
                    <div class="sub_heading">
                        <h2 style="font-size: 40px; text-align:center">OUR GOALS</h2>
                    </div>
                    <p>
                        <span style="font-size: 20px;">Our goal is to provide a easy method of buying, selling and trading equipments with seniors, acting as the method of encouraging outdoor recreation for grey nomads.</span>
                    </p>
                </div>

            </div>
        </div>
    </div>
</body>
