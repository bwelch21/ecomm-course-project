<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

 <link rel="stylesheet" href="stylesheets/base.css">
    <link rel="stylesheet" href="stylesheets/skeleton.css">
    <link rel="stylesheet" href="stylesheets/layout.css">
    <link rel="stylesheet" href="stylesheets/flexslider.css">
    <link rel="stylesheet" href="stylesheets/prettyPhoto.css">
    <link rel="stylesheet" href="stylesheets/form.css">
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <!-- CSS ================================================== -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script src="js/jquery.flexslider-min.js"></script>
    <script src="js/scripts.js"></script>

    <!-- CSS ================================================== -->
 

    <link rel="shortcut icon" href="images/hat_icon.png">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Open Sans", sans-serif}
body, html {
    height: 100%;
    color: #000080;
    line-height: 1.8;


}

.navy {
    color: #000080;
  }
/* Create a Parallax Effect */
.bgimg-1, .bgimg-2, .bgimg-3 {
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

/* First image (Logo. Full height) */
.bgimg-1 {
    background-image: url('images/food2.jpg');
    min-height: 100%;
}

/* Second image (Portfolio) */
.bgimg-2 {
    background-image: url("images/food3.jpg");
    min-height: 400px;
}

/* Third image (Contact) */
.bgimg-3 {
    background-image: url("images/sweeny.jpg");
    min-height: 400px;
}

.w3-wide {letter-spacing: 10px;}
.w3-hover-opacity {cursor: pointer;}

/* Turn off parallax scrolling for tablets and phones */
@media only screen and (max-device-width: 1024px) {
    .bgimg-1, .bgimg-2, .bgimg-3 {
        background-attachment: scroll;
    }
}
</style>
</head>
<body>

<?php include("header.html"); ?>

<!-- First Parallax Image with Logo Text -->
<div class="bgimg-1 w3-display-container" id="home">
  <div class="w3-display-middle" style="white-space:nowrap;">
    <span class="w3-center w3-padding-large w3-xlarge w3-wide w3-white w3-animate-opacity"> HOOS COOKING</span> 
  </div>
</div>

<!-- Container (About Section) -->
<div class="w3-content w3-container w3-padding-64" id="about">
  <h3 class="w3-center">ABOUT US</h3>
  <p class="w3-center"><em>We love good food.</em></p>
 <p> It is our mission to provide a small slice of comfort during the school year, in what can be a tumultuous experience, while also reducing food waste. With busy schedules and heavy work loads hot, home cooked meal can be hard to come by. </p>

        
  <div class="w3-row">
    <div class="w3-col m6 w3-center w3-padding-large">
      <img src="images/food_waste.png" class="w3-round w3-image w3-hover-opacity-on" alt="Photo of Me" width="500" height="333">
    </div>

    <!-- Hide this text on small devices -->
    <div class="w3-col m6 w3-padding-large">
      <p>Hoo’s Home Cooking shared marketplace allows you to be a cook, consumer, or even both! If you are preparing a meal and are anticipating multiple portions of leftovers you can easily avoid food waste by placing a notification on our marketplace. With our easy to use interface cooks can easily specify ingredients, flag major food allergens, specify price, indicate price and set a window for pickup time. All customers have to do is <strong>pay, pickup and enjoy </strong>their meal. </p>
      <p>We hope to foster a <strong>community</strong> platform where students and faculty and share portions of their home cooked meal for a profit. A valid virginia.edu email is required for sign up, we hope our home cooked community reflects the integrity of the UVA community. </p>

      <p>Food waste is a huge issue and Americans are global leaders in the production of food waste. The Hoos Cooking company helps to <strong>reduce food waste</strong> by allowing students to sell their leftovers</p> 
    </div>
  </div>
  
</div>

<div class="w3-row w3-center w3-dark-grey w3-padding-16">
  <div class="w3-quarter w3-section">
    <span class="w3-xlarge">14+</span><br>
    Food Drives
  </div>
  <div class="w3-quarter w3-section">
    <span class="w3-xlarge">200+</span><br>
    Members
  </div>
  <div class="w3-quarter w3-section">
    <span class="w3-xlarge">1000+</span><br>
    Meals Sold
  </div>
  <div class="w3-quarter w3-section">
    <span class="w3-xlarge">9+</span><br>
    Tons of Waste Reduced
  </div>
</div>

<!-- Second Parallax Image with Portfolio Text -->
<div class="bgimg-2 w3-display-container">
  <div class="w3-display-middle">
    <span class="w3-xxlarge w3-text-white w3-wide">MEALS</span>
  </div>
</div>

<!-- Container (Portfolio Section) -->
<div class="w3-content w3-container w3-padding-64" id="portfolio">
  <h3 class="w3-center">HOOS COOKING IN CHARLOTTESVILLE</h3>
  <p class="w3-center"><em>Here are some of the meals we sell. Hoos cooking dinners offer a well balanced diet with nutritional, homecooked meals.<br> Click on the images to make them bigger</em></p><br>

  <!-- Responsive Grid. Four columns on tablets, laptops and desktops. Will stack on mobile devices/small screens (100% width) -->
  <div class="w3-row-padding w3-center">
    <div class="w3-col m3">
      <img src="images/meal1.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="The mist over the mountains">
    </div>

    <div class="w3-col m3">
      <img src="images/meal2.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Coffee beans">
    </div>

    <div class="w3-col m3">
      <img src="images/meal3.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Bear closeup">
    </div>

    <div class="w3-col m3">
      <img src="images/meal7.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Quiet ocean">
    </div>
  </div>

  <div class="w3-row-padding w3-center w3-section">
    <div class="w3-col m3">
      <img src="images/meal5.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="The mist">
    </div>

    <div class="w3-col m3">
      <img src="images/meal6.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="My beloved typewriter">
    </div>

    <div class="w3-col m3">
      <img src="images/meal4.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Empty ghost train">
    </div>

    <div class="w3-col m3">
      <img src="images/meal8.jpg" style="width:100%" onclick="onClick(this)" class="w3-hover-opacity" alt="Sailing">
    </div>
   
  </div>
</div>

<!-- Modal for full size images on click-->
<div id="modal01" class="w3-modal w3-black" onclick="this.style.display='none'">
  <span class="w3-button w3-large w3-black w3-display-topright" title="Close Modal Image"><i class="fa fa-remove"></i></span>
  <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
    <img id="img01" class="w3-image">
    <p id="caption" class="w3-opacity w3-large"></p>
  </div>
</div>

<!-- Third Parallax Image with Portfolio Text -->
<div class="bgimg-3 w3-display-container">
  <div class="w3-display-middle">
     <span class="w3-xxlarge w3-text-white w3-wide">OUR COMMUNITY</span>
  </div>
</div>

<!-- Container (Contact Section) -->
<div class="w3-content w3-container" id="contact">
 
  <h3 class="w3-center">  <i class="fa fa-map-marker fa-fw w3-hover-text-black w3-xlarge w3-margin-right"></i>Charlottesville, Va</h3>
  <p class="w3-center"><em>We are a community based company. Only members in the University of Virginia community as well as the surrounding Charlottesville residents can participate in our food sharing programs.</em></p>

  
      <!-- Add Google Maps -->
      <img src="images/uva_rotunda.jpg" class="w3-round-large" style="width:100%">

    </div>
  </div>
</div>

<!-- Footer -->
<?php include("footer.html"); ?>
 
<!-- Add Google Maps -->
<script>
function myMap()
{
  myCenter=new google.maps.LatLng(38.0338758, -78.5023105);
  var mapOptions= {
    center:myCenter,
    zoom:12, scrollwheel: false, draggable: false,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"),mapOptions);

  var marker = new google.maps.Marker({
    position: myCenter,
  });
  marker.setMap(map);
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}

// Change style of navbar on scroll
window.onscroll = function() {myFunction()};
function myFunction() {
    var navbar = document.getElementById("myNavbar");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        navbar.className = "w3-bar" + " w3-card" + " w3-animate-top" + " w3-white";
    } else {
        navbar.className = navbar.className.replace(" w3-card w3-animate-top w3-white", "");
    }
}

// Used to toggle the menu on small screens when clicking on the menu button
function toggleFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsR5aCLxf2n6L0qE2gcI68z0Jg1IkCZxM&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

</body>
</html>
