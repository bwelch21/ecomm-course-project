<?php

function clean_data ($data) {
	 // clean user inputs to prevent sql injections
 	$data = trim($data);
	$data = strip_tags($data);
 	$data = htmlspecialchars($data);
 	return $data;
}

define('DBHOST', '127.0.0.1');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'hoos_cooking');

// Create connection
$conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
$res = "";
// Check connection
if(!$conn) {
	die("Connection failed : " . $conn->connect_error);
}

// Define variables
$dish_name = $price = $product_description = "";

// Define error messages
$error = False;
$dish_name_error = $price_error = $product_description_error = $type_id_error = "";

// Check if form was submitted
if(isset($_POST["submit"])) {

	// Clean dish name
	if(empty($_POST["dish_name"])) {
		$dish_name_error = "Please enter a valid name for your dish";
		$error = True;
	} else {
		$dish_name = clean_data($_POST["dish_name"]);
	}

	// Clean price
	if(empty($_POST["price"]) && $_POST["price"] < 0) {
		$price_error = "Please enter a valid price for your dish";
		$error = True;
	} else {
		$price = clean_data($_POST["price"]);
	}

	// Clean product description
	if(empty(($_POST["product_description"]))) {
		$product_description_error = "Please enter a valid description for your product";
		$error = True;
	} else {
		$product_description = clean_data($_POST["product_description"]);
	}

	if(!$error) {
		$query = "INSERT INTO food_item(available,dish_name,price,product_description,seller_id,type_id) VALUES('1','$dish_name','$price','$product_description','1','1')";
		$res = mysqli_query($conn, $query);
	}

	if($res) {
		echo "this should have worked";
	} else {

		echo "ERROR";
	}

}



?>

<html>
<head>
	<!-- Basic Page Needs ================================================== -->
  	<meta charset="utf-8">
  	<title>Sign Up for Hoos Cooking</title>
  	<meta name="description" content="">
  	<meta name="author" content="">

  	<!-- Mobile Specific Metas ================================================== -->
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  	<!-- CSS ================================================== -->
  	<link rel="stylesheet" href="stylesheets/base.css">
  	<link rel="stylesheet" href="stylesheets/skeleton.css">
  	<link rel="stylesheet" href="stylesheets/layout.css">
	<link rel="stylesheet" href="stylesheets/flexslider.css">
	<link rel="stylesheet" href="stylesheets/prettyPhoto.css">
	<link rel="stylesheet" href="stylesheets/form.css">
	
	<!-- CSS ================================================== -->
  	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<script src="js/jquery.flexslider-min.js"></script>
	<script src="js/scripts.js"></script>

  	<!-- Favicons ================================================== -->
	<link rel="shortcut icon" href="images/hat_icon.png">
  
  <style>
  	.error {color: #FF0000;}
  </style>

</head>

<body>

	<?php include("header.html"); ?>

	<h1>Make a listing!</h1><br>

	<div class="listing-form">
		<form method="post" action="create_item.php" id="listing-form" class="form-style-6">

			<div class="control-group">
				<span class="error">* <?php echo $dish_name_error; ?></span>
				<input type="text" value="" placeholder="Product name" name="dish_name" value="">
			</div>

			<div class="control-group">
				<span class="error">* <?php echo $product_description_error; ?>
				</span>
				<textarea cols="50" rows="3" maxlength="150" placeholder="Enter a description of your dish" name="product_description" form="listing-form" value=""></textarea>
			</div>

			<div class="control-group">
				<span class="error">* <?php echo $price_error; ?>
				</span>
				$ <input type="number" min="0.01" max="10000.00" value="1" step="0.01" placeholder="Product price" name="price">
			</div>

			<input id="button" type="submit" name="submit" value="Create listing">

		</form>
	</div>

	<?php include("footer.html"); ?>

</body>
</html>