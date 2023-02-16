<?php

session_start();
 
if(!isset($_SESSION["name"]) || $_SESSION['usertype'] != "lecture"){

header('location: login.php');

}
?>

<html>
<head>
<title>

MySara
</title>

	<link rel="stylesheet" href="style.css" />
	<link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

</head>
<body style="background-image: url(../mysara/Images/background1.jpg);">
	<div class="header">
		<div class="user">Logged in as: <span class="inputlables"> <?php echo $_SESSION["name"]; ?>  <span/> <a href="logout.php">Log Out</a></div>
		<h1 style="top:-50px;">MySara</h1>

	</div>
	<div class="maincontainer blurredback">
		<div class="menubox blurredback">
			<a href="students.php"><img src="../mysara/Images/icons/student.png"/>
			<h3>Students</h3></a>


		</div>
		<div class="menubox blurredback">
			<a href="upload-grades.php"><img src="../mysara/Images/icons/marks.png"/>
			<h3>Upload Marks</h3></a>
		</div>


		<div class="menubox blurredback">
				<a href=""><img src="../mysara/Images/icons/key.png"/>
		<h3>User Accounts</h3></a>
		</div>
	</div>


<div class="footer">
	<P>MySara &copy; All Rights Reserved | Reveira Systems</p>
</div>
<body>

</html>