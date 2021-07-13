
<?php

function greetings(){
 
   if(date("H") < 12){
 
     return "<b>Good morning</b>";
 
   }elseif(date("H") > 11 && date("H") < 18){
 
     return "<b>Good afternoon</b>";
 
   }elseif(date("H") > 17){
 
     return "<b>Good evening</b>";
 
   }
 
} 

?>

<?php
/*
function welcome($H){
 
   if($H < 12){
 
     return "good morning";
 
   }elseif($H > 11 && $H < 18){
 
     return "good afternoon";
 
   }elseif($H > 17){
 
     return "good evening";
 
   }
 
} 

*/
?>