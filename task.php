<?php

session_start();

include("dbcon/dbcon.php");


$id = $_SESSION['id'];
$unames = $_SESSION['user_name'];
$log_date = $_SESSION['created_at'];



$slect_time_log = "SELECT * FROM `last_login_time` WHERE u_id ='$id'";
$analyse = mysqli_query($con,$slect_time_log);
while($row = mysqli_fetch_array($analyse)){
$log_tim = $row['login_time']; #.date("a")
}

$read = "SELECT * FROM users where id = '$id' ";

$access = mysqli_query($con,$read);
while($row = mysqli_fetch_array($access)){
$id = $row['id'];
$fusa_name = $row['user_name'];
$usa_pword = $row['password'];
}

//$date = date("M:D:Y h:i:sa");

//public function DisplayBalance


$secondsWait = '';


if(isset($_POST["send"])){

$todo = strip_tags($_POST['td']);

if(!empty($todo)){

$insert = "INSERT INTO `users_task`(`usa_id`, `list_task`, `create_at`) VALUES('$id','$todo',CURRENT_TIMESTAMP)";


$run = mysqli_query($con,$insert);
if($run){
	
echo "<div id='des'><br><br><br><br>

<center style='font-size:20px'>Task Created Successfully</center>
<a href='task.php' class='ok'>OK</a>
</div>";
echo '<meta http-equiv="refresh" content="'.$secondsWait.'">';
	
}else{
	echo "Not inserted";
}
}else{
 echo"<p style='color:brown'>Filed is empty, please fill the input</p> ";
}
}
?>
<center>
<div>

</div>
</center>


<!doctype html>
<html>
<head>
<style>
#des{
position:absolute;
top:48%;
left:50%;
transform:translateX(-50%)translateY(-50%);
width:400px;
color:navy;
height:200px

}

.ok{
background-color:navy;
color:white;
font-weight:bold;
text-decoration:none;
position:absolute;
top:33%;
left:50%;
transform:translateX(-25%)translateY(-25%);
}

#intp{
width:250px;
height:40px;
border-radius:5px;	

	
}


.form_div{
background-color:#00ffff;
height:400px;
overflow-x:auto;
width:400px;	
border-radius:2px;
	
}

#top_header{
background-color: #336699;
width:400px;
border-top-right-radius:40px;
border-top-left-radius:30px;
height:auto;
color:white;
font-weight:bold;	
	
}

#submit_but{
color:white;
background-color:#336699;
height:40px;
border-radius:5px;
cursor:pointer;	
font-weight:bold;
}

#submit_but:hover{
color:white;
background-color:#00ffff;
height:40px;
border-radius:5px;
cursor:pointer;	
font-weight:bold;
}

#app_name{
color:white;
font-weight:bold;
font-size:30px;
text-align:center;
}

#app_name:hover{
color:navy;
font-weight:bold;
font-size:30px;
background-color:#336699;
height:40px;
}


.loader1{
border:16px solid #f3f3f3; /*light grey*/
border-top:16px solid #3498db; /*blue*/
border-radius:50%;
width:30px;
height:30px;
animation:spin 5s linear;
infinite;
-webkit-animation:spin 5s infinite linear;
-moz-animation:spin 5s infinite linear;
-ms-animation:spin 5s infinite linear;
-o-animation:spin 5s infinite linear;
}
.loader1{
border-top:8px solid blue;
border-right:8px solid #00ffff;
border-left:8px solid black;
border-bottom:8px solid gray;


@keyframes spin{
100%{transform: rotate(360deg);}

</style>

<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
</head>
<center>

<div id="top_header">
<div class="loader1"></div>
<?php

include("welcome.php"); 

$day = date("D");
if($day == 'Fri'){
echo "Have a nice weekend";
}else{ 
echo greetings(); 
}
?>
<p><?php echo $unames ;?>, You Can Now Add your tasks</p>You Logged in @<b><?php echo $log_tim ;?>
</div>
</b>

<body>
<div class="form_div">
<img src="image/home.PNG" style="width:50px;height:30px"><a href="logout.php" style="text-decoration:none">Logout</a></img>
<div style="width:45%;height:40px;background-color:black">
<p id="app_name">TO DO App</p>
</div><br>
<form action="#" method="post" class="form">
<br>
<input type="text" name="td" id='intp'><input type="Submit" value="AddTask" name="send" id="submit_but">

</form><br><br><hr>

<?php

$read = "SELECT * FROM users_task where usa_id = $id order by 1 desc ";

$access = mysqli_query($con,$read);
while($row = mysqli_fetch_array($access)){
	$id = $row['id'];
	$taskd = $row['list_task'];
	$date = $row['create_at'];
	
	if(!empty($taskd)){
   
		echo"
		
		<div style='width:300px;color:black;font-weight:bold;height:120px;overflow-x:auto'>
		$taskd<br><br><br><br>
		<div style='width:60px;height:auto;border-radius:10px'><a href='deletetask.php?id=$id' style='text-decoration:none;color:white;background-color:brown;margin-right:10px;border-radius:10px'>Delete</a><a href='update_task.php?id=$id' style='text-decoration:none;color:white;background-color:green;border-radius:10px'>Update</a></div>
		</div><p><hr>
		";
	}else{
		echo"
		<div style='color:red;background-color:green;width:300px;height:70px'>YOU DONT HAVE ANY RUNNING TASK YET!</div>
		";	
	}
	
}

?>

</div>
</center>


</body>
</html>