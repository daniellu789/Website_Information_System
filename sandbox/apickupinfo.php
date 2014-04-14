<?php
require_once("includes/Connection_pickup.php");
?>

<?php

$user_name =$_GET['user_name'];   
$query=mysql_query("SELECT * FROM admin_beta WHERE username = '$user_name'");  
$line = mysql_num_rows($query);

if($line<>1){
          echo "1";
}
else{
          $array = mysql_fetch_row($query);  
          echo json_encode($array);
}

?>

<?php
//5. close connection
if(isset($connection)){
    mysql_close($connection);
    }

?>
