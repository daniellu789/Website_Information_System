
<?php
require_once("includes/Connection_pickup.php");
?>
<?php



//$query=mysql_query("insert into customer_beta(UserId,psw,Name,Gender,Email)values('ccc','ddda','asd','1','asf')");  

//echo "UPDATE customer_beta SET ";   


$return_arr = array();

$fetch = mysql_query("SELECT * FROM customer_beta WHERE PickupID is NULL "); 

while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
    $row_array['ID'] = $row['ID'];
    $row_array['name'] = $row['lastname']." ".$row['firstname'];
    if($row['Gender']==0)
    {
        $row_array['Gender']="Male";
    }
    else
    {
         $row_array['Gender'] ="Female";
    }
    $row_array['Email'] = $row['Email'];
    //$row_array['QQ'] = $row['QQ'];
    //$row_array['Telephone'] = $row['Telephone'];
    //$row_array['PreviousSchool'] = $row['PreviousSchool'];
    //$row_array['hometown'] = $row['hometown'];
    //$row_array['Major'] = $row['Major'];
    //$row_array['Status'] = $row['Status'];
    //$row_array['leave_1'] = $row['leave_1'];
    //$row_array['leave_airport_1'] = $row['leave_airport_1'];
    $row_array['arrive_5'] = $row['arrive_5'];
    $row_array['arrive_airport_5'] = $row['arrive_airport_5'];
    //$row_array['LugBag'] = $row['LugBag'];
    //$row_array['LugBox'] = $row['LugBox'];
    //$row_array['LugBin'] = $row['LugBin'];
    $row_array['FamilyMember'] = $row['FamilyMember'];
    if($row['NeedTemp']==0)
    {
        $row_array['NeedTemp']="否";
    }
    else
    {
         $row_array['NeedTemp'] ="是";
    }
    $row_array['otherneed'] = $row['otherneed'];
    $row_array['PickupID'] = $row['PickupID'];
  

    array_push($return_arr,$row_array);
}

echo "{ \"aaData\": ".json_encode($return_arr)."}";
?>

<?php
//5. close connection
if(isset($connection)){
    mysql_close($connection);
    }

?>
     

