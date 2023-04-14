<?php
include('db.php')
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ANKARA WATERFRONT</title>



<!-- CSS code -->

    <style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 80%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

.header{
    height: 100px;
    background-color:black;


}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
 
}

.button {
  background-color: #47a3da; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

h3{
	color:red;
	background-color:yellow;
	margin:0px;
	padding: 4px;
}


</style>
</head>
<body style = "margin:0">

<div class="header"></div>

<center>
<h3>Please Select Room Type Based On Availability</h3></center><br>

<?php

  /*Primary purpose of this part of this web application is provide available room quantity to the custonmer.
   Thats help  customer to do theire selections */







						$rsql ="select * from room";
						$rre= mysqli_query($con,$rsql);
						$r =0 ;
						$sc =0;
						$gh = 0;
						$sr = 0;
						$dr = 0;
						while($rrow=mysqli_fetch_array($rre))
						{
							$r = $r + 1;
							$s = $rrow['type'];
							$p = $rrow['place'];
							if($s=="Superior Room" )
							{
								$sc = $sc+ 1;
							}
							
							if($s=="Guest House")
							{
								$gh = $gh + 1;
							}
							if($s=="Single Room" )
							{
								$sr = $sr + 1;
							}
							if($s=="Deluxe Room" )
							{
								$dr = $dr + 1;
							}
							
						
						}
						?>
						
						<?php
						$csql ="select * from payment";
						$cre= mysqli_query($con,$csql);
						$cr =0 ;
						$csc =0;
						$cgh = 0;
						$csr = 0;
						$cdr = 0;
						while($crow=mysqli_fetch_array($cre))
						{
							$cr = $cr + 1;
							$cs = $crow['troom'];
							
							if($cs=="Superior Room"  )
							{
								$csc = $csc + 1;
							}
							
							if($cs=="Guest House" )
							{
								$cgh = $cgh + 1;
							}
							if($cs=="Single Room" )
							{
								$csr = $csr + 1;
							}
							if($cs=="Deluxe Room" )
							{
								$cdr = $cdr + 1;
							}
							
						
						}
				
					?>
                    <center>
<div class="col-md-4 col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading" ">
                        <br><br>
                           <h1>Available Room Details</h1>
						   
                           <br><br>
                        </div>
                        <div class="panel-body">
						<table width="200px" id="customers">
							
							<tr>
								<td><b>Superior Room	 </b></td>
								<td><center><button type="button" class="btn btn-primary btn-circle"><?php  
									$f1 =$sc - $csc;
									if($f1 <=0 )
									{	$f1 = "NO ROOMS AVAILABLE";
										echo $f1;
									}
									else{
											echo $f1."  ROOMS AVAILABLE";
									}
								
								
								?> </button></center></td> 
							</tr>
							<tr>
								<td><b>Guest House</b>	 </td>
								<td><center><button type="button" class="btn btn-primary btn-circle"><?php 
								$f2 =  $gh -$cgh;
								if($f2 <=0 )
									{	$f2 = "NO ROOMS AVAILABLE";
										echo $f2;
									}
									else{
											echo $f2."  ROOMS AVAILABLE";
									}

								?> </button></center></td> 
							</tr>
							<tr>
								<td><b>Single Room	 </b></td>
								<td><center><button type="button" class="btn btn-primary btn-circle"><?php
								$f3 =$sr - $csr;
								if($f3 <=0 )
									{	$f3 = "NO ROOMS AVAILABLE";
										echo $f3;
									}
									else{
											echo $f3."  ROOMS AVAILABLE";
									}

								?> </button></center></td> 
							</tr>
							<tr>
								<td><b>Deluxe Room</b>	 </td>
								<td><center><button type="button" class="btn btn-primary btn-circle"><?php 
								
								$f4 =$dr - $cdr; 
								if($f4 <=0 )
									{	$f4 = "NO ROOMS AVAILABLE";
										echo $f4;
									}
									else{
											echo $f4."  ROOMS AVAILABLE";
									}
								?> </button></center></td> 
							</tr>
							<tr>
								<td><b>Total Rooms	</b> </td>
								<td> <center><button type="button" class="btn btn-danger btn-circle"><?php 
								
								$f5 =$r-$cr; 
								if($f5 <=0 )
									{	$f5 = "NO ROOMS AVAILABLE";
										echo $f5;
									}
									else{
											echo $f5."  ROOMS AVAILABLE";
									}
								 ?> </button></center></td> 
							</tr>
						</table>
						
						
						
                        
						
						</div>
                        <div class="panel-footer">

                        <br><br><br>

                        <button class="button">
  <a href = "reservation.php" style="color:white">
    Reservation Form
  </a>
</button>
</center>


                       
</body>
</html>