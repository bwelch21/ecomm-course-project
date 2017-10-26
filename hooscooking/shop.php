<?php

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

$query = "SELECT * FROM food_item";
$res = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Hoos Cooking Home</title>
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

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
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

</head>
<body class="wrap">



  <!-- Primary Page Layout
  ================================================== -->

  <?php include("header.html"); ?>

	<div class="container">    
 
    <?php if(mysqli_num_rows($res) > 0) : ?>

      <?php while($record = mysqli_fetch_assoc($res)) {
          $dish_name = $record["dish_name"];
          $product_description = $record["product_description"];
          $price = $record["price"];
          $image = $record["image"];
      ?>
    
      <div class="col-sm-4">
        <div class="panel panel-primary">
          <div class="panel-heading"><?php echo $dish_name . "... $" . $price; ?></div>
          <div class="panel-body"><?php echo '<img src="' . $image . '" style="width:100%">'; ?></div>
          <div class="panel-footer"><?php echo $product_description; ?>
            <form action="https://test.bitpay.com/checkout" method="post" >
            <input type="hidden" name="action" value="checkout" />
            <input type="hidden" name="posData" value="" />
            <input type="hidden" name="price" value="<?php echo $price; ?>" />
            <input type="hidden" name="data" value="QPbavyRKP7VXn5XCsEIphEI6dvCRgRkXNBhOkH9PiEN4ICTsetECbq8w2gFhW5LjfD9HeEN8x/2LDPIYdm1waQ93VjUSKOziJeTqrTVEv7s=" />
            <input type="image" src="https://test.bitpay.com/img/button-large.png" border="0" name="submit" alt="BitPay, the easy way to pay with bitcoins." >
</form>
          </div>
        </div>
      </div>
      <?php } ?>
    <?php else : ?>
      Nothing to show...
    <?php endif ?>
</div>

<br>

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



<!-- End Document
================================================== -->

<script src="js/jquery.prettyPhoto.js"></script>
</body>
</html>

