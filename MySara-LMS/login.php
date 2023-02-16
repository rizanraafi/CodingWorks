<?php

session_start();



if(isset($_REQUEST["btnsubmit"]))
{
			require_once("dbcon.php");


			$uname = $_POST['uname'];
			$pword = $_POST['password'];

			// database connection

			$con = connect();

			$sql = "SELECT * FROM login WHERE username='$uname'";

			$exquery = mysqli_query($con,$sql) or die(mysqli_errno($con));

			$results = mysqli_fetch_array($exquery,MYSQL_ASSOC);



				if($pword == $results['password']){


						$_SESSION['username'] = $results['username'];
						$_SESSION['name'] = $results['sname'];
						$_SESSION['usertype'] = $results['type'];



							if($_SESSION['usertype']=="student")
								header('location:student-profile.php');

							else if($_SESSION['usertype']== "lecture")
								header('location:../mysara/mainmenu.php');




				}else{

					$loginerror = "Invalid Username or Password";

				}

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

<body style="background-image: url(../mysara/Images/background2.jpg)">

<div class="header"><h1>MySara</h1></div>

<div class="loginpanel">
	<div class="headings">Login</div>
<div class="logincontent">
<form method="POST">
	<table style="position: relative; margin: 0 auto; margin-top: 35px; border-spacing:8px">

		<tr>
			<td>	<span class="inputlables">User Name </span>	</td>
		
	
			<td> <input type="text" name="uname"/> </td>
		</tr>

		<tr>
			<td>	<span class="inputlables"> Password  </span>	</td>
	
			<td> <input type="password" name="password"/> </td>
		</tr>
		<tr>
		<td  colspan="2" style="text-align:right;">
			<span style="color:red; font-weight:bold;"><?php if (isset($loginerror)){echo $loginerror;} ?></span></tr>
		</td>

		<tr>
			<td></td>
	<br/>
			<td style="text-align: right"> <input type="submit" name="btnsubmit" value="Login"/> </td>
		</tr>

	</table>




</form>

</div>
</div>


<div class="footer">

	<P>MySara &copy; All Rights Reserved | Reveira Systems</p>
</div>
</body>

</html>