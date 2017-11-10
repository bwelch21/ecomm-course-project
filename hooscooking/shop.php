<?php include("dbconnect.php"); ?>

<!DOCTYPE html>
<html lang="en"> <!--<![endif]-->
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Shop</title>
  <meta name="description" content="">
  <meta name="author" content="">

</head>

<?php
 session_start();
 include("header.php"); ?>
<body class="wrap" style="margin-top: 150px;">



  <!-- Primary Page Layout
  ================================================== -->

  

	<div class="container">    
 
    <?php $query = "SELECT * FROM food_item";
          $res = mysqli_query($conn, $query);
    ?>

    <?php if(mysqli_num_rows($res) > 0) : ?>

      <?php while($record = mysqli_fetch_assoc($res)) {
          $dish_name = $record["dish_name"];
          $item_id = $record["item_id"];
          $product_description = $record["product_description"];
          $price = $record["price"];
          $posted = $record["posted"];
          $seller = $record["seller_firstname"] . " " . $record["seller_lastname"];
          $seller_firstname = $record["seller_firstname"];
          $seller_lastname = $record["seller_lastname"];
          $seller_id = $record["seller_id"];
      ?>
      
      <?php if($record[available] and $record[seller_id] != $_SESSION["login_id"]) : ?>
      <div class="col-sm-4">
        <div class="panel panel-primary">
          <div class="panel-heading"><h4><?php echo $dish_name; ?></h4><div align="right"><b><?php echo "$" . $price; ?></b></div></div>
          <div class="panel-body"><?php echo $product_description; ?><br><br><b>Posted at <?php echo $posted; ?> by <?php echo $seller; ?></b></div>
          <div class="panel-footer">
            <form action="process_payment.php" method="post" >
              <input type="hidden" name="dish_name" value="<?php echo $dish_name; ?>">
              <input type="hidden" name ="item_id" value="<?php echo $item_id; ?>">
              <input type="hidden" name="price" value="<?php echo $price; ?>">
              <input type="hidden" name="product_description" value="<?php echo $product_description; ?>">
              <input type="hidden" name="seller_firstname" value="<?php echo $seller_firstname; ?>">
              <input type="hidden" name="seller_lastname" value="<?php echo $seller_lastname; ?>">
              <input type="hidden" name="seller_id" value="<?php echo $seller_id; ?>">

              <input type="submit" name="submit" value="Buy">
            </form>
          </div>
          </div>
      </div>
      <?php endif ?>
        
      <?php } ?>
    <?php else : ?>
      Nothing to show...
    <?php endif ?>
</div>

<br><br>

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

