<?php

session_start();
if(!isset($_SESSION['login_user'])) {
  header("Location: login.php");
  exit;
}

include("dbconnect.php");

function clean_data ($data) {
   // clean user inputs to prevent sql injections
  $data = trim($data);
  $data = strip_tags($data);
  $data = htmlspecialchars($data);
  return $data;
}


// Define variables
$dish_name = $price = $product_description = "";
$seller_firstname = $_SESSION["login_firstname"];
$seller_lastname = $_SESSION["login_lastname"];
$seller_id = $_SESSION["login_id"];


// Define error messages
$error = False;
$dish_name_error = $price_error = $product_description_error = $type_id_error = $image_error = "";

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

  if(empty(($_POST["food_type"]))) {
    $type_err = "Please indicate the type of dish";
    $error = True;
  } else {
    $type = $_POST["food_type"];
  }


  if(!$error) {
    $query = "INSERT INTO food_item(available,dish_name,price,product_description,seller_firstname,seller_id,seller_lastname,type_id,food_type) VALUES('1','$dish_name','$price','$product_description','$seller_firstname','$seller_id','$seller_lastname','1','$type')";
    $res = mysqli_query($conn, $query);
  }

  if($res) {
  } else {
    echo "ERROR";
  }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sell Items</title>
</head>
<style>
.group:after {
  content: "";
  display: block;
  clear: both;
}

.landing-page {
  width: 882px;
  margin: 100px auto 0;  
}

.landing-page *,
.landing-page *:before,
.landing-page *:after {
  -webkit-box-sizing: border-box;
       -moz-box-sizing: border-box;
            box-sizing: border-box; 
}

.landing-page .module {
  border: 1px solid rgb(219, 219, 219);
  border-radius: 4px;
  float: left;
  padding: 2em;
  width: 48%;
}

.landing-page .module > *:last-child,
.landing-page .module > *:last-child > *:last-child,
.landing-page .module > *:last-child > *:last-child > *:last-child {
  margin: 0;
  padding: 0;
}

.landing-page .note { 
  background-color: rgb(236, 248, 236);
  border: 1px dashed; 
  border-radius: 4px; 
  color: rgb(115, 136, 96);
  font-family: georgia; 
  font-size: .9em;
  font-style: italic;
  margin: 20px auto;
  padding: 2em;
}

.form-appointment {
  padding: 2em;
  background-color: rgb(173,216,230);
  border-radius: 4px;
  border: 1px solid rgb(40,90,136);
  box-shadow: 2px 2px 4px 0px rgba(0, 0, 0, 0.1);
  font-family: 'PT Sans', Arial, sans-serif;
  margin: 20px auto;
}

.form-appointment input[type=text],
.form-appointment input[type=email],
.form-appointment input[type=tel],
.form-appointment textarea {  
  border: 1px solid rgb(40,90,136);
  border-radius: .2em;  
  font-family: 'PT Sans', Arial, sans-serif;
  font-size: 1.1em;
  padding: .4em 1em;
  margin: 0 0 .8em;
  width: 100%;
  box-shadow: 0 0 8px rgba(0,0,0,.08) inset;
}

.form-appointment input[type=text],
.form-appointment input[type=email],
.form-appointment input[type=tel],
.form-appointment input[type=submit],
.form-appointment textarea {  
  -webkit-transition: all .2s ease-in-out;
     -moz-transition: all .2s ease-in-out;
          transition: all .2s ease-in-out;
}

.form-appointment input[type=text]:active,
.form-appointment input[type=text]:focus,
.form-appointment input[type=email]:active,
.form-appointment input[type=email]:focus,
.form-appointment input[type=tel]:active,
.form-appointment input[type=tel]:focus,
.form-appointment textarea:active,
.form-appointment textarea:focus {  
  outline: 0;
  box-shadow: 0 0 6px rgb(40,90,136));
}

.form-appointment textarea {
  height: 160px;
}

.form-appointment input[type=submit] {
  background-color: rgb(40,90,136);
  border: 1px solid rgb(40,90,136);
  border-radius: 4px;
  color: rgb(255, 255, 255);
  cursor: pointer;
  font-family: inherit;
  font-size: 1.4em;
  padding: 10px 18px;
}

.form-appointment input[type=submit]:hover {
  background-color: white;
  color: rgb(40,90,136);
}

.form-appointment .wpcf7-list-item-label {
  color: rgb(0, 0 ,0);
}

span.wpcf7-list-item {
  display: block;
  margin-left: -.02em;
}

</style>
 
<body>
  <?php include("header.php");
    session_start();
   ?>

<div class="landing-page w3-padding-64">
  <h1 style="text-align: center;">Make a listing!</h1>
  <div class="form-appointment">
    <div class="wpcf7" id="wpcf7-f560-p590-o1">
      <form method="post" class="wpcf7-form" novalidate="novalidate" _lpchecked="1" enctype="multipart/form-data">
        <div style="display: none;">
          <input type="hidden" name="_wpcf7" value="560">
          <input type="hidden" name="_wpcf7_version" value="3.5">
          <input type="hidden" name="_wpcf7_locale" value="">
          <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f560-p590-o1">
          <input type="hidden" name="_wpnonce" value="dbb28877d5">
        </div>
      <div class="group">
        <div style="width: 48%; float: left;">
            <span class="error"> <?php echo $dish_name_error; ?></span>
              <input type="text" value="" size="45" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true" placeholder="Product name" name="dish_name">
            </span><br>
            <span class="error"> <?php echo $price_error; ?>
            <span class="wpcf7-form-control-wrap email-680">
              <input type="text"  value="" size="45" class="wpcf7-form-control wpcf7-text  " aria-required="true"  min="0.01" max="10000.00" value="" step="0.01" placeholder="Product price" name="price">
            </span><br>
            <span class="error"> <?php echo $product_description_error; ?>
            <span class="wpcf7-form-control-wrap textarea-398">
              <textarea cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" placeholder="Enter a description of your dish" name="product_description"></textarea>
            </span></div>
        <div style="width: 48%; float: right;">
          <h4>What kind of dish are you selling?</h4>
            <p>
              <span class="wpcf7-form-control-wrap radio-98">
                <span class="wpcf7-form-control wpcf7-radio">
                  <span class="wpcf7-list-item">
                    <label>
                      <input type="radio" name="food_type" value="Italian.jpg">&nbsp;
                      <span class="wpcf7-list-item-label">Italian</span>
                    </label>
                  </span>
                  <span class="wpcf7-list-item">
                    <label>
                      <input type="radio" name="food_type" value="Mexican.jpg">&nbsp;
                      <span class="wpcf7-list-item-label">Mexican</span>
                    </label>
                    <span class="wpcf7-list-item">
                    <label>
                      <input type="radio" name="food_type" value="American.png">&nbsp;
                      <span class="wpcf7-list-item-label">American</span>
                    </label>
                  </span><span class="wpcf7-list-item">
                    <label>
                      <input type="radio" name="food_type" value="Asian.jpg">&nbsp;
                      <span class="wpcf7-list-item-label">Asian</span>
                    </label>
                  </span><span class="wpcf7-list-item">
                    <label>
                      <input type="radio" name="food_type" value="Indian.png">&nbsp;
                      <span class="wpcf7-list-item-label">Indian</span>
                    </label>
                  </span><span class="wpcf7-list-item">
                    <label>
                      <input type="radio" name="food_type" value="African.jpeg">&nbsp;
                      <span class="wpcf7-list-item-label">African</span>
                    </label>
                  </span><span class="wpcf7-list-item">
                    <label>
                      <input type="radio" name="food_type" value="Spanish.jpg">&nbsp;
                      <span class="wpcf7-list-item-label">Spanish</span>
                    </label>
                  </span>
                  </span>
                </span>
              </span>
            </p>

</div>
</div>
<div style="text-align: center; padding-top: 2em; border-top: 1px solid rgb(153, 202, 129); margin-top: 1em;">
  <input type="submit" value="Create Listing" class="wpcf7-form-control wpcf7-submit" id="button" type="submit" name="submit">
</div>
  <div class="wpcf7-response-output wpcf7-display-none">
  </div>
</form>
</div>
</div>
</div>

</body>
</html>

<script type="text/javascript">
  $(document).ready(function () {
  $('input[type=submit]').click(function () {
    $('input[type=submit]').toggleClass('red');
  });
});
</script>