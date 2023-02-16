

<table class="hoteltable" id="table"> 
                    <tr>
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
                    </tr>

 <?php
             
                    require_once("dbcon.php");
                    $con = connect();
                    
                    if (isset($_GET['typingtext'])) {
                       

                        $typedValue = $_GET['typingtext'];
                    $query = mysqli_query($con,"select * from hotel where name LIKE '%$typedValue%'") or die(mysqli_errno($con));
                   
                    while ($row = mysqli_fetch_array($query)) {

							echo'<tr><td><a href="">'.$row["name"].'</a></td>
								 <td>'.$row["telephone"].'</td>
								 <td><a href="">'.$row["web"].'</a></td>
								 <td class="center">'.$row["star"].'</td>
								 <td class="center">'.$row["sgl"].'</td>
								 <td class="center">'.$row["dbl"].'</td>
								 <td class="center">'.$row["tpl"].'</td></tr>';
							                    }

                 
                    }
     
     
      
                    ?>
                 
    </table>

