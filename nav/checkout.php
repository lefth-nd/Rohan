<!DOCTYPE html>
<html lang="en">
<head>
    <title>Cart</title>
    <meta charset="UTF-8" />
    <meta name="author" content="TUJ_Rohan" />
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/footer.css" />
    <link rel="icon" href="../images/favicon.png">
    <script src="../scripts/script.js" defer></script>
</head>

<body>
<?php require_once "../db/dbconn.inc.php" ?>
    <div class="top_third">
        <div id="mc" class="menu_container">
            <h1 class="menu_title_s"><a href="../home/index.php">SENIOR</a></h1>
        </div>
        <div class="nav" id="nav_bottom">
            <div class="nav_list">
                <img src="../images/watchlist.png" />
                <a class="nav_links" href="../nav/wishlist.php">Wishlist<?php echo " (" . $_SESSION["wishcount"] . ")" ?></a>
                <img src="../images/cart.png" />
                <a class="nav_links" href="../nav/cart.php">My Cart</a>
                <img src="../images/checkout.png" />
                <a class="nav_links" href="../nav/checkout.php">Checkout</a>
                <img src='../images/login.png' />
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
                <li class="list"><a href="../community/community.php"><span class="media_text">Community Marketplace</span></a></li>
                <li class="list"><a href="../home/shopping.php"><span class="media_text">Shopping</span></a></li>
                <li class="list"><a href="../home/about.php"><span class="media_text">About</span></a></li>
                <li class="list"><a href="../home/contact.php"><span class="media_text">Contact</span></a></li>
            </ul>
        </div>
    </div>

    <div class="page_wrapper">
        <div class="form_wrapper">
            <div class="top_third">
            </div>
        </div>


        <div class="" id="">
		<?php 
                if (isset($_SESSION["active"]) && $_SESSION["active"] === true) {
				$cardname = '';
				$cardnum = '';
				$validto = '';
				$cvc = '';


				if(isset($_POST['cardname'])){
				$cardname = $_POST['cardname'];
				$cardnum = $_POST['cardnum'];
				$validto = $_POST['validto'];
				$cvc = $_POST['cvc'];
				$_SESSION['cardname'] = $_POST['cardname'];
				$_SESSION['cardnum'] = $_POST['cardnum'];
				$_SESSION['validto'] = $_POST['validto'];
				$_SESSION['cvc'] = $_POST['cvc'];

				$cardnum = intval($cardnum);
				$cvc = intval($cvc);

				$sql = "INSERT INTO `creditcard` (`CreditCard`, `ccName`, `expDate`, `cvc`) VALUES ($cardnum, '$cardname', '$validto', $cvc);";
				$update = "UPDATE `users` SET `CreditCard` = $cardnum WHERE `users`.`UserID` = $_SESSION[id];";

				$update_init = mysqli_stmt_init($conn);
				$sql_init = mysqli_stmt_init($conn);
				mysqli_stmt_prepare($sql_init, $sql);
				mysqli_stmt_prepare($update_init, $update);
				mysqli_stmt_execute($sql_init);
				mysqli_stmt_execute($update_init);

				$cardname = SHA1($_POST['cardname']);
				$cardnum = SHA1($_POST['cardnum']);
				$cvc = SHA1($_POST['cvc']);

				header("Location: ../checkout/shipping.php?cn=$cardname&cnn=$cardnum&vt=$validto&cvc=$cvc");

				}
				}else{echo "<h3>Please Login</h3>";}

				?>

            <ul class='item_list' id='cart_form'>
			<form action="checkout.php" method="POST">
                <li><div class='sub_heading' style='font-size:38px'>Billing Details</div></li>
                <li class="pname_title"><b>Cardholder's Name</b></li>
                <li><input name="cardname" type="text" placeholder="" id="fname" required></input><br></li>
                <li class="pname_title"><b>Card Number</b></li>
                <li><input name="cardnum" id="emailaddr" type="text" maxlength="16" placeholder="xxxx xxxx xxxx xxxx" required></li>
                <li>
                    <div class="inner_form_section">
                        <div>
                            <b>Valid Through</b>
                            <input type="date" name="validto" id="emailaddr" required></input>
                        </div>

                        <div class="inner_form_section_sub">
                            <b>CVV / CVC</b>
                            <input type="text" name="cvc" placeholder="" id="postcode" maxlength="3" required></input>
                        </div>
                    </div>
                </li>
			<div class='button_wrapper'>
					<input type='submit' class='button' id='atc' value='Continue' style="width:30%; float:left">
					</input>
				</form>
			</div>
        </div>
		<?php 
                if (isset($_SESSION["active"]) && $_SESSION["active"] === true) {
				$hasItems = 1;
				if(isset($_SESSION['item_in_cart_count']) && isset($_SESSION['cart_total'])){
				$count = $_SESSION['item_in_cart_count'];
				$total = $_SESSION['cart_total'];
				}else{header('Location: ../nav/cart.php');}

				echo "
				<ul class='item_list' id='cart_total'>
                <ul class='item_list' id='cart_total' style:'max-height: fit-content;'>
                    <li><div class='sub_heading' style='font-size:38px'>Review Cart</div></li>
                    <li id='item_total'><b>Total Number of Items: $count</b></li>
                    "; 

                    $sqld = "SELECT * FROM `carts` WHERE UserID = $_SESSION[id];";
                    $resultd = mysqli_query($conn, $sqld);
                    if($resultd){while($rowi = mysqli_fetch_array($resultd)){
                        $sqli = "SELECT * FROM `products` WHERE ProductID = $rowi[ProductID];";
                        $ss = $conn->query($sqli);
                        $pro = $ss->fetch_assoc();

                        echo "
                            <li><div class='list_of_items'>$pro[pName]</br>                     
                        ";

					}}
						if($hasItems == 0){
							echo "
						</div>
						</li>
						<li id='total'><b></b></li>
						</ul>
						";
						}else{
							echo "
						</div>
						</li>
						<li id='total'><b>Estimated Total: $$total</b></li>
						<br/>
							<li><img src='../images/visa.png' height=180px width=auto/></li>
						</ul>
						
					</div>";

						}
						}else{header("Location: ../nav/login.php");}
						?>

    </div>
</body>
</html>
