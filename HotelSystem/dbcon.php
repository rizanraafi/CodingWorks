<?php


function connect(){


$con = mysqli_connect("localhost","root","","hotels") or die(mysql_errno());
return $con;

}


?>