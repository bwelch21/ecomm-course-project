<?php include("dbconnect.php"); ?>

<!DOCTYPE html>
<html lang="en"> <!--<![endif]-->
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Ahop</title>
  <meta name="description" content="">
  <meta name="author" content="">

</head>

<?php include("header.html"); ?>
<body class="wrap">



  <!-- Primary Page Layout
  ================================================== -->

  

	<div class="container">    
 
    <?php $query = "SELECT * FROM food_item";
          $res = mysqli_query($conn, $query);
    ?>

    <?php if(mysqli_num_rows($res) > 0) : ?>

      <?php while($record = mysqli_fetch_assoc($res)) {
          $dish_name = $record["dish_name"];
          $product_description = $record["product_description"];
          $price = $record["price"];
          $posted = $record["posted"];
      ?>
    
      <div class="col-sm-4">
        <div class="panel panel-primary">
          <div class="panel-heading"><h4><?php echo $dish_name; ?></h4><div align="right"><b><?php echo "$" . $price; ?></b></div></div>
          <div class="panel-body"><?php echo $product_description; ?><br><br><b>Posted at <?php echo $posted; ?></b></div>
          <div class="panel-footer">
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


</body>
</html>

