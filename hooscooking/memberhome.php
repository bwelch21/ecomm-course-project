<!DOCTYPE html>
<?php include("dbconnect.php"); 

session_start();
if(!(isset($_SESSION['login_user'])))
{
    header("Location: index.php");
}

$member_firstname = $_SESSION["login_firstname"];
$member_lastname = $_SESSION["login_lastname"];
$member_id = $_SESSION["login_id"];
?>
 
 <!-- Create a ‘Member Home Page’ that users can access either via successfully
signing up for your service, or through the ‘Login’ page if they have already
signed up and their data has been saved in your database already. The
content for this page is largely based on your specific business idea, but it
must display the main functionalities of your business. This Member
Home Page should be different from the home page that non-members can
view and should be inaccessible to non-members.
● An example of this would be: if you are providing people with a
cooking/recipe service, you could create a page with different tabs that link
to lists of recipes of different styles (e.g., Italian, Indian, holiday recipes).
You could also construct a recipe-of-the-week page, or include some fake
reviews from fake customers about how delicious a certain recipe was that
you shared through your service.
● Another example of this would be: recent transactions of  of customers,
customer information, ability to edit customer info, etc.--> 


<html lang="en"> 
<head>
  <meta charset="utf-8">
    <title>Member Home</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
    html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
  </style>
</head>


<body>
  <?php include("header.php"); ?>



<!-- Page Container -->
<div class="w3-container w3-content w3-theme-l5 w3-padding-64 " style="max-width:1400px">    
  <!-- The Grid -->
  <div class="w3-row w3-padding-64">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile =================================================-->
      <?php $query = "SELECT * FROM user WHERE id='". $member_id. "'";
          $res = mysqli_query($conn, $query);
        ?>

      <?php while($record = mysqli_fetch_assoc($res)) {
          $email = $record["email"];
          $address = $record["address"];
          $city = $record["city"];
          $state = $record["state"];
        }
      ?>

      <br>
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">My Profile</h4>
         <p class="w3-center"><img src="images/person1.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="glyphicon glyphicon-user w3-margin-right w3-text-theme"></i> <?php echo $member_firstname ?> <?php echo $member_lastname?> </p>
         <p><i class="glyphicon glyphicon-home w3-margin-right w3-text-theme"></i> <?php echo $city ?>, <?php echo $state ?></p>
         <p><i class="glyphicon glyphicon-envelope w3-margin-right w3-text-theme"></i> <?php echo $email ?></p>
        </div>
      </div>
      <br>
      
       <!-- SPOTLIGHT ============================= -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
          <center>
          <h5>Member Spotlight</h5>
          <hr>
          <img src="images/spotlight.jpg" alt="Echo" style="width:100%" class="w3-margin-bottom"><br>
          <span><strong>Echo</strong></span>
          </center>
        <p> Echo is this months chef spotlight. She adds personality to every piece. Her masterpiece, "Girl With a Rice Earring" is a vailable for purchase on our shop page!
        </div>
      </div>
      <br>
     
      
      <!-- Alert Box -->
      <div class="w3-container w3-display-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-button w3-theme-l3 w3-display-topright">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Hey!</strong></p>
        <p>People are looking at your profile. Find out who.</p>
      </div>
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
      <!-- ITEMS FOR SALE =============================== -->
      <div class="w3-container w3-card w3-white  w3-margin">
          <h3>Your Dishes for Sale</h3>
          <hr>
          
          <?php $query = "SELECT * FROM food_item WHERE seller_id='". $member_id. "'";
          $res = mysqli_query($conn, $query);
          ?>

    <?php if(mysqli_num_rows($res) > 0) : ?>

      <?php while($record = mysqli_fetch_assoc($res)) {
          $dish_name = $record["dish_name"];
          $product_description = $record["product_description"];
          $price = $record["price"];
          $posted = $record["posted"];
      ?>
      
      <?php if($record[available]) : ?>
      <div class="col-sm-4">
        <div class="panel panel-primary">
          <div class="panel-heading"><h6><?php echo $dish_name; ?></h6><div align="right"><b><?php echo "$" . $price; ?></b></div></div>
          <div class="panel-body"><?php echo $product_description; ?><br><br><b>Posted at <?php echo $posted; ?></b></div>
          <div class="panel-footer">
        </div>
        <?php endif ?>

          
        </div>
      </div>
      <?php } ?>
    <?php else : ?>
          <img class="w3-left w3-round w3-margin-right w3-margin-bottom" src="images/empty_plate_crumbs.jpg" style="width:40%" >
          <h4>You currently have no left overs to sell :(</h4> 
          <p>Start making money while reducing food waste!</p><br>
           <p><a  href="create_item.php">Sell your leftovers!</a></p>
    <?php endif ?>


   
          
      
      </div> 
    <!-- RECENT PURCHASES ===================================================== -->  
      <div class="w3-container w3-card w3-white w3-round w3-margin">
        <h3>Recent Purchases</h3>
        <hr>
        <?php $query = "SELECT * FROM purchase WHERE buyer_id='". $member_id. "'";
        $res = mysqli_query($conn, $query); ?>
          <?php if(mysqli_num_rows($res) > 0) : ?>
            <?php while($record = mysqli_fetch_assoc($res)) {
              $item_id = $record["item_id"]; ?>
    
                <?php $query = "SELECT * FROM food_item WHERE item_id='". $item_id. "'";
                  $res = mysqli_query($conn, $query); ?>

                <?php while($record = mysqli_fetch_assoc($res)) {
                  $item_id = $record["item_id"]; 
                  $dish_name = $record["dish_name"];
                  $product_description = $record["product_description"];
                  $price = $record["price"];
                  $seller = $record["seller_firstname"] . " " . $record["seller_lastname"];

                  ?>

        

                    <div class="col-sm-4">
                    <div class="panel panel-primary">
                    <div class="panel-heading"><h6><?php echo $dish_name; ?></h6><div align="right"><b><?php echo "$" . $price; ?></b></div></div>
                    <div class="panel-body"><?php echo $product_description; ?><br>
                      Sold by  <?php echo $seller; ?> </div>
                    <div class="panel-footer">
                    </div>
                
                <?php } ?>
           
            <?php } ?>
          </div>
        </div>
          <?php else: ?>

          <img src="images/empty_plate.jpg" style="width:40%" alt="Nature" class="w3-left w3-round w3-margin-right w3-margin-bottom">
          <h4>You currently have  nothing to eat :(</h4> 
          <p>Check out our food items for sale to beat your  appetite!</p><br>
          <p><a  href="shop.php">Our food listings are here</a></p>
          <?php endif ?>

      </div>  

    <!-- COMMENTS ===================================== -->
      <div class="w3-container w3-card w3-white w3-round w3-margin">
          <h3>Comments</h3>
          <hr>
          <img class="w3-left w3-circle w3-margin-right" src="images/person3.png" style="width:60px" >
          <h4>John</h4> 
          <p>Keep up the GREAT WORK! I am cheering for you!! </p><br>
          <hr>
          <img class="w3-left w3-circle w3-margin-right" src="images/person4.png" style="width:60px" >
          <h4>Lina</h4> 
          <p> Honestly some o f the best pie I've ever had. Thank you so much! And it was evendropped off warm :) </p><br>

      
      </div> 
      
    <!-- End Middle Column -->
    </div>
    
 <!-- Right Column -->
 <br>
   <!-- RECIPE OF THE WEEK ======================================== -->
    <div class="w3-col m2">
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
          <center>
          <h5>Recipe of the Week</h5>
          <hr>
          <img src="images/sweeny.jpg" alt="Potatoes" style="width:100%" class="w3-margin-bottom"> <br>
          <p><strong>Sweeney Potatoes</strong></p>
          </center>
          <p>Popular in the postwar kitchens of the 1950s and made with canned condensed soups and frozen hash browns. Maura Passanisi shared it tribute to her grandmother, Florence Sweeney. Maura uses fresh russet potatoes and no condensed soup, but plenty of cream cheese, sour cream, butter and cheese. </p><p><strong>"Legendary,"</strong> she calls the dish. And so it is. </p>
          <p><strong>It's rich & feeds a crowd.</strong></p>
          <p><a  href="https://cooking.nytimes.com/recipes/1018412-sweeney-potatoes?action=click&module=Collection%20Band%20Recipe%20Card&region=Sam%20Sifton%27s%20Suggestions&pgType=supercollection&rank=3" class="w3-button w3-block w3-theme-l4">Get the Recipe</a></p>
        </div>
      </div>
      <br>
      
     
  
      
    <!-- End Right Column -->
    </div>
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>


<?php include("footer.html"); ?> 

<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>





</body>
  

</html>