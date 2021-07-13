<?php
session_start();

include("dbcon/dbcon.php");

$read = "SELECT * FROM users ";
$access = mysqli_query($con,$read);
while($row = mysqli_fetch_array($access)){
$date = $row['created_at']; #.date(":a")
}


$secondsWait = 2;

$name_error = "Sorry... username already Exist in the database";
$pw_error = "Sorry... password not strog enough"; 

if(isset($_POST["send"])){

$uname = strip_tags($_POST['un']);
$pword = strip_tags($_POST['pw']);

if(!empty($uname) && !empty($pword )){

$readunam = "SELECT * FROM `users` WHERE user_name ='$uname'"; 
$readpwd = "SELECT * FROM `users` WHERE password ='$pword'";
$res_u = mysqli_query($con,$readunam); 
$res_pw = mysqli_query($con,$readpwd);

if(mysqli_num_rows($res_u) > 0) {
    
 echo "$name_error";

}else if(mysqli_num_rows($res_pw)>0){
    
	echo "$pw_error";

}else{
$insert = "INSERT INTO `users`(`user_name`, `password`, `created_at`) VALUES ('$uname','$pword',CURRENT_TIMESTAMP)";

$run = mysqli_query($con,$insert);


if($run){
	
echo "<div style='width:300px;background-color:#ff0000;color:white;height:80px'>
Account created successfully 
</div>";
echo '<meta http-equiv="refresh" content="'.$secondsWait.'">';

	
}else{
	echo "Not inserted";
}
}
}else{
 echo "All fields are required";   
}

}

?>




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
margin-top:15px;
text-align:center;

	
}

#ades{
text-decoration:none;
color:white;
}

#ades:hover{
text-decoration:none;
color:yellow;
background-color:navy;
width:35px;
heigth:30px;
border-radius:10px;
}

.intp{
width:250px;
height:40px;
color:green;
border-radius:5px;
	
}

#top_header{
margin-top:40px;
background-color:#2b3f7c;
width:403px;
border-top-right-radius:40px;
border-top-left-radius:30px;
color:white;
font-weight:bold;
	
}

#form_div{
background-color:#9900cc;
height:360px;
overflow-x:auto;
width:403px;
border-radius:5px;
	
}	


#app_name{
color:white;
font-weight:bold;
font-size:30px;
text-align:center;
}

#app_name:hover{
color:white;
font-weight:bold;
font-size:30px;
background-color:#336699;
height:40px;
}

#submit_but{
color:white;
background-color:#2b3f7c;
height:40px;
border-radius:5px;
cursor:pointer;	
font-weight:bold;
}

#submit_but:hover{
color:white;
background-color:#9900cc;
height:40px;
border-radius:5px;
cursor:pointer;	
font-weight:bold;
}

</style>

</head>

<body>
<center>
<div id="top_header">
<ul><br>
<li><a href="#reg.php" id="ades"> Register User</a></li> /
<li><a href="login.php" id="ades">Login ToDolist</a></li>
</ul>

<p>Register Below</p>
<marquee direction="right">WELCOME TO TO-DOLIST APP! REGISTER HERE</marquee>
</div>
<div id="form_div">
<div style="width:45%;height:40px;background-color:black">
<p id="app_name">TO DO App</p>
</div><br>
<form id="reg.php" method="post">
UserName:<br><input type="text" name="un" class="intp" placeholder="Enter UserName"><br><br>
Choose Password:<br><input type="password" class="intp" name="pw" placeholder="Enter Your Password"><br><br>
<input type="submit" id="submit_but" name="send" value="Submit"><br>

<b style="color:white;font-weight:bold">Already have an account?</b><a href="login.php" style="text-decoration:none;color:white;font-weight:bold">Login Here</a>


</form>
</div>
</center>









</body>
</html>
