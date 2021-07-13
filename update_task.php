<?php 
session_start();

include("dbcon/dbcon.php");



$EDIT_POST = $_GET['id'];

$read = "SELECT * FROM users_task where id = $EDIT_POST ";

$access = mysqli_query($con,$read);
while($row = mysqli_fetch_array($access)){
$id = $row['id'];
$taskd = $row['list_task'];
$date = $row['create_at'];

}
 	
if(isset($_POST["send"])){
		
$task_upd = strip_tags($_POST['upd']); 
$update = "UPDATE users_task SET list_task ='$task_upd' WHERE id ='$EDIT_POST'";

$read = mysqli_query($con,$update);


if($read){
 echo"<script>alert('TASK UPDATED')</script>";
 
header("location:task.php");	
	
}else{
	echo "<script>alert('Update failed try again! ')</script>";

}
 
}
 

 ?>
 <center>
 <form action="#" method="post">

UPDATE TASK<br><br><hr>
<textarea rows='10' cols='35' name="upd" ><?php echo $taskd ;?></textarea><br><input type="Submit" value="UPDATE" name="send" style="color:white;background-color:navy;">

</form><br><br>

</center>