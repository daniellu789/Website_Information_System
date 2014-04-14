<?php
session_start();
?>
<?php
require_once("includes/Connection_pickup.php");
?>
<?php
$QQ = htmlspecialchars(trim($_POST['QQ'])); 
$TEL = htmlspecialchars(trim($_POST['TEL'])); 
$PreviousSchool = htmlspecialchars(trim($_POST['PreviousSchool'])); 
$CurrentCity = htmlspecialchars(trim($_POST['CurrentCity'])); 
$hometown = htmlspecialchars(trim($_POST['hometown'])); 
$major = htmlspecialchars(trim($_POST['major'])); 
$status = htmlspecialchars(trim($_POST['status'])); 


//$query=mysql_query("insert into customer_beta(UserId,psw,Name,Gender,Email)values('ccc','ddda','asd','1','asf')");  

//echo "UPDATE customer_beta SET ";   
$UserId = $_SESSION['user'];
$query=mysql_query("UPDATE customer_beta SET QQ='$QQ',Telephone='$TEL',PreviousSchool='$PreviousSchool',CurrentCity='$CurrentCity',hometown='$hometown',Major='$major',Status='$status' WHERE UserId = '$UserId'");   

if($query) {echo 1;}  
else {echo "Save失败";}
?>

<?php
//5. close connection
if(isset($connection)){
    mysql_close($connection);
    }

?>
     

