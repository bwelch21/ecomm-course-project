<?php
include("dbconnect.php");
session_start();
if(!(isset($_SESSION['login_user'])))
{
    header("Location: index.php");
}

$error = False;


// Check if form was submitted


	$dish_name = $_POST["dish_name"];
	$item_id = $_POST["item_id"];
	$product_description = $_POST["product_description"];
	$price = $_POST["price"];
	$seller_firstname = $_POST["seller_firstname"];
	$seller_lastname = $_POST["seller_lastname"];
	$seller_id = $_POST["seller_id"];
	$seller = $_POST["seller_firstname"] . " " . $_POST["seller_lastname"];
	$buyer_firstname = $_SESSION["login_firstname"];
	$buyer_lastname = $_SESSION["login_lastname"];
	$buyer_id = $_SESSION["login_id"];


	

	if(!$error) {
		$query1 = "UPDATE food_item SET available='0' WHERE item_id='$item_id'";
		$res1 = mysqli_query($conn, $query1);
		$query2 = "INSERT INTO purchase(buyer_firstname,buyer_id,buyer_lastname,dish_name,item_id,price,seller_firstname,seller_id,seller_lastname) VALUES('$buyer_firstname','$buyer_id','$buyer_lastname','$dish_name','$item_id','$price','$seller_firstname','$seller_id','$seller_lastname')";
		$res2 = mysqli_query($conn, $query2);
	}

	if($res1 or $res2) {
	} else {

		echo "ERROR";
	}




?>
<!DOCTYPE html>
<?php include("header.php"); ?>
<head>
  <!-- Basic Page Needs
  	================================================== -->
  	<meta charset="utf-8">
  	<title>Shop</title>
  	<meta name="description" content="">
  	<meta name="author" content="">
  </head>
  <body class="wrap" style="margin-top: 150px;">
  	<h1>Are you sure you would like to buy this item?</h1>
      <div class="col-sm-4">
        <div class="panel panel-primary">
          <div class="panel-heading"><h4><?php echo $dish_name; ?></h4><div align="right"><b><?php echo "$" . $price; ?></b></div></div>
          <div class="panel-body"><?php echo $product_description; ?><br><br><b>Posted by <?php echo $seller; ?></b></div>
          <div class="panel-footer">
            <form action="https://test.bitpay.com/checkout" method="post" >
            <input type="hidden" name="action" value="checkout" />
            <input type="hidden" name="posData" value="" />
            <input type="hidden" name="price" value="<?php echo $price; ?>" />
            <input type="hidden" name="notify" value="true">
            <input type="hidden" name="redirectURL" value="http://localhost:8080/ecomm-course-project/hooscooking/transaction_successful.php" />
            <input type="hidden" name="data" value="QPbavyRKP7VXn5XCsEIphEI6dvCRgRkXNBhOkH9PiEN4ICTsetECbq8w2gFhW5LjfD9HeEN8x/2LDPIYdm1waQ93VjUSKOziJeTqrTVEv7s=" />
            <input type="image" src="https://test.bitpay.com/img/button-large.png" border="0" name="submit" alt="BitPay, the easy way to pay with bitcoins." >
</form>


  </body>
  </html>

