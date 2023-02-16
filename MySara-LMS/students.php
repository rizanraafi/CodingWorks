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
	<div class="header logotext">
<div class="logo"><h2>MySara</h2></div>

<div class="homeico"><a href="mainmenu.php"><img src="../mysara/Images/icons/home-ios-icon.png" width="60px;"></a><h3>Main Menu</h3></div>

<div class="user">Logged in as: <span class="inputlables"> <?php echo $_SESSION["name"]; ?>  <span/> <a href="logout.php">Log Out</a></div>
</div>

	<div class="maincontainerst blurredback">
		
		
		<div class="headings">Students</div>


		<table class="studenttable">
			

			<tr>
			<th>NIC</th>
			<th>Name</th>
			<th>Address</th>
			<th>Telephone</th>
			</tr>


			<?php

				require_once("dbcon.php");
				$con = connect();


				$querry ="SELECT * FROM profile";
				$exquerry = mysqli_query($con, $querry) or die("error");


				while($results = mysqli_fetch_array($exquerry)){



					echo'


							<tr>

						    <td> <a href="student-profile.php?regno=' . $results['regno'] . '" target="_blank">' . $results['regno'] . '</a></td>
							<td>'.$results["name"].'</td>
							<td>'.$results["address"].'</td>
							<td>'.$results["telephone"].'</td>


							</tr>';
				}



			?>
			
		


		</table>

	</div>
	<div class="container">
<a href="registration.php"><span class="inputlables" style="position: absolute; margin-top: 5px;">Add New Student</span>
</a>
</div>
<div class="footer">
	<P>MySara &copy; All Rights Reserved | Reveira Systems</p>
</div>
<body>

</html>