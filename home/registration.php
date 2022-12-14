<!DOCTYPE html>
<html lang="en">
<head>
<title>Home</title>
<meta charset="UTF-8" />
<meta name="author" content="TUJ_Rohan" />
<link rel="stylesheet" href="../styles/style.css" />
<link rel="stylesheet" href="../styles/footer.css" />
<link rel="icon" href="../images/favicon.png">
<script src="../scripts/script.js" defer></script>
<script src="../scripts/password.js" defer></script>
</head>



<body>
    <?php /*session_start();*/
    require_once "../db/dbconn.inc.php";
    
    
    ?>
    <div class="top_third">
        <div id="mc" class="menu_container">
			<h1 class="menu_title_s"><a href="../index.php">SENIOR</a></h1>
        </div>
        <div class="nav" id="nav_bottom">
            <div class="nav_list">
                <img src="../images/watchlist.png"/>
                <a class="nav_links" href="../nav/wishlist.php">Wishlist</a>
                <img src="../images/cart.png"/>
                <?php
                if (isset($_SESSION["active"]) && $_SESSION["active"] === true) {
                    echo "
                        <a class='nav_links' href='../nav/cart.php'>My Cart</a>
                    ";
                } else {

                    echo "
                        <a class='nav_links' href='../home/error.php?msg=please%20login%20to%20view%20cart'>My Cart</a>
                    ";
                } ?>
                <img src="../images/checkout.png"/>
                <?php
                if (isset($_SESSION["active"]) && $_SESSION["active"] === true) {
                    echo "
                        <a class='nav_links' href='../nav/checkout.php'>Checkout</a>
                    ";
                }else{

                    echo "
                        <a class='nav_links' href='error.php?msg=please%20login%20to%20checkout'>Checkout</a>
                    ";
                } ?>
                <img src="../images/login.png"/>
                <a class="nav_links" href="../nav/login.php">Login</a>
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

<?php 
	if(isset($_POST['username'])){

		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$emailaddress = $_POST['emailaddress'];
		$streetaddress = $_POST['streetaddress'];
		$postcode = $_POST['postcode'];
		$dob = $_POST['dob'];
		$passconfirm = $_POST['pass-confirm'];

		$newpass = SHA1($username.$password);

		$sql = "INSERT INTO `users` (`UserID`, `FirstName`, `LastName`, `DOB`, `Email`, `Address`, `CreditCard`, `Username`, `Password`, `sessionID`, `postcode`, `sellerID`) VALUES (CONNECTION_ID(), '$firstname', '$lastname', '$dob', '$emailaddress', '$streetaddress', NULL, '$username', '$newpass', NULL, '$postcode', NULL);";
		$statement = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($statement, $sql);
		if(mysqli_stmt_execute($statement)){
				echo "<h1>Account Created</h1>";
				echo "<h2>Redirecting to Login</h2>";
				header( "refresh:1;url=../nav/login.php" );
		}else{echo "<h2>Error</h2>";}

	}

?>
    <div class="page_wrapper">
        <div class="form_wrapper">
            <form action="../home/registration.php" method="POST">
                <ul class="item_list" id="login_form">
                    <li><div class="sub_heading" style="font-size:38px">Create an Account!</div></li>
                    <li><div class="inner_form_section">
                        <div>
                            <b>First Name</b>
                            <input name='firstname' type="text" placeholder="" id="fname" required></input>
                        </div>

                        <div>
                            <b>Last Name</b>
                            <input name='lastname' type="text" placeholder="" id="lname" required></input>
                        </div>


                    </div></li>


                    <li class="pname_title"><b>Username</b></li>
                    <li><div class="desc"><i>Create a unique username to identify your account.</i></div></li>
                    <li><input name='username' type="text" placeholder="" id="uname" required></input></li>

                    <li class="pname_title"><b>Create a Password</b></li>
                    <li><div class="desc"><i>Create a strong password to secure your account: 8-16 characters of numbers, letters and symbols (@#$%^&)</i></div></li>
                    <li><div class="password_block">
                            <input name='password' type="password" placeholder="" id="pword" required></input>
                            <button type="button" id="show_password" onclick="ShowPassword()"><img src="../images/eye.png"></img></button>
                        </div></li>
                    <li class="pname_title"><b>Confirm Password</b></li>
                    <li><div class="desc" id="passblock"><b>Passwords Must Match!</b></div></li>
                    <li><div class="password_block">
                            <input name='pass-confirm' type="password" placeholder="" id="pmatch" value="" required></input>
                        </div></li>

                    <li class="pname_title"><b>E-mail Address</b></li>
                    <li><div class="desc"><i>This is the e-mail address we will use to stay in contact.</i></div></li>
                    <li><input name='emailaddress' type="email" placeholder="" id="emailaddr" required></input></li>

                    <li><div class="inner_form_section">

                    <div>
                        <b>Street Address</b>
                        <input name='streetaddress' type="text" placeholder="" id="streetaddr" required></input>
                    </div>

                    <div class="inner_form_section_sub">
                        <b>Postcode</b>
                        <input name='postcode' type="text" placeholder="" id="postcode" required></input>
                    </div>
                    </div></li>

                    <li class="pname_title"><b>Date of Birth</b></li>
                    <li><input name='dob' type="date" id="dob"></input></li>

                    <br/>

                    <li class="tcc"><input type="checkbox" id="tccheckbox" required><span id="checkbox_span">I accept the</span> <a href="index.php#about" id="tcclink">Terms & Conditions</a></input></li>
                    <br/>

                    <li><input type="submit" class="button" id="create_btn" value="CREATE"></input></li>
                </ul>
            </form>
        </div>
    </div>




</body>
</html>
