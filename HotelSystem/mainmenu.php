<?php

session_start();

if($_SESSION['type']!="admin"){

header('location:login.php');

}

?>


<html>
<head>
	<title>Main Menu - Hotel Database System - Happy Friends Tours</title>

		<link rel="stylesheet" href="style.css"/>
</head>
<body>
	<div class="header">

		<div class="logo">
		<img src="images/logos.png"/ height="60px">
		</div>

		<div class="logoptions">
			<p>Logged in As: <span class="loggedname"> <?php echo $_SESSION["name"]?></span> &nbsp;&nbsp;&nbsp; <span class="logout"><a href="logout.php"> Logout</a></span></p>
		</div>
	</div>

	<div class="content">
		<div class="box">
<a href="hotels.php">
		<img src="images/hotel_finder.PNG">
		<h3>Hotels</h3>
</a>

		</div>

		<div class="box1">
				<a href=""><img src="images/Key-icon.PNG" width="100px;">
		<h3>Users</h3></a>



		</div>

	</div>

	<div class="footer">

		<p>Developed By - <a href="">Reveira Systems</a></p>

	</div>


</body>
</html>