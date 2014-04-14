

<?php
require_once("includes/Connection_pickup.php");
?>

<?php


$user_name =$_GET['user_name'];  
$myArray = $_REQUEST['arequestdata'];

$cid=$myArray[0];

//trash_customer_beta
$query1=mysql_query("UPDATE customer_beta SET admin='$user_name' WHERE ID=$cid");
$query2=mysql_query("INSERT INTO trash_customer_beta SELECT * FROM customer_beta WHERE ID=$cid");
$query3=mysql_query("DELETE FROM customer_beta WHERE ID=$cid");


$vid='dummy';

$query5=mysql_query("SELECT vid FROM application_beta WHERE status='1' AND newcomerid=$cid ");
//echo "SELECT vid FROM application_beta WHERE status='1' AND newcomerid=$cid ";
while($row = mysql_fetch_assoc($query5)) {
    $vid=$row['vid'];
}
echo "vid: $vid";
if($vid!='dummy')
{
    $vidint=(int)$vid;
    $query6=mysql_query("SELECT approvednum FROM volunteer_beta WHERE ID=$vidint");

    while($row = mysql_fetch_assoc($query6)) {
    $approvednum=$row['approvednum'];
    }
    $approvednum=$approvednum-1;

    $query7=mysql_query("UPDATE volunteer_beta SET approvednum=$approvednum, admin='$user_name' WHERE ID=$vidint");
    echo "UPDATE volunteer_beta SET approvednum=$approvednum, admin='$user_name' WHERE ID=$vidint";

}
$query11=mysql_query("UPDATE application_beta SET status='0' WHERE newcomerid=$cid");
echo "成功删除了ID号为:"."$myArray[0]"."新生账号";
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
