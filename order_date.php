<?php
include("dbcon/dbcon.php");


if(isset($_POST['sEd'])){
$edod = $_POST['edod'];
$qry ="INSERT INTO `p_orders`(`id`, `exp_DoD`) VALUES ('','$edod ')";
$run = mysqli_query($con, $qry);
echo '<script>window.location="order_date.php";</script>';
}

?>

<form action='' method='POST'>
<input type='date' name='edod'  required/ style='float: left; width: 10%;'>
<button type='submit' name='sEd' title='UPDATE' style='float: left;'><img src='fa fa-refresh.png' style='width:15px;height:18px' title='Refresh'></button>
</form>

