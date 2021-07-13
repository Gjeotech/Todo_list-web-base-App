<?php
include("dbcon/dbcon.php");

$date = date("M:D:Y h:i:sa");

$secondsWait = 5;


if(isset($_POST["send"])){

$todo = $_POST['td'];

$insert = "INSERT INTO `task`(`id`, `todo_list_task`, `creat_at`) VALUES ('','$todo','$date')";

$run = mysqli_query($con,$insert);
if($run){
	
echo "<div style='width:300px;background-color:navy;color:white;height:80px'>
'You submited this successfully ';
</div>";
# this code below will be use as DOS attack , it will continue to send message that can crash the dadabase .
//echo '<script type="text/javascript">location.reload(true);</script>';
	
}else{
	echo "Not inserted";
}
}
?>
<!doctype html>
<html>
<head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
</head>


<body>
<center>
<div style="width:40%;height:40px;background-color:black">
<p style="color:white;font-weight:bold;font-size:30px;text-align:center">TO DO App</p>
</div><br>
<form action="#" method="post">

Add Item<br>
<input type="text" name="td"><input type="Submit" value="Submit" name="send" style="color:white;background-color:navy;">

</form><br><br>

<?php

$read = "SELECT * FROM task ";

$access = mysqli_query($con,$read);
while($row = mysqli_fetch_array($access)){
	$id = $row['id'];
	$taskd = $row['todo_list_task'];
	$date = $row['creat_at'];
	

		echo"
		
		<div style='width:400px;color:black;font-weight:bold;border:1px solid gray'>
		$taskd 
		<div style='width:50px;height:auto;background-color:red;float:right;border-radius:10px'><a href='deletetask.php?id=$id' style='text-decoration:none;color:white'>Delete</a></div>
		</div><p>
		
		";


}

?>


</center>


</body>
</html>