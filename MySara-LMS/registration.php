<?php


session_start();

if(!isset($_SESSION["name"]) || $_SESSION['usertype'] != "lecture"){


header("Location: login.php");

}

if(isset($_REQUEST['regsubmit'])){



require_once("dbcon.php");



$nic = $_POST['nic'];
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$dob = $_POST['date'].'/'.$_POST['month'].'/'.$_POST['year'];

;  // file name comes for upload form

$con = connect();

$query = "INSERT INTO profile(regno,name,address,email,telephone,dob) VALUES ('$nic','$name','$address','$email','$tel','$dob');";


	$res = mysqli_query($con, $query) or die(mysqli_errno($con));

	if($res == 1){


$target="../mysara/Images/students/";
$target = $target . basename( $_FILES['file']['name']);

$temp = explode(".", $_FILES["file"]["name"]);
$newfilename = $nic . '.' . end($temp);

		if(move_uploaded_file($_FILES['file']['tmp_name'], "../mysara/Images/students/".$newfilename))
		{
			
			
		}
		else
		{
			echo "Sorry, there was a problem uploading your file.";
		}





			$savedmessage = "Data saved successfully";


	}

}


?>

<html>

<head>
	<title>
				Student Registration - MySara
	</title>


	<link rel="stylesheet" href="style.css" />
	<link href='https://fonts.googleapis.com/css?family=Josefin+Sans' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
</head>


<body style="background-image:url(../mysara/Images/background2.jpg)">


<div class="header logotext">
<div class="logo"><h2>MySara</h2></div>
<div class="homeico"><a href="mainmenu.php"><img src="../mysara/Images/icons/home-ios-icon.png" width="60px;"></a><h3>Main Menu</h3></div>
<div class="user">Logged in as: <span class="inputlables"> <?php echo $_SESSION["name"]; ?>  <span/> <a href="logout.php">Log Out</a></div>
</div>


	<div class="registrationbox">			
		<div class="headings">Registration</div>
			<form method="POST" enctype="multipart/form-data">

				<table style="padding-top:20px; padding-left:50px ;padding-right:20px; border-spacing:5px">

		<tr>
			<td>	<span class="inputlables">NIC</span></td>
			<td> 	 <input type="text" name="nic" maxlength="10" size="10" required></td>
		</tr>
		<tr>
			<td>	<span class="inputlables">Name</span></td>
			<td> 	<input type="text" name="name" required/> </td>
		</tr>
		<tr>
			<td valign="top">	<span class="inputlables">Address </span></td>
			<td> 	<textarea rows="3" cols="50" name="address"></textarea> </td>
		</tr>
		<tr>
			<td>	<span class="inputlables">Email</span></td>
			<td> 	<input type="email" name="email" required/> </td>
		</tr>

		<tr>
			<td>	<span class="inputlables">Telephone</span></td>
			<td align="right"> 	<input type="text" name="tel" required/> </td>
		</tr>


		<tr>
			<td>	<span class="inputlables">DOB</span></td>
			<td align="left">


							<select name="date">

								<?php 

								for($i=1; $i<=31; $i++)
								{

								    echo "<option value=".$i.">".$i."</option>";
								}
								?> 
								  
							</select> 
								
							<select name="month">
								  <option value="January">January</option>
								  <option value="February">February</option>
								  <option value="March">March</option>
								  <option value="April">April</option>
								  <option value="May">May</option>
								  <option value="June">June</option>
								  <option value="July">July</option>
								  <option value="August">August</option>
								  <option value="September">September</option>
								  <option value="October">October</option>
								  <option value="November">November</option>
								  <option value="December">December</option>
							</select>


							<select name="year">

								<?php 

								for($i=1920; $i<=2015; $i++)
								{

								    echo "<option value=".$i.">".$i."</option>";
								}
								?> 
								     <option name="years" selected>2016</option>   
							</select> 
				</td>
		
		</tr>

		<tr>
				<td><span class="inputlables">Picture</span></td>
				<td><input type="file" name="file" id="file"></td>
		</tr>
		<tr>
			<td>
			
		</td>
	
			<td style="text-align: right"> 
				<span style="color:green; font-weight:bold; margin-right: 20px;"><?php if (isset($savedmessage)){echo $savedmessage;} ?></span>
				<input type="submit" name="regsubmit" value="Save"/> </td>
		</tr>
</table>

</form>

		</div>






	
</body>
</html>