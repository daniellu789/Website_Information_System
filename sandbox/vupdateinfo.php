<?php
session_start();
?>
<?php
require_once("includes/Connection_pickup.php");
?>
<?php
$emailornot = htmlspecialchars(trim($_POST['vemailornot'])); 
$helpornot = htmlspecialchars(trim($_POST['vhelpornot'])); 
$hometown = htmlspecialchars(trim($_POST['vhometwon'])); 
$PreviousSchool = htmlspecialchars(trim($_POST['vPreviousSchool'])); 
$supplement = htmlspecialchars(trim($_POST['vsupplement'])); 



//$query=mysql_query("insert into customer_beta(UserId,psw,Name,Gender,Email)values('ccc','ddda','asd','1','asf')");  

//echo "UPDATE customer_beta SET ";   
$UserId = $_SESSION['user'];
$query=mysql_query("UPDATE volunteer_beta SET emailornot='$emailornot',helpornot='$helpornot',hometown='$hometown',PreviousSchool='$PreviousSchool',supplement='$supplement' WHERE username = '$UserId'");   
 //echo "UPDATE volunteer_beta SET emailornot='$emailornot' WHERE username = '$UserId'";
if($query) {echo 1;}  
else {echo "Save失败";}
?>

<?php
//5. close connection
if(isset($connection)){
    mysql_close($connection);
    }

?>
     

