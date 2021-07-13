<!doctypehtml>
<html>
<head>
<style>
th,td {
    border: 1px solid green;
	text-align:center;
}




#dex{
	
	width:250px;
	height:30px;
	
}



</style>
<style>
.css-serial {
counter-reset: serial-number;   /* Set the serial number counter to 0 */
  font-size:20px
  
}

.css-serial td:first-child:before {
counter-increment: serial-number;   /* Increment the serial number counter */
content: counter(serial-number);   /* Display the counter */
}


</style>



</head>
<body>

<img src="../image/home.PNG" style="width:50px;height:30px"><a href="home.php" style="text-decoration:none">HOME</a></img>
<h3>VIEW USERS DETAILS</h3>

<table class="css-serial">
  <thead>
    <tr>
	
      <th><h5 style="color:navy">S/N</h5></th>
      <th><h5 style="color:navy">USER NAME</h5></th>
      <th><h5 style="color:navy">PASSWORD</h5></th>
      <th><h5 style="color:navy">DATE</h5></th>
      <th><h5 style="color:navy">CHECK LAST LOGGING</h5></th>
    </tr>
  </thead>
  <tbody>
  <?php
  
session_start();
include("../dbcon/dbcon.php");
					
			
$slect_time_log = "SELECT * FROM last_login_time";
$analyse = mysqli_query($con,$slect_time_log);
while($row = mysqli_fetch_array($analyse)){
$log_tim = $row['login_time'];
}

		 
$read = "SELECT * FROM users"; 

$run = mysqli_query($con,$read);
while($row = mysqli_fetch_array($run)){
	
	$id =$row['id'];
	$uname = $row['user_name'];
	$pword= $row['password'];
	$date = $row['created_at'];
	
	
  echo"
  <tr>
  
                  <td><h5></h5></td>
				  				   
				   <td style='text-align:center'><h5>$uname</h5> </td>
				   
				  <td style='text-align:center'><h5>$pword</h5> </td>
				  
				   
				  <td style='text-align:center'><h5>$date</h5> </td>
				  
				  <td style='text-align:center'><a href='view_last_logging.php?logid=$id' style='text-decoration:none;color:limegreen'><h5>LAST LOGGING</h5></a></td>
				  
    </tr>
	";
}

	?>
  </tbody>
</table>

</body>
</html>
