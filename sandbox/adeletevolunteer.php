

<?php
require_once("includes/Connection_pickup.php");
?>

<?php


$user_name =$_GET['user_name'];  
$myArray = $_REQUEST['arequestdata'];
echo "成功删除了ID号为 "."$myArray[0]"." 的志愿者账号";
$vidint=(int)$myArray[0];


$query1=mysql_query("UPDATE volunteer_beta SET admin='$user_name' WHERE ID=$vidint");
$query2=mysql_query("INSERT INTO trash_volunteer_beta SELECT * FROM volunteer_beta WHERE ID=$vidint");
$query3=mysql_query("DELETE FROM volunteer_beta WHERE ID=$vidint");



$query4=mysql_query("SELECT newcomerid FROM application_beta WHERE vid='$vidint' AND status='1'");

$i=0;
$array_newcomeridstring=array();
$array_newcomeridint=array();

while($row = mysql_fetch_assoc($query4)) {
    $array_newcomeridstring[$i]=$row['newcomerid'];
    $array_newcomeridint[$i]=(int)$array_newcomeridstring[$i];
    $i++;
}

if(count($array_newcomeridint)>0)
{

	for($j=0;$j<count($array_newcomeridint);$j++)
	{
		$query5=mysql_query("UPDATE customer_beta SET PickupID=NULL WHERE ID=$array_newcomeridint[$j]");
	}
}

$query6=mysql_query("DELETE FROM application_beta WHERE vid='$vidint'");


/*
$newcomername=$myArray[0];
$vid=$myArray[2];
$vidint=(int)$myArray[2];
$cid=(int)$myArray[3];
echo "$user_name"."$myArray[2]"." "."$myArray[3]";

$query1=mysql_query("UPDATE customer_beta SET PickupID='$vid' WHERE ID=$cid");

$query2=mysql_query("UPDATE application_beta SET status='0' WHERE newcomerid=$cid");

$query3=mysql_query("UPDATE application_beta SET status='1' WHERE vid='$vid' AND newcomerid=$cid");

$query4=mysql_query("SELECT approvednum FROM volunteer_beta WHERE ID=$vidint");

while($row = mysql_fetch_assoc($query4)) {
    $apnumber=$row['approvednum'];
}

$one=1;
echo "previous: $apnumber\n";
$apnumber=$apnumber+1;

$query5=mysql_query("UPDATE volunteer_beta SET approvednum='$apnumber' WHERE ID=$vidint");


echo "分配成功，其他选择 "."$newcomername"." 的志愿者自动设置申请失败$apnumber to $vid";
*/


?>


<?php
//5. close connection
if(isset($connection)){
    mysql_close($connection);
    }

?>
