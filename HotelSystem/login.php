<?php


	session_start();



if(isset($_REQUEST["logsubmit"])){


		require_once("dbcon.php");

$msg = null;

	$username = $_POST["username"];
	$password = $_POST["password"];

		$con = connect();

		$query = "SELECT * FROM user WHERE username='$username'";

		$runquery = mysqli_query($con, $query) or die(mysqli_error($con));

		$results = mysqli_fetch_array($runquery,MYSQL_ASSOC);


		if($password = $results["password"]){

				$_SESSION['name'] = $results["name"];
				$_SESSION['type'] = $results["type"];


				if($_SESSION['type']=="admin"){

					header('location:mainmenu.php');


				}else if($_SESSION['type']=="user"){

						header('location:hotels.php');

				}

					

		}else{


			$msg = "Invalid login details";

		}


}





?>


<html>
<head>
	<title>Happy Friends Tours Hotel Database</title>
	<link rel="stylesheet" href="style.css" />
</head>
<body>

<div class="header"></div>

<div class="content">

	<div class="loginpanel">
		<img src="images/logos.png"/ width="300px;">

		<form method="POST">

			<table>

					<tr>
						
						<td><input type="text" name="username" placeholder="Username"/></td>
					</tr>

					<tr>
						
						<td><input type="password" name="password" placeholder="Password"/></td>
					</tr>

					<tr style="text-align:center">
						<td colspan="2">
						<input type="submit" name="logsubmit" value="Login"/>
						</td>
					</tr>
					<tr style="text-align:center; color:red;">
						<td colspan="2">
						<?php if(isset($msg)){ echo $msg;} ?>
						</td>

					</tr>

			</table>


		</form>

	</div>

</div>

<div class="footer">

<p>Developed By - <a href="">Reveira Systems</a></p>

</div>

</body>
</html>