<!DOCTYPE html>
<html lang="en">
<head>
    <title>Community</title>
    <meta charset="UTF-8" />
    <meta name="author" content="Team_Rohan" />
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/community.css" />
    <link rel="icon" href="../images/favicon.png">
    <script src="../scripts/script.js" defer></script>
</head>
<?php
require_once "../db/dbconn.inc.php";
/*
session_start();
*/
$_SESSION["wishcount"] = 0;
$added = 'Add To Wishlist';
if(isset($_SESSION["active"]) && $_SESSION["active"]){
    $userid = $_SESSION["id"];
}else{
    $userid = "";
}
$wishc = "SELECT * FROM `wishlists` WHERE userID = $userid;";
if($w = mysqli_query($conn, $wishc)){
    if(mysqli_num_rows($w) > 0){
        while($rw = mysqli_fetch_assoc($w)){
                $_SESSION["wishcount"] = $_SESSION["wishcount"] + 1;
        }
    }
}else{
    $_SESSION["wishcount"] = 0;
}

?>

<body >
    <div class="top_third">
        <div class="menu_container">
            <h1 class="menu_title_s"><a href="../home/index.php">SENIOR</a></h1>
        </div>
        <div class="nav" id="nav_bottom">
            <div class="nav_list">
                <img src="../images/watchlist.png" />
                <a class="nav_links" href="../nav/wishlist.php">Wishlist<?php echo " (" . $_SESSION["wishcount"] . ")"?></a>
                <img src="../images/cart.png" />
                <a class="nav_links" href="../nav/cart.php">My Cart</a>
                <img src="../images/checkout.png" />
                <a class="nav_links" href="../nav/checkout.php">Checkout</a>
                <img src="../images/login.png" />
                <?php
                if (isset($_SESSION["active"]) && $_SESSION["active"] === true) {
                    echo "<a class = 'nav_links' href='../home/logout.php'>Logout</a>";

                    $product_sql = "SELECT * FROM `products`;";
                    $psql = mysqli_query($conn, $product_sql);
                    $row = mysqli_fetch_assoc($psql);

                    $msg = "";

                    $total = 0;
                    $creditcard = $_SESSION["creditcard"];
                    $addr = $_SESSION["addr"];
                    $userid = $_SESSION["id"];

                    $productid = 0;
                } else {
                    echo
                    "<a class = 'nav_links' href='../nav/login.php'>Login</a>
                    ";

                    $addcart = '../home/error.php';
                    $addwish = '../home/error.php';
                    $msg = "?msg=Please%20login%20or%20create%20an%20account.";
                }
                ?>
            </div>
        </div>
        <div class="nav" id="nav_top">
            <ul class="main_menu">
                <li class="list"><a href="../home/index.php"><span class="media_text">Home</span></a></li>
                <li class="list"><a href="../community/community-landing.php" id="selected"><span class="media_text">Community Marketplace</span></a></li>
                <li class="list"><a href="../home/shopping.php"><span class="media_text">Shopping</span></a></li>
                <li class="list"><a href="../home/about.php"><span class="media_text">About</span></a></li>
                <li class="list"><a href="../home/contact.php"><span class="media_text">Contact</span></a></li>
            </ul>
        </div>
    </div>
    <!--beginning of item grid list-->
    <div class="page_wrapper">


    </div>
    <div class="footer">
        <h4>Thomas Hobbs | Udall Liao | Jay Schuyler</h4>
    </div>
</body>

</html>
