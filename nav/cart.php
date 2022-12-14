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
<?php 
require_once "../db/dbconn.inc.php"; 

/*
session_start();
*/
?>
<body class="cart_body">
    <div class="top_third">
        <div id="mc" class="menu_container">
            <h1 class="menu_title_s"><a href="../home/index.php">SENIOR</a></h1>
        </div>
        <div class="nav" id="nav_bottom">
            <div class="nav_list">
                <img src="../images/watchlist.png"/>
                <a class="nav_links" href="../nav/wishlist.php">Wishlist<?php echo " (" . $_SESSION["wishcount"] . ")"?></a>
                <img src="../images/cart.png"/>
                <a class="nav_links" ><div style="text-decoration:underline; color:#222;">My Cart</div></a>
                <img src="../images/checkout.png"/>
                <a class="nav_links" href="../nav/checkout.php">Checkout</a>
                <img src='../images/login.png'/>                
                <?php 
                if(isset($_SESSION["active"]) && $_SESSION["active"] === true){
                    echo "<a class = 'nav_links' href='../home/logout.php'>Logout</a>";
                }else{
                    echo 
                    "<a class = 'nav_links' href='../nav/login.php'>Login</a>
                    ";
                }
                ?>
            </div>
        </div>
        <div class="nav" id="nav_top">
            <ul class="main_menu">
                <li class="list"><a href="../home/index.php"><span class="media_text">Home</span></a></li>
                <li class="list"><a href="../community/community-landing.php"><span class="media_text">Community Marketplace</span></a></li>
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
        <div class="home_body" id="news">
                <?php 
                $count = 0;
                $total = 0;
				$hasItems = 0;

                echo "
            <ul class='item_list' id='cart_form'>
                    <li><div class='sub_heading' style='font-size:38px'>My Cart</div></li>";
                    if(isset($_SESSION["active"]) && $_SESSION["active"]){
                    $sql = "SELECT * FROM `carts` WHERE `UserID` = $_SESSION[id];";
                    if ($result = mysqli_query($conn, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
							$hasItems = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                $new_sql = "SELECT * FROM `products` WHERE ProductID = $row[ProductID];";
                                $s = $conn->query($new_sql);
                                $cart = $s->fetch_assoc();
                                if($cart["onSale"] == 1){
                                    $iprice = $cart["salePrice"];

                                }else{
                                    $iprice = $cart["Price"];
                                }

								if(isset($_GET['action']) && $_GET['action'] == 'del'){
									$id_to_remove = $_GET['id'];
									$removes = "DELETE FROM `carts` WHERE ProductID = $id_to_remove";
									$updates = "UPDATE `products` SET `stockAmt` = (stockAmt + 1) WHERE `products`.`ProductID` = $id_to_remove;";
									$prep = mysqli_stmt_init($conn);
									$upda = mysqli_stmt_init($conn);
									mysqli_stmt_prepare($prep, $removes);
									mysqli_stmt_prepare($upda, $updates);
									mysqli_stmt_execute($upda);
									mysqli_stmt_execute($prep);
									header("location: cart.php");

								}
                                echo "<li class=list><div class=item_list_wrapper id=cart_item_list>"; 
                                echo "<div class=top-right>
                                <form method='POST' action='cart.php?action=del&id=$row[ProductID]'>
                                <input type=submit class=button id=atc value='X'>
                                </input>
                                </form>
                                </div>";
                                echo "<div class=><img id=img_cart src=../images/$cart[imgSrc] />
                                
                                <div class=desc>$cart[Description]</div>
                                
                                </div>";
                                echo "<h3 class=item_list_title>$cart[pName]</h3>";
                                echo "<div>
                                <h3 id=cart_price>$$iprice</h3>
                                </div>";
                                echo "</div>";
                                echo "</li>";


                                $count = $count + 1;
								$_SESSION['item_in_cart_count'] = $count;
                                $total = $total + floatval($iprice);
								$_SESSION['cart_total'] = $total;

                            }
						}else{
								echo "<p>Cart is empty.</p>";
								$hasItems = 0;
						}
                    }
                } 
                                    
                                    
	if(isset($_SESSION["active"]) && $_SESSION["active"]){
		echo "
            </div>        
                <ul class='item_list' id='cart_total'>
                    <li><div class='sub_heading' style='font-size:38px'>Cart Totals</div></li>
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
						<li id='estimate'>NOTE: This is not the final total, this is an estimate.</li>
						<br/>
						<li><a href='../nav/checkout.php'><div class='button' id='checkout'>CHECKOUT</div></li>
						</ul>
						";
						}
					}else{echo "Please Login";}
                ?>
        </div>
    </div>
</body>
</html>
