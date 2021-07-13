<?php

session_start();

include("dbcon/dbcon.php");

$read = "SELECT * FROM users ";

$access = mysqli_query($con,$read);
while($row = mysqli_fetch_array($access)){
$id = $row['id'];
$fusa_name = $row['user_name'];
$usa_pword = $row['password'];
}
//$created_date = date("D:M:Y h:i:sa");

//date_default_timezone_set('Asia/Jakarta');

$secondsWait = 4;

if(isset($_POST["send"])){

$uname = strip_tags($_POST['un']);
$pword = strip_tags($_POST['pw']);


$login = "SELECT * FROM `users` WHERE user_name ='".mysqli_real_escape_string($con,$uname)."' AND password='".mysqli_real_escape_string($con,$pword)."' ";

$run_it = mysqli_query($con,$login);

$row = mysqli_fetch_array($run_it);

$count = mysqli_num_rows($run_it);


if($count == 1){
	$idd =$row['id'];
	$usaname = $row['user_name'];
	$passwod = $row['password'];
	$date = $row['created_at'];

echo "<script>document.ready(window.setTimeout(location.href ='task.php',1000));</script>";	

$_SESSION['id'] = $idd;
$_SESSION['user_name']= $usaname;
$_SESSION['created_at'] = $date;


$insert_login_time = "INSERT INTO `last_login_time`(`u_id`, `username`, `login_time`) VALUES ('$idd','$uname',CURRENT_TIMESTAMP)";
$run = $con->query($insert_login_time);

}else{
	echo "<div style='width:300px;background-color:#6600ff;color:white;height:80px'>
	Login Detail does not match!
	</div>";
	echo '<meta http-equiv="refresh" content="'.$secondsWait.'">';
	
}


}

?>
<center>
<div>
<?php
/*
include("welcome.php"); 
 
echo greetings(); 

*/
?>
</div>
</center>

<!doctype html>
<html>
<head>
<title>ToDolist Home Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<style>
li{

display:inline;
text-decoration:none;
padding:10px;
color:white;
font-weight:bold;
margin:20px;
margin-top:10px;
text-align:center;

	
}

#ades{
text-decoration:none;
color:white;
}

.intp{
width:250px;
height:40px;
color:green;
border-radius:5px;
	
}


#submit_but{
color:white;
background-color:#260033;
height:40px;
border-radius:5px;
cursor:pointer;	
font-weight:bold;
}

#submit_but:hover{
color:white;
background-color:#600080;
height:40px;
border-radius:5px;
cursor:pointer;	
font-weight:bold;
}

#form_div{
background-color:#600080;
height:360px;
overflow-x:auto;
width:403px;
border-radius:5px;
	
}	

#top_header{
margin-top:40px;
background-color:#260033;
width:403px;
height:40px;
border-top-right-radius:40px;
border-top-left-radius:30px;
color:white;
font-weight:bold;
	
}

#app_name{
color:white;
font-weight:bold;
font-size:30px;
text-align:center;
border-radius:15px;
}

#app_name:hover{
color:white;
font-weight:bold;
font-size:30px;
background-color:#336699;
height:40px;
border-radius:15px;
}

</style>

</head>

<body>
<center>

<div id="top_header">
<ul><br>
<li id="ades">WELCOM TO LOGIN PAGE</li>
</ul>

</div>
<div id="form_div">
<div style="width:45%;height:40px;background-color:black;border-radius:15px">
<p id="app_name">TO DO App</p>
</div><br>
<form id="reg.php" method="post">
<b style="color:white;font-weight:bold">UserName:</b><br><input type="text" name="un" class="intp" placeholder="Enter UserName"><br><br>
<b style="color:white;font-weight:bold">Choose Password:</b><br><input type="password" class="intp" name="pw" placeholder="Enter Your Password"><br><br>
<input type="submit" id="submit_but" name="send" value="Submit"><br><br><br>

<b style="color:white;font-weight:bold">Don't have acct yet?</b><a href="home.php" style="text-decoration:none;text-decoration:none;color:white;font-weight:bold"> Click Register</a>

</form>

</div>
</center>


</body>
</html>
