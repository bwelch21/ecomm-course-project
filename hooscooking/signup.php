<?php include("dbconnect.php"); ?>

<?php

function clean_data ($data) {
	 // clean user inputs to prevent sql injections
 	$data = trim($data);
	$data = strip_tags($data);
 	$data = htmlspecialchars($data);
 	return $data;
}	

 // setting the error codes to default values
 $error = false;
 $firstNameErr = $lastNameErr = $emailErr = $passErr = "";
 $cityErr = $stateErr = $streetErr = $zipErr = "";
 
 

 if ( isset($_POST['submit']) ) {
  
  	// clean first name ------------------------------------------------
	if (empty($_POST["first_name"])) {
	 	$firstNameErr = "Please enter your first name";
	 	$error = true;
	} else if (!preg_match("/(^[a-zA-Z]+$)/",$_POST["first_name"])) {
		$firstNameErr = "First name must contain only letters.";
		$error = true; 
	} else {
		$first_name = clean_data($_POST["first_name"]);
		
	}

	
	//clean last name ---------------------------------------------------
	if (empty($_POST["last_name"])) {
	 	$lastNameErr = "Please enter your last name";
	 	$error = true;
	} else if (!preg_match("/(^[a-zA-Z]+$)/",$_POST["last_name"])) {
		$lastNameErr = "Last name must contain only letters.";
		$error = true; 
	} else {
		$last_name = clean_data($_POST["last_name"]);
	}  
	

 	//clean email -------------------------------------------------------
	if (empty($_POST["email"])) {
	       $emailErr = "Please enter an email address";
	       $error = true;
	} else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		$emailErr = "Invalid email format"; 
		$error = true;
	} else {
		$email = clean_data($_POST["email"]);
			$my_sql_query = mysqli_query($conn,"SELECT email FROM user WHERE email='$email'");
	if (mysqli_num_rows($my_sql_query)!=0){
		$emailErr = "An account with this email address already exists, please login or enter a different email";
		$error = true;
	}
	}


	//clean password -------------------------------------------------
	//$pass_confirm = clean_data($_Post['pass_confirm']);
	 if (empty($_POST["pass"])) {
	 	$passErr = "Please enter a password";
	 	$error = true;
	} else if ((strcmp($_POST["pass"], $_POST["pass_confirm"]) !== 0)) {
		$passErr = "The passwords you entered do not match";
		$error = true; 
	} else {
		$pass = clean_data($_POST["pass"]);
	}
 
	

	//clean street address ----------------------------------------  
  	if (empty($_POST["street_address"])) {
	 	$streetErr = "Please enter your street address";
	 	$error = true;
	} else if (!preg_match_all("/^[A-Za-z0-9\s\-\.\,]+$/",$_POST["street_address"])) {
		$streetErr = "Street address must contain only letters and numbers and a period";
		$error = true; 
	} else {
		$street_address = clean_data($_POST["street_address"]);
	}
	
	//clean city --------------------------------------------------------------  
  	if (empty($_POST["city"])) {
	 	$cityErr = "Please enter a city";
	 	$error = true;
	} else if (!preg_match("/(^[a-zA-Z]+$)/",$_POST["city"])) {
		$cityErr = "City name must contain only letters";
		$error = true; 
	} else {
		$city = clean_data($_POST["city"]);
	}


	//clean state ----------------------------------------------------------
	if (empty($_POST["state"])) {
	 	$stateErr = "Please enter a state";
	 	$error = true;
	} else if (!preg_match("/(^[a-zA-Z]+$)/",$_POST["state"])) {
		$stateErr = "State name must contain only letters";
		$error = true; 
	} else {
		$state = clean_data($_POST["state"]);
	}

  	
  	//clean zip -------------------------------------------------------------
 	if (empty($_POST["zip_code"])) {
	 	$zipErr = "Please enter a valid zip code";
	 	$error = true;
	} else if (!preg_match("/^[0-9]{5}$/",$_POST["zip_code"])) {
		$zipErr = "Zip code must be 5 digits long and only contain the characters 0-9";
		$error = true; 
	} else {
		$zip_code = clean_data($_POST["zip_code"]);
	}
  
  

  // $error = false; 
  // if there's no error, continue to signup
  if( !$error ) {
	
   // password encrypt using SHA256();
   $password = hash('sha256', $pass);
   //$password = $pass;
   $query = "INSERT INTO user(firstname,lastname,email,address,city,state,zipcode,password) VALUES('$first_name','$last_name','$email','$street_address','$city','$state', '$zip_code','$password')";
   $res = mysqli_query($conn,$query);
   
   if ($res) {
	$errTyp = "success";
	$errMSG = "Successfully registered, you may login now";

	
	ini_set('SMTP', "server.com");
ini_set('smtp_port', "25");
ini_set('sendmail_from', "pineapplepunch1@gmail.com");
	
	
	
	$subject = 'Website Enquiry';

// Your email address. This is where the form information will be sent.
$emailadd = $email;
// Where to redirect after form is processed.
$url = 'login.php';

// Makes all fields required. If set to '1' no field can not be empty. If set to '0' any or all fields can be empty.
$req = '0';
	
	
	
	// Subject of confirmation email.
$conf_subject = 'Your recent enquiry';

// Who should the confirmation email be from?
$conf_sender = 'Summer Thompson <pineapplepunch1@gmail.com>';

$msg = $_POST['first_name'] . ",\n\nThank you for your recent enquiry. A member of our 
team will respond to your message as soon as possible.";

mail( $_POST['Email'], $conf_subject, $msg, 'From: ' . $conf_sender );
	
	
		unset($first_name);
	unset($last_name);
	
	unset($street_address);
	unset($city);
	unset($state);
	unset($zipcode);
	unset($email);
	unset($pass);
   	
   	header("Location: http://localhost:8080/ecomm-course-project/hooscooking/registration_successful.php");
   	exit;


   } else {
	$errTyp = "danger";
	$errMSG = "Something went wrong, try again later..."; 
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
width: 500px;
}
.login-screen {
background-color: #Fff;
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

.login-field {
width: 210px;
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

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
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
  <title>Sign Up for Hoos Cooking</title>
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
	<link rel="shortcut icon" href="images/hat_icon.png">
  <style>
         .error {color: #FF0000;}
  </style>

</head>







<body>

<?php include("header.html"); ?>

  <body>

  	<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
  </div>

</div>

	<div class="login">
		<div class="login-screen">
			<center>
				<h1>Create an Account</h1>
		   

			<div class="login-form">
			<form method="post" action="signup.php" autocomplete="off">
				 <center>
				<div class="control-group">
				<label>First Name</label>
				<span class = "error"> <?php echo $firstNameErr;?></span>
				<input type="text" class="login-field" value="" placeholder="first name" name="first_name" id="first_name">
				</div>
				
				<div class="control-group">
				<label>Last Name</label>
				<span class = "error"> <?php echo $lastNameErr;?></span>			
				<input type="text" class="login-field" value="" placeholder="last name" name="last_name">
				</div>

		
		

				<div class="control-group">
				<label>Email Address</label>
				<span class = "error"> <?php echo $emailErr;?></span>		
				<input type="text" class="login-field" value="" placeholder="email address" name="email">
				</div>

				<div class="control-group">
				<label>Password</label>
				<span class = "error"> <?php echo $passErr;?></span>
				<input type="password" class="login-field" value="" placeholder="password" name="pass">
				</div>

				<div class="control-group">
				<label>Confirm Password</label>
				<input type="password" class="login-field" value="" placeholder="confirm password" name="pass_confirm">
				</div>
				
				<div class="control-group">
				<label>Street Address</label>
				<span class = "error"> <?php echo $streetErr;?></span>				
				<input type="text" class="login-field" value="" placeholder="street address" name="street_address">
				</div>
				
				<div class="control-group">
				<label>City</label>
				<span class = "error"> <?php echo $cityErr;?></span>
				<input type="text" class="login-field" value="" placeholder="city" name="city">
				</div>

				<div class="control-group">
				<label>State</label>
				<span class = "error"> <?php echo $stateErr;?></span>
				<select  class="login-field" value=""  name="state">
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>			
		
				</div>

				<div class="control-group">
				<label>Zip Code</label>
				<span class = "error"> <?php echo $zipErr;?></span>
				<input type="text" class="login-field" value="" placeholder="zip code" name="zip_code">
				</div>

		  		<input id="button" type="submit" name="submit" value="Sign-Up">

				<br><br><br>
			 </form>
			</div>
		</div>
	</div>



<?php include("footer.html"); ?>

</body>
  
  
</body>
</html>
