<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- CSS ================================================== -->
    <link rel="stylesheet" href="stylesheets/base.css">
    <link rel="stylesheet" href="stylesheets/skeleton.css">
    <link rel="stylesheet" href="stylesheets/layout.css">
    <link rel="stylesheet" href="stylesheets/flexslider.css">
    <link rel="stylesheet" href="stylesheets/prettyPhoto.css">
    <link rel="stylesheet" href="stylesheets/form.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <!-- CSS ================================================== -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script src="js/jquery.flexslider-min.js"></script>
    <script src="js/scripts.js"></script>

    <link rel="shortcut icon" href="images/hat_icon.png">
</head>

<?phpsession_start(); ?>
<!-- HEADER =================================================== -->
<header id="header" class="site-header w3-top w3-white" >
    <div id="header-inner" class="container sixteen columns over" >
        <hgroup class="one-third column alpha">
            <h1 id="site-title" class="site-title">
                <a href="index.html" id="logo"><img src="images/logo2.png" alt="Icebrrrg logo" height="57" width="193" /></a>
            </h1>
        </hgroup>
        <nav id="main-nav" class="two thirds column omega" >
            <ul id="main-nav-menu" class="nav-menu">
                <li id="menu-item-1" >
                    <a href="index.php">Home</a>
                </li>
                <li id="menu-item-2">
                    <a href="index.php#about">About us</a>
                </li>
				
				<?php if((isset($_SESSION['login_user'])))
				{?>
						
                <li id="menu-item-3">
                    <a href="create_item.php">Sell</a>
                </li>
                <li id="menu-item-4">
                    <a href="shop.php">Shop</a>
                </li>
				
				<?php
				}?>
		
				
				<?php
				
				if(!(isset($_SESSION['login_user'])))
				{?>
				<li id="menu-item-5" >
                    <a href="login.php">Login</a> / <a href="signup.php">Sign Up</a>
                </li>
				
				<?php
				}
			
				
				if((isset($_SESSION['login_user'])))
				{?>
				<li id="menu-item-5" >
                    <a href="logout.php">Logout</a>
                </li>
				
				<?php
				}
				?>
					
			

            </ul>
        </nav>
    </div>
</header>