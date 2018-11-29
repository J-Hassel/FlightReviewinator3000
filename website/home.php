<html class="home">
<head>
	<title>Flight Tracker</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<header>
		<div class "row">
			<div class="logo">
 				<img src="logo.png">
			</div>
		
			<ul class="main-nav">
				<li class="active"><a href="home.php">Home</a></li>
				<li><a href="airport.php">Flights</a></li>
				<li><a href="map.php">Map</a></li>
				<li><a href="database.php">Database</a></li>
				<li><a href="logout.php">Sign Out</a></li>
				<li><a href="reset-password.php">Reset Password</a></li>
			</ul>
		</div>
	</header>

	<div class="tracker-box">
		<div class="ftrack-headline">
			<h1>
				Flight Tracker
				<span>✈</span>
				<h2>Moved index page to database.php, click database tab. Need to add this header to all pages</h2>

			</h1>
		</div>

		<div class="flight-tracker-form">
			<form id="ft-form">
				<div class = "airline-form">
					<input id="flight-tracker-form-airline" type="text" placeholder="Airline">
				</div>

				<div class="flight-number-form">
					<input id="flight-tracker-form-number" type="text" placeholder="Flight Number">
				</div>
			</form>
		</div>

	</div>

</body>
</html>


