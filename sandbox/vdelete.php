

<?php
require_once("includes/Connection_pickup.php");
?>

<?php
$user_name =$_GET['user_name'];  
$myArray = $_REQUEST['vrequestdata'];

$query=mysql_query("SELECT ID,lastname,firstname,gender,email,telephone FROM volunteer_beta WHERE username='$user_name' ");  

$row = mysql_fetch_array($query);
  $vid = $row['ID'];


for($i = 0; $i < count($myArray); $i++)
{
	$query3 = mysql_query("DELETE FROM application_beta WHERE vid = '$vid' AND newcomerid = '$myArray[$i]'");
	echo "恭喜，您已成功取消了ID号为".$myArray[$i]."的新生申请\n";



}


//echo "INSERT INTO application_beta(vid,vlastname,vfirstname,vgender,vemail,vtel,newcomerid,submittime,status) values('$vid','$vlastname','$vfirstname','$vgender','$vemail','$vtel','$myArray[0]',now(),'2')";

//echo $user_name.count($myArray);

?>


<?php
//5. close connection
if(isset($connection)){
    mysql_close($connection);
    }

?>
