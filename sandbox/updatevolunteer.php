<?php
session_start();
?>
<?php
require_once("includes/Connection_pickup.php");
?>
<?php
$Telephone = htmlspecialchars(trim($_POST['Telephone'])); 
$outofgnv = htmlspecialchars(trim($_POST['outofgnv'])); 
$Time = htmlspecialchars(trim($_POST['Time'])); 


//$query=mysql_query("insert into customer_beta(UserId,psw,Name,Gender,Email)values('ccc','ddda','asd','1','asf')");  

//echo "UPDATE customer_beta SET ";   
$UserId = $_SESSION['user'];
$query=mysql_query("UPDATE volunteer_beta SET Telephone='$Telephone',outofgnv='$outofgnv',Time='$Time' WHERE volunteerId = '$UserId'");   


if($query) {echo 1;}  
else {echo "Save失败: UPDATE volunteer_beta SET Telephone='$Telephone',outofgnv='$outofgnv',Time='$Time' WHERE volunteerId = '$UserId'";}
?>

<?php
//5. close connection
if(isset($connection)){
    mysql_close($connection);
    }

?>
     

