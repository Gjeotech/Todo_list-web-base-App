<?php
include("dbcon/dbcon.php");

$get_it = $_GET['id'];

$del = "DELETE FROM `users_task` WHERE id = $get_it ";

$run = mysqli_query($con,$del);
if($run){
	
header("location:task.php");
	
}else{
	echo"Delete Data Failed";
}



?>