<?php
session_start();
?>
<?php
require_once("includes/Connection_pickup.php");
?>
<?php
$FamilyMember = htmlspecialchars(trim($_POST['FamilyMember'])); 
$LugBag = htmlspecialchars(trim($_POST['LugBag'])); 
$LugBox = htmlspecialchars(trim($_POST['LugBox'])); 
$LugBin = htmlspecialchars(trim($_POST['LugBin'])); 
$NeedTemp = htmlspecialchars(trim($_POST['NeedTemp'])); 
$NeedRoommate = htmlspecialchars(trim($_POST['NeedRoommate'])); 
$TempApart = htmlspecialchars(trim($_POST['TempApart'])); 
$otherneed = htmlspecialchars(trim($_POST['otherneed']));



//$query=mysql_query("insert into customer_beta(UserId,psw,Name,Gender,Email)values('ccc','ddda','asd','1','asf')");  

//echo "UPDATE customer_beta SET ";   
$UserId = $_SESSION['user'];

$query=mysql_query("UPDATE customer_beta SET FamilyMember='$FamilyMember',LugBag='$LugBag',LugBox='$LugBox',LugBin='$LugBin',NeedTemp='$NeedTemp',NeedRoommate='$NeedRoommate',TempApart='$TempApart',otherneed='$otherneed' WHERE UserId = '$UserId'");   

if($query) {echo 1;}  
else {echo "Save失败";}
?>

<?php
//5. close connection
if(isset($connection)){
    mysql_close($connection);
    }


//("FamilyMember","LugBag","LugBox","LugBin","NeedTemp","TempApart","AddTempApart");
?>
     

