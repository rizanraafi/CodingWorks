<?php

session_start();

if(!isset($_SESSION["name"]) || $_SESSION['usertype'] != "lecture"){

header('location: login.php');



}


$msg = null;
$msg1 = null;
	require_once("dbcon.php");


	if(isset($_REQUEST["btnSub"])){
	

		$sub = $_REQUEST["cmbSub"];

		$targetFile = basename($_FILES["marks"]["name"]);
		if(pathinfo($targetFile, PATHINFO_EXTENSION) != "CSV"){
		

			$msg1 = "Invalid file format! Only CSV files are allowed!";

		}
		else{
			$content = fopen($_FILES["marks"]["tmp_name"], "rb");
			$i = 0;
			$done = 0;

			//Database connection
			$con = connect();
			while($line = fgets($content)){
				$i++;
				if($i==1)
					continue;
				$rec = explode(",", $line);

				$nic = $rec[0];
				$grade = $rec[1];



				$sql = "UPDATE results SET $sub ='$grade' WHERE nic='$nic';";
				
				//Query execution

				$res = mysqli_query($con, $sql) or die(mysqli_error($con));
				if($res == 1){
					$done++;
				}
			}
			mysqli_close($con);
			fclose($content);
			$msg = "$done recoreds have been successfully updated!";

			
		}
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

	<div class="loginpanel blurredback">
		
		
		<div class="headings">Upload Grades</div>
	<table class="uploadmarks">
<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">



		<tr><th>Subject</th>
			<td><select name="cmbSub">
							<option value="">--Choose--</option>
							<option value="CS">CS</option>
							<option>ISO</option>
							<option>SAD</option>
							<option>PP</option>
							<option>BSEC</option>
							<option>DAD</option>
							<option>WAD</option>
							<option>OOP</option>
							<option>MOP</option>
							<option>ASP.NET</option>
							<option>EPD</option>
							<option>JAVA</option>
							<option>NT</option>
							<option>KBS</option>
							<option>DSA</option>
							<option>PDIE</option>
				</select></td>

		</tr>

		<tr>	<th>CVS File</th>
				<td> <input type="file" name="marks"></td>
		</tr>

		<tr>
				<td></td>
				<td style="text-align:right">
					<input type="reset" value="Clear" />
					<input type="submit" name="btnSub" value="Upload" />
				</td>
		</tr>
<tr><?php
			if($msg1 != null){

			echo '<td colspan="2" style="color:red; font-weight:bold; text-align:center">'.$msg1.'</td>';

			}


			if($msg != null){
				echo'<td colspan="2" style="color:green; font-weight:bold; text-align:center">'. $msg.'</td>';
			}
		?><tr/>
</form>

	</table>
</div>




<div class="footer">
	<P>MySara &copy; All Rights Reserved | Reveira Systems</p>
</div>
<body>

</html>