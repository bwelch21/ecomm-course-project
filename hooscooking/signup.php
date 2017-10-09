<?php

function clean_data ($data) {
	 // clean user inputs to prevent sql injections
 	$data = trim($data);
	$data = strip_tags($data);
 	$data = htmlspecialchars($data);
 	return $data;
}	
 // this will avoid mysql_connect() deprecation error.
 error_reporting( ~E_DEPRECATED & ~E_NOTICE );
 // but I strongly suggest you to use PDO or MySQLi.
 
 define('DBHOST', '127.0.0.1');
 define('DBUSER', 'root');
 define('DBPASS', '');
 define('DBNAME', 'hooscooking');
 
 $conn = mysqli_connect(DBHOST,DBUSER,DBPASS);
 $dbcon = mysqli_select_db($conn ,DBNAME);
 
 if ( !$conn ) {
  die("Connection failed : " . mysql_error());
 }
 
 if ( !$dbcon ) {
  die("Database Connection failed : " . mysql_error());
 }

 // setting the error codes to default values
 $error = false;
 $firstNameErr = $lastNameErr = $usernameErr = $emailErr = $passErr = "";
 $cityErr = $stateErr = $streetErr = $zipErr = "";

 if ( isset($_POST['submit']) ) {
  
  	// clean first name ------------------------------------------------
	if (empty($_POST["first_name"])) {
	 	$firstNameErr = "Please enter your first name";
	 	$error = true;
	} else if (!preg_match("[[:alpha:]]",$_POST["first_name"])) {
		$firstNameErr = "First name must contain only letters.";
		$error = true; 
	} else {
		$firstName = clean_data($_Post["first_name"]);
	}

	
	//clean last name ---------------------------------------------------
	if (empty($_POST["last_name"])) {
	 	$lastNameErr = "Please enter your last name";
	 	$error = true;
	} else if (!preg_match("[[:alpha:]]",$_POST["last_name"])) {
		$lastNameErr = "Last name must contain only letters.";
		$error = true; 
	} else {
		$lastName = clean_data($_Post["last_name"]);
	}  

 	
 	//clean user name -------------------------------------------------
 	if (empty($_POST["username"])) {
	 	$usernameErr = "Please enter a username";
	 	$error = true;
	} else if (!preg_match("[[:alnum:]]",$_POST["username"])) {
		$usernameErr = "Username must contain only letters and numers.";
		$error = true; 
	} else {
		$username = clean_data($_Post["username"]);
	}
 	

 	//clean email -------------------------------------------------------
	if (empty($_POST["email"])) {
	       $emailErr = "Please enter an email address";
	       $error = true;
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$emailErr = "Invalid email format"; 
		$error = true;
	} else {
		$email = clean_data($_Post["email"]);
	}

	//clean password -------------------------------------------------
	 if (empty($_POST["pass"])) {
	 	$passErr = "Please enter a password";
	 	$error = true;
	} else if ((strcmp($pass, $pass_confirm) !== 0)) {
		$passErr = "The passwords you entered do not match";
		$error = true; 
	} else {
		$pass = clean_data($_Post["pass"]);
	}


	//clean street address ----------------------------------------  
  	if (empty($_POST["street_address"])) {
	 	$streetErr = "Please enter a username";
	 	$error = true;
	} else if (!preg_match("[[:alnum:]](\s[[:alnum:]])*",$_POST["street_address"])) {
		$streetErr = "Username must contain only letters and numers.";
		$error = true; 
	} else {
		$street_address = clean_data($_Post["street_address"]);
	}
	
	//clean city --------------------------------------------------------------  
  	if (empty($_POST["city"])) {
	 	$cityErr = "Please enter a city";
	 	$error = true;
	} else if (!preg_match("[[:alpha:]]",$_POST["city"])) {
		$cityErr = "City name must contain only letters";
		$error = true; 
	} else {
		$city = clean_data($_Post["city"]);
	}


	//clean state ----------------------------------------------------------
	if (empty($_POST["state"])) {
	 	$stateErr = "Please enter a state";
	 	$error = true;
	} else if (!preg_match("[[:alpha:]]",$_POST["state"])) {
		$stateErr = "State name must contain only letters";
		$error = true; 
	} else {
		$state = clean_data($_Post["state"]);
	}

  	
  	//clean zip -------------------------------------------------------------
 	if (empty($_POST["zip"])) {
	 	$zipErr = "Please enter a valid zip code";
	 	$error = true;
	} else if (!preg_match("^[0-9]{2}$]]",$_POST["state"])) {
		$zipErr = "Zip code must be 5 digits long and only contain the characters 0-9";
		$error = true; 
	} else {
		$zip = clean_data($_Post["zip"]);
	}
  
  

   
  // if there's no error, continue to signup
  if( !$error ) {

   // password encrypt using SHA256();
   $password = hash('sha256', $pass);
   
   $query = "INSERT INTO user(firstname,lastname,email,address,city,state,zipcode,password) VALUES('$first_name','$last_name','$email','$street_address','$city','$state', '$zip_code','$password')";
   $res = mysqli_query($conn,$query);
   
   if ($res) {
	$errTyp = "success";
	$errMSG = "Successfully registered, you may login now";
	unset($first_name);
	unset($last_name);
	unset($username);
	unset($street_address);
	unset($city);
	unset($state);
	unset($zipcode);
	unset($email);
	unset($pass);
   } else {
	$errTyp = "danger";
	$errMSG = "Something went wrong, try again later..."; 
   } 
	
  }

  
  
 }
	}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  
  
  
	  <link rel="stylesheet" href="css/style.css">
	  <style>
		* {
box-sizing: border-box;
}

*:focus {
	outline: none;
}
body {
font-family: Arial;
background-color: #3498DB;
padding: 50px;
}
.login {
margin: 5px auto;
width: 300px;
}
.login-screen {
background-color: #FFF;
padding: 20px;
border-radius: 5px
}

.app-title {
text-align: center;
color: #777;
}

.login-form {
text-align: center;
}
.control-group {
margin-bottom: 10px;
}

input {
text-align: center;
background-color: #ECF0F1;
border: 2px solid transparent;
border-radius: 3px;
font-size: 16px;
font-weight: 200;
padding: 10px 0;
width: 250px;
transition: border .5s;
}

input:focus {
border: 2px solid #3498DB;
box-shadow: none;
}

.btn {
  border: 2px solid transparent;
  background: #F5F5F5;
  color: #000000;
  font-size: 16px;
  line-height: 25px;
  padding: 10px 0;
  text-decoration: none;
  text-shadow: none
  border-radius: 3px;
  box-shadow: none;
  transition: 0.25s;
  display: block;
  width: 200px;
  margin: 0 auto;


}

.btn:hover {
  background-color: #2980B9;
}

.login-link {
  font-size: 12px;
  color: #444;
  display: block;
	margin-top: 12px;
}
	  </style>
  

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>About Us |  by OD</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- CSS
  ================================================== -->
  <link rel="stylesheet" href="stylesheets/base.css">
  <link rel="stylesheet" href="stylesheets/skeleton.css">
  <link rel="stylesheet" href="stylesheets/layout.css">
	<link rel="stylesheet" href="stylesheets/flexslider.css">
	<link rel="stylesheet" href="stylesheets/prettyPhoto.css">
	
	<!-- CSS
  ================================================== -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<script src="js/jquery.flexslider-min.js"></script>
	<script src="js/scripts.js"></script>

  <!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <!-- Favicons
  ================================================== -->
  <link rel="shortcut icon" href="images/favicon.ico">
  <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
  <style>
         .error {color: #FF0000;}
  </style>

</head>







<body>
<header id="header" class="site-header" role="banner">
	<div id="header-inner" class="container sixteen columns over">
	<hgroup class="one-third column alpha">
	<h1 id="site-title" class="site-title">
	<a href="index.html" id="logo"><img src="images/logo2.png" alt="Icebrrrg logo" height="57" width="193" /></a>
	</h1>
	</hgroup>
	<nav id="main-nav" class="two thirds column omega">
	<ul id="main-nav-menu" class="nav-menu">
	<li id="menu-item-1" >
	<a href="index.html">Home</a>
	</li>
	<li id="menu-item-2">
	<a href="about-us.html">About us</a>
	</li>
	<li id="menu-item-3" class="current">
	<a href="login.html">Login</a> / <a href="signup.html">Sign Up</a>
	</li>
	</ul>
	</nav>
	</div>
	</header>

  <body>

	<div class="login">
		<div class="login-screen">
			
				<h1>Create an Account</h1>
		   

			<div class="login-form">
			<form method="post" action="signup.php" autocomplete="off">
				 
				<div class="control-group">
				<span class = "error">* <?php echo $firstNameErr;?></span
				<input type="text" class="login-field" value="" placeholder="first name" name="first_name" id="first_name">
				</div>
				
				<div class="control-group">
				<span class = "error">* <?php echo $lastNameErr;?></span
				<input type="text" class="login-field" value="" placeholder="last name" name="last_name">
				</div>

				<div class="control-group">
				<span class = "error">* <?php echo $usernameErr;?></span
				<input type="text" class="login-field" value="" placeholder="username" name="username">
				</div>

				<div class="control-group">
				<span class = "error">* <?php echo $emailErr;?></span
				<input type="text" class="login-field" value="" placeholder="email address" name="email">
				</div>

				<div class="control-group">
				<span class = "error">* <?php echo $passErr;?></span
				<input type="password" class="login-field" value="" placeholder="password" name="pass">
				</div>

				<div class="control-group">
				<input type="password" class="login-field" value="" placeholder="confirm password" name="pass_confirm">
				</div>
				
				<div class="control-group">
				<span class = "error">* <?php echo $streetErr;?></span
				<input type="text" class="login-field" value="" placeholder="street address" name="street_address">
				</div>
				
				<div class="control-group">
				<span class = "error">* <?php echo $cityErr;?></span
				<input type="text" class="login-field" value="" placeholder="city" name="city">
				</div>

				<div class="control-group">
				<span class = "error">* <?php echo $stateErr;?></span
				<input type="text" class="login-field" value="" placeholder="state" name="state">
				</div>

				<div class="control-group">
				<span class = "error">* <?php echo $zipErr;?></span
				<input type="text" class="login-field" value="" placeholder="zip code" name="zip_code">
				</div>

		  <input id="button" type="submit" name="submit" value="Sign-Up">

				<br><br><br>
			 </form>
			</div>
		</div>
	</div>



<footer>

<div class="footer sixteen columns over">

<div class="social footer-columns ">
<h3 align="middle" > Hoos Cooking, a community marketplace for homecooked meals.</h3>



</div>

</div>

<div id="footer-base">
<div class="container">
<div class="eight columns">
<a href="http://www.opendesigns.org/design/icebrrrg/">Icebrrg Website Template</a> &copy; 2012
</div>

<div class="eight columns far-edge">
Design by <a href="http://www.opendesigns.org">OD</a>
</div>
</div>
</div>

</footer>

</body>
  
  
</body>
</html>
