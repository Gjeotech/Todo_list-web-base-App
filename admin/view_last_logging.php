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
<img src="../image/home.PNG" style="width:50px;height:30px"><a href="view_users.php" style="text-decoration:none">BACK</a></img>
<h3>VIEW THE LAST TIME LOGGING BY USER </h3>

<table class="css-serial">
  <thead>
    <tr>
	
      <th><h5 style="color:navy">S/N</h5></th>
      <th><h5 style="color:navy">USER NAME</h5></th>
      <th><h5 style="color:navy">LAST LOGGING TIME</h5></th>
    </tr>
  </thead>
  <tbody>
  <?php
  
session_start();
include("../dbcon/dbcon.php");



$get_id = $_GET['logid'];


$slect_time_log = "SELECT * FROM last_login_time where u_id ='$get_id' ";
$analyse = mysqli_query($con,$slect_time_log);
while($row = mysqli_fetch_array($analyse)){
$id = $row['id'];
$user_name = $row['username'];
$log_tim = $row['login_time'];


	
  echo"
  <tr>
  
                  <td><h5></h5></td>
				  				   
				   <td style='text-align:center'><h5>$user_name</h5> </td>
				   				   
				  <td style='text-align:center'><h5>$log_tim</h5> </td>
				  
				  
    </tr>
	";
}

	?>
  </tbody>
</table>

</body>
</html>
