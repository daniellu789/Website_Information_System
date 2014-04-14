

<?php
require_once("includes/Connection_pickup.php");
?>

<?php


$user_name =$_GET['user_name'];  

$query1=mysql_query("SELECT PickupID FROM customer_beta WHERE UserId='$user_name'");
//echo "SELECT PickupID FROM customer_beta WHERE username='$user_name'";



$return_arr=array();
$PickupID=-1;
while($row = mysql_fetch_assoc($query1)) {
    $PickupID=$row['PickupID'];
}


//echo "pickupid: $PickupID";
if(($PickupID==-1) || ($PickupID==""))
{
    echo "[\"No Volunteer right now\",\"\",\"\",\"\",\"\",\"\"]" ;
}
else
{
    $query2=mysql_query("SELECT v.ID,v.lastname,v.firstname,v.gender,v.email,v.telephone FROM volunteer_beta AS v, customer_beta as c WHERE c.PickupID=v.ID AND c.UserId='$user_name'" );
/*
    while($row = mysql_fetch_assoc($query2)) {
     $row_array['vid']=$row['ID'];
     $row_array['vname']=$row['lastname']." ".$row['firstname'];
     if($row['gender']=="1")
     {
        $row_array['vgender']="Female";
     }
     else
     {
        $row_array['vgender']="Male";
     }
     
     $row_array['vemail']=$row['email'];
     $row_array['vtel']=$row['telephone'];

     array_push($return_arr,$row_array);
    }   
*/
          $array = mysql_fetch_row($query2);  
          echo json_encode($array); 
}


//echo "{ \"aaData\": ".json_encode($return_arr)."}";


?>


<?php
//5. close connection
if(isset($connection)){
    mysql_close($connection);
    }

?>
