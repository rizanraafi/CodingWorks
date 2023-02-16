<?php

session_start();

if(!isset($_SESSION["username"])){

header('location: login.php');


}





?>

<html>

<head>
<title>
			 My Sara
		</title>

	<link rel="stylesheet" href="style.css" />
	<link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

</head>

<body style="background-image: url(../mysara/Images/background1.jpg);">

<div class="header logotext">

	<div class="logo"><h2>MySara</h2></div>
	<div class="user">Logged in as: <span class="inputlables"><?php echo $_SESSION['name'];?>  <span/> <a href="logout.php">Log Out</a></div>

</div>
<div class="maincontainer blurredback">
	<div class="headings">Profile</div>
	<table class="student-profile-table">


<?php



// Connecting database
require_once("dbcon.php");
$con = connect();


if($_SESSION["usertype"]=="lecture"){


$just=$_GET["regno"];

$query = "SELECT * FROM profile WHERE regno ='$just'";
	
}else if($_SESSION["usertype"]=="student"){

$just = $_SESSION['username'];
$query = "SELECT * FROM profile WHERE email ='$just'";

}


 
$run = mysqli_query($con, $query) or die(mysqli_errno($con));

$results = mysqli_fetch_array($run) or die();


echo'

		<tr>
			<th>Name </th>
				<td>' .$results["name"].' </td>

			
		</tr>
		<tr>
			<th>NIC </th>
				<td>'.$results["regno"].' </td>
		</tr>
		<tr>
			<th>Address </th>
			<td>'.$results["address"].'</td>
		</tr>
		<tr>
			<th>Email </th>
				<td>'.$results["email"].'</td>
		</tr>
		<tr>
			<th>Telephone </th>
				<td>'.$results["telephone"].'</td>
		</tr> 

		
		';




echo'



	</table>

	<div class="profile-pic">

		<img src="../mysara/Images/students/'.$results["regno"].'.jpg" width="120px">

	</div>


<a href=""><button type="button" class="blurredback" style="margin-left:25px">Edit Infomation</button></a>';

?>

<table class="resultstable">


<tr>
	<th colspan="2" class="blurredback">Semester 1</th>
	<th colspan="2" class="blurredback">Semester 2</th>
	<th colspan="2" class="blurredback">Semester 3</th>
	<th colspan="2" class="blurredback">Semester 4</th>
</tr>
<tr>
		<th class="blurredback">Subject</th>
		<th class="blurredback">Grade</th>
		<th class="blurredback">Subject</th>
		<th class="blurredback">Grade</th>
		<th class="blurredback">Subject</th>
		<th class="blurredback">Grade</th>
		<th class="blurredback">Subject</th>
		<th class="blurredback">Grade</th>
</tr>


<?php

require_once("dbcon.php");
$con = connect();

$userst = $_SESSION["username"];

if($_SESSION["usertype"]=="lecture"){


	$regno=$_GET["regno"];
	$query1 ="SELECT * FROM results WHERE NIC='$regno'";
	
}else if($_SESSION["usertype"]=="student"){

	$userst = $_SESSION['username'];
	$query1 ="SELECT * FROM results, profile WHERE profile.regno = results.nic and profile.email='$userst'";

}




$run1 = mysqli_query($con, $query1) or die(mysqli_errno($con));



$data = mysqli_fetch_array($run1) or die(mysqli_errno($con));



echo'

<tr>
	<th>CS</th>
	<td>' .$data["CS"].' </td>

	
	<th>BSEC</th>
	<td>' .$data["BSEC"].' </td>

	<th>MOP</th>
	<td>' .$data["MOP"].' </td>

	<th>NT</th>
	<td>' .$data["NT"].' </td>

</tr>

<tr>
	<th>ISO</th>
	<td>' .$data["ISO"].' </td>

	<th>DAD</th>
	<td>' .$data["DAD"].' </td>

	<th>ASP.NET</th>
	<td>' .$data["ASP.NET"].' </td>

	<th>KBS</th>
	<td>' .$data["KBS"].' </td>
</tr>

<tr>
	<th>SAD</th>
	<td>' .$data["SAD"].' </td>

	<th>WAD</th>
	<td>' .$data["WAD"].' </td>

	<th>EPD</th>
	<td>' .$data["EPD"].' </td>

	<th>DSA</th>
	<td>' .$data["DSA"].' </td>
</tr>

<tr>
	<th>PP</th>
	<td>' .$data["PP"].' </td>

	<th>OOP</th>
	<td>' .$data["OOP"].' </td>

	<th>JAVA</th>
	<td>' .$data["JAVA"].' </td>

	<th>PDIE</th>
	<td>' .$data["PDIE"].' </td>
</tr>';

?>

</table>

</div>


</body>


</html>