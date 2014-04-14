

<?php
require_once("includes/Connection_pickup.php");
?>

<?php


$user_name =$_GET['user_name'];  
$myArray = $_REQUEST['arequestdata'];

$cid=(int)$myArray[0];

$query1=mysql_query("UPDATE customer_beta SET PickupID=null, admin='$user_name' WHERE ID=$cid");
//echo "UPDATE customer_beta SET PickupID=null, admin='$user_name' WHERE ID=$cid\n";
$query2=mysql_query("SELECT vid FROM application_beta WHERE newcomerid=$cid AND status='1'");

$vid='dummy';

while($row = mysql_fetch_assoc($query2)) {
    $vid=$row['vid'];
}
if($vid!='dummy')
{
    $vidint=(int)$vid;
    $query3=mysql_query("SELECT approvednum FROM volunteer_beta WHERE ID=$vidint");

    while($row = mysql_fetch_assoc($query3)) {
    $approvednum=$row['approvednum'];
    }
    $approvednum=$approvednum-1;
    $query4=mysql_query("UPDATE volunteer_beta SET approvednum=$approvednum, admin='$user_name' WHERE ID=$vidint");


}

$query5=mysql_query("UPDATE application_beta SET status='2', admin='$user_name' WHERE newcomerid=$cid");


$query6=mysql_query("DELETE FROM application_beta WHERE newcomerid=$cid AND vid='$vid'");




echo "成功重新分配了ID为:"."$myArray[0]"."新生";


?>


<?php
//5. close connection
if(isset($connection)){
    mysql_close($connection);
    }

?>
