

<?php
require_once("includes/Connection_pickup.php");
?>

<?php


$user_name =$_GET['user_name'];  
$myArray = $_REQUEST['arequestdata'];

$cid=(int)$myArray[0];

$query1=mysql_query("UPDATE customer_beta SET PickupID='-1', admin='$user_name' WHERE ID=$cid");
//echo "UPDATE customer_beta SET PickupID=null, admin='$user_name' WHERE ID=$cid\n";
$query2=mysql_query("UPDATE application_beta SET status='0', admin='$user_name' WHERE newcomerid=$cid");
//echo "UPDATE application_beta SET status='0', admin=$user_name WHERE newcomerid='$cid' AND status='1'";

echo "成功取消了ID号为"."$myArray[0]"."新生接机需要";
/*

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

*/



?>


<?php
//5. close connection
if(isset($connection)){
    mysql_close($connection);
    }

?>
