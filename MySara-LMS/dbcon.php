<?php


function connect(){


$con = mysqli_connect("localhost","root","", "db_mysara") or die(mysql_errno());
return $con;


}


?>