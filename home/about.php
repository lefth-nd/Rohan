<!DOCTYPE html>
<html lang="en">

<head>
    <title>About</title>
    <meta charset="UTF-8" />
    <meta name="author" content="TUJ_Rohan" />
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="icon" href="../images/favicon.png">
    <script src="../scripts/script.js" defer></script>
    <style>
        .row {
            display: flex;
            padding-top: 50px;
        }
        .column {
            flex: 50%;
            padding: 10px;
        }
        .about_menu_container {
            margin: auto;
            padding-top: 32px;
            padding-bottom: 2px;
            background-color: #465343;
            box-shadow: 0px 1px 8px 0px #222;
            /* display: inline-flex; */
            flex-wrap: wrap;
            flex-direction: row;
            align-items: center;
            /* justify-content: space-around; */
            height: auto;
            width: 100%;
        }
    </style>
</head>

<body>
<?php require_once "../db/dbconn.inc.php" ?>

    <div class="top_third">
        <div id="mc" class="menu_container">
            <h1 class="menu_title_s"><a href="../home/index.php">SENIOR</a></h1>
        </div>
        <div class="nav" id="nav_bottom">
            <div class="nav_list">
                <img src="../images/watchlist.png">
                <a class="nav_links" href="../nav/wishlist.php">Wishlist<?php echo " (" . $_SESSION["wishcount"] . ")" ?></a>
                <img src="../images/cart.png">
                <a class="nav_links" href="../nav/cart.php">My Cart</a>
                <img src="../images/checkout.png">
                <a class="nav_links" href="../nav/checkout.php">Checkout</a>
                <img src="../images/login.png">
                <a class="nav_links" href="../nav/login.php">Login</a>
            </div>
        </div>
        <div class="nav" id="nav_top">
            <ul class="main_menu">
                <li class="list"><a href="../home/index.php"><span class="media_text">Home</span></a></li>
                <li class="list"><a href="../community/community-landing.php"><span class="media_text">Community Marketplace</span></a></li>
                <li class="list"><a href="../home/shopping.php"><span class="media_text">Shopping</span></a></li>
                <li class="list"><a href="../home/about.php" id="selected"><span class="media_text">About</span></a></li>
                <li class="list"><a href="../home/contact.php"><span class="media_text">Contact</span></a></li>
            </ul>
        </div>
    </div>

    <div class="page_wrapper">
        <div class="home_body" id="news" style="width:1500px; height:1200px;">
            <div class="about_menu_container">
                <h1 style="text-align:center; font-size:55px; color:white;">About Us</h1>
            </div>
            <div class="row">
                <div class="column">
                    <div class="sub_heading">
                        <h2 style="font-size: 40px; text-align:center">WHO WE ARE</h2>
                    </div>
                    <p>
                        <span style="font-size: 20px;">SENIOR is an online marketplace launched in 2022 dedicated to offer recreational equipments to seniors.</span>
                    </p>
                </div>

                <div class="column">
                    <div class='block_1'>
                        <img src='../images/greeting_2.png' style="display:block; margin-left:auto; margin-right:auto; width:70%;" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class='block_1'>
                        <img src='../images/greeting_2.png' style="display:block; margin-left:auto; margin-right:auto; width:70%; " />
                    </div>
                </div>
                <div class="column">
                    <div class="sub_heading">
                        <h2 style="font-size: 40px; text-align:center; padding-top:30px">OUR GOALS</h2>
                    </div>
                    <p>
                        <span style="font-size: 20px;">Our goal is to provide a easy method of buying, selling and trading equipments with seniors, acting as the method of encouraging outdoor recreation for grey nomads.</span>
                    </p>
                </div>

            </div>

        </div>
    </div>
</body>
