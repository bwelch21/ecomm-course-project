<!DOCTYPE html>
<?php include("dbconnect.php"); 

session_start();
if(!(isset($_SESSION['login_user'])))
{
    header("Location: index.php");
}
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
      <!-- Profile -->
      <br>
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">My Profile</h4>
         <p class="w3-center"><img src="images/person1.png" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-pencil fa-fw w3-margin-right w3-text-theme"></i> Designer, UI</p>
         <p><i class="fa fa-home fa-fw w3-margin-right w3-text-theme"></i> London, UK</p>
         <p><i class="fa fa-birthday-cake fa-fw w3-margin-right w3-text-theme"></i> April 1, 1988</p>
        </div>
      </div>
      <br>
      
      <!-- Accordion -->
      <div class="w3-card w3-round">
        <div class="w3-white">
          <button onclick="myFunction('Demo1')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> My Groups</button>
          <div id="Demo1" class="w3-hide w3-container">
            <p>Some text..</p>
          </div>
          <button onclick="myFunction('Demo2')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> My Events</button>
          <div id="Demo2" class="w3-hide w3-container">
            <p>Some other text..</p>
          </div>
          <button onclick="myFunction('Demo3')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-users fa-fw w3-margin-right"></i> My Photos</button>
          <div id="Demo3" class="w3-hide w3-container">
         <div class="w3-row-padding">
         <br>
           <div class="w3-half">
             <img src="/w3images/lights.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/mountains.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/forest.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/nature.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="/w3images/fjords.jpg" style="width:100%" class="w3-margin-bottom">
           </div>
         </div>
          </div>
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
          <h3>Your Sale Items</h3>
          <img class="w3-left w3-round w3-margin-right w3-margin-bottom" src="images/empty_plate_crumbs.jpg" style="width:40%" >
          <h4>You currently have no left overs to sell :(</h4> 
          <p>Start making money while reducing food waste!</p><br>
           <p><a  href="create_item.php">Sell your leftovers!</a></p>
          
      
      </div> 
    <!-- RECENT PURCHASES ===================================================== -->  
      <div class="w3-container w3-card w3-white w3-round w3-margin">
        <h3>Recent Purchases</h3>
          <img src="images/empty_plate.jpg" style="width:40%" alt="Nature" class="w3-left w3-round w3-margin-right w3-margin-bottom">
          <h4>You currently have  nothing to eat :(</h4> 
          <p>Check out our food items for sale to beat your  appetite!</p><br>
           <p><a  href="shop.php">Our food listings are here</a></p>
   
      </div>  

    <!-- COMMENTS ===================================== -->
      <div class="w3-container w3-card w3-white w3-round w3-margin">
          <h3>Comments</h3>
          <img class="w3-left w3-circle w3-margin-right" src="images/person3.png" style="width:60px" >
          <h4>John</h4> 
          <p>Keep up the GREArk! I am cheering for you!! Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><br>
      
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
          <img src="images/sweeny.jpg" alt="Potatoes" style="width:100%"> <br>
          <p><strong>Sweeney Potatoes</strong></p>
          </center>
          <p>Popular in the postwar kitchens of the 1950s and made with canned condensed soups and frozen hash browns. Maura Passanisi shared it tribute to her grandmother, Florence Sweeney. Maura uses fresh russet potatoes and no condensed soup, but plenty of cream cheese, sour cream, butter and cheese. <strong>"Legendary" </strong>, she calls the dish. And so it is. </p>
          <p><strong>It's rich & feeds a crowd.</strong></p>
          <p><a  href="https://cooking.nytimes.com/recipes/1018412-sweeney-potatoes?action=click&module=Collection%20Band%20Recipe%20Card&region=Sam%20Sifton%27s%20Suggestions&pgType=supercollection&rank=3" class="w3-button w3-block w3-theme-l4">Get the Recipe</a></p>
        </div>
      </div>
      <br>
      
      <!-- SPOTLIGHT ============================= -->
      <div class="w3-card w3-round w3-white">
        <div class="w3-container">
          <center>
          <h5>Member Spotlight</h5>
          <img src="images/spotlight.jpg" alt="Echo" style="width:100%"><br>
          <span><strong>Echo</strong></span>
          </center>
        <p> Echo is this months chef spotlight. She adds personality to every piece. Her masterpiece, "Girl With a Rice Earring" is a vailable for purchase on our shop page!
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