<?php

session_start();



?>


<html>
<head>
	<title>Main Menu - Hotel Database</title>
	<link rel="stylesheet" href="style.css"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">        </script>
     <script src="typeahead.min.js"></script>

      <script>
            function showHint(textname)
            {
                if (textname.length == 0)
                {
                    document.getElementById("txtHint").innerHTML = "Hello";
                    return;
                }
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById("table").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "searchbyname.php?typingtext="+textname, true);
                xmlhttp.send();
            }
        </script>


         <script>
            function showbylocation(textlocation)
            {
               
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function()
                {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
                    {
                        document.getElementById("table").innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open("GET", "searchbyprice.php?location="+textlocation, true);
                xmlhttp.send();
            }
        </script>


</head>
<body>

	<div class="header">

		<div class="logo">
		<img src="images/logos.png"/ height="60px">
		</div>

		<div class="logoptions">
			<p>Logged in As: <span class="loggedname"> <?php echo $_SESSION["name"]?></span> &nbsp;&nbsp;&nbsp; <span class="logout"><a href="logout.php"> Logout</a></span></p>
		</div>
	</div>
	<div class="contenthoteltable">
<div class="searchpanel">

	<form method="POST">
	<input type="text" name="typingtext" placeholder="Search" onkeyup="showHint(this.value)" >
	
	<span class="searchoption">
	Location: <select name="location" onchange="showbylocation(this.value)">
	<option value="Colombo">Colombo</option>
	<option value="Kandy">Kandy</option>	
	<option value="Colombo">Colombo</option>	
	<option value="Colombo">Colombo</option>	
	<option value="Colombo">Colombo</option>	
	<option value="Colombo">Colombo</option>		

	</select>

</span>
<span class="searchoption">

	Star: <select name="star">
	<option value="1">1</option>
	<option value="2">2</option>	
	<option value="3">3</option>	
	<option value="4">4</option>	
	<option value="5">5</option>	
	<option value="6">6</option>
	<option value="7">7</option>	

	</select>
</span>
<span class="searchoption">
	Price: <select name="price" >
	


			<?php

				for ($x=0; $x <= 200 ; $x+=10) { 

					echo "<option value=".$x.">".$x."</option>";	
					
				}


			?>

	

	</select>
</span>

<span class="searchoption">

<input type="submit" name="searchbut" value="Search">
</span>

</form>
	</div>

<div class="hoteldiv">
		<table class="hoteltable" id="table">
				<tr>
					<th rowspan="2">Name</th>
					<th rowspan="2">Telephone</th>
				
					<th rowspan="2">Web</th>
					<th rowspan="2">Star</th>
					<th colspan="3" style="text-align:center;">Price</th>


				</tr>

				<tr style="text-align:center">
					
					<th>SGL</th>
					<th>DBL</th>
					<th>TRL</th>

				</tr>

<?php


require_once("dbcon.php");
$con = connect();


$query = "select * from hotel where location='Colombo'";
$run = mysqli_query($con, $query) or die(mysqli_errno($con));


while($results = mysqli_fetch_array($run) or die(mysqli_errno($con))){

echo '<tr><td><a href="">'.$results["name"].'</a></td>
	<td>'.$results["telephone"].'</td>
	<td><a href="">'.$results["web"].'</a></td>
	<td class="center">'.$results["star"].'</td>
	<td class="center">'.$results["sgl"].'</td>
	<td class="center">'.$results["dbl"].'</td>
	<td class="center">'.$results["tpl"].'</td></tr>';



}


?>


		</table>
	</div>

	</div>

<div class="footer">

<p>Developed By - <a href="">Reveira Systems</a></p>

</div>
</body>


 
</html>