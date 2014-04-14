

<?php
require_once("includes/Connection_pickup.php");
?>

<?php
$user_name =$_GET['user_name'];  
$myArray = $_REQUEST['vrequestdata'];

$query=mysql_query("SELECT ID,lastname,firstname,gender,email,telephone FROM volunteer_beta WHERE username='$user_name' ");  

$row = mysql_fetch_array($query);
  $vid = $row['ID'];
  $vlastname = $row['lastname'];
  $vfirstname = $row['firstname'];
  $vgender = $row['gender'];
  $vemail = $row['email'];
  $vtel = $row['telephone'];

for($i = 0; $i < count($myArray); $i++)
{
	$query3 = mysql_query("SELECT * FROM application_beta WHERE vid = '$vid' AND newcomerid = '$myArray[$i]'");
	$line=mysql_num_rows($query3);
	if($line<>0){
		echo "抱歉，您已经选择ID号为 ".$myArray[$i]."的新生\n";
	}else{
	$query2 = mysql_query("INSERT INTO application_beta(vid,vlastname,vfirstname,vgender,vemail,vtel,newcomerid,submittime,status) values('$vid','$vlastname','$vfirstname','$vgender','$vemail','$vtel','$myArray[$i]',now(),'2')");
	echo "恭喜，您成功申请ID号为 ".$myArray[$i]."的新生\n";
	}
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
