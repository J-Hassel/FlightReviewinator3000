<?php
$page = basename($_SERVER['PHP_SELF']);
?>

<header>
      <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
      <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>    
      <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" /> 
      <script>
          function update() {
                $.ajax({
                  url:"update_flights.php",
               });
            window.location.reload(true);
         };
      </script>
		<div class="row">
			<div class="logo">
 				<img src="logo.png">
			</div>
		
			<ul class="main-nav">
            <li ><a href="#" onclick='update();'>Update</a></li>
				<li class="<?php if($page == 'home.php'){ echo ' active"';}?>"><a href="home.php">Home</a></li>
				<li class="<?php if($page == 'allflights.php'){ echo ' active"';}?>"><a href="allflights.php">Map</a></li>
				<li class="<?php if($page == 'database.php'){ echo ' active"';}?>"><a href="database.php?table_name=flight&Submit=Submit">Database</a></li>
				<li class="<?php if($page == 'logout.php'){ echo ' active"';}?>"><a href="logout.php">Sign Out</a></li>
				<li class="<?php if($page == 'reset-password.php'){ echo ' active"';}?>"><a href="reset-password.php">Reset Password</a></li>
            <li class="<?php if($page == 'my_reviews.php'){ echo ' active"';}?>"><a href="my_reviews.php">Signed in as: <?php echo $_SESSION['username']; ?></a></li>
			</ul>
		</div>
</header>