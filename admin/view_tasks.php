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
      <th><h5 style="color:navy">TASK TAG</h5></th>
      <th><h5 style="color:navy">DATE</h5></th>
    </tr>
  </thead>
  <tbody>
  <?php
  
session_start();
include("../dbcon/dbcon.php");



$get_id = $_GET['ut'];


$read = "SELECT * FROM task where usa_id = $get_id";

$access = mysqli_query($con,$read);
while($row = mysqli_fetch_array($access)){
	$id = $row['id'];
	$taskd = $row['todo_list_task'];
	$date = $row['creat_at'];
	


	
  echo"
  <tr>
  
                  <td><h5></h5></td>
				  				   
				   <td style='text-align:center'><h5>$taskd</h5> </td>
				   				   
				  <td style='text-align:center'><h5>$date</h5> </td>
				  
				  
    </tr>
	";
}

	?>
  </tbody>
</table>

</body>
</html>
