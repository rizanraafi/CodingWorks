<?php

require_once("dbcon.php");



$nic = $_POST['nic'];
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$dob = $_POST['date'].'/'.$_POST['month'].'/'.$_POST['year'];



$con = connect();

$query = "INSERT INTO profile(regno,name,address,email,tel) VALUES ('$nic','$name','$address','$email','$tel')";
echo $query;

	$res = mysqli_query($con, $query) or die(mysqli_errno($con));

	if($res == 1){


echo'data save successfully';

	}



?>