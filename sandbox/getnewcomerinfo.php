
<?php
require_once("includes/Connection_pickup.php");
?>
<?php



//$query=mysql_query("insert into customer_beta(UserId,psw,Name,Gender,Email)values('ccc','ddda','asd','1','asf')");  

//echo "UPDATE customer_beta SET ";   


$return_arr = array();

$fetch = mysql_query("SELECT * FROM customer_beta WHERE PickupID is NULL ORDER BY arrive_5 DESC"); 
$line = mysql_num_rows($fetch);

if($line == 0)
{
    $row_array['ID'] = "Data Unavailable";
    $row_array['lastname'] = "";
    $row_array['gender'] = "";
    $row_array['PreviousSchool'] = "";
    $row_array['hometown'] = "";
    $row_array['Major'] = "";
    $row_array['arrive_5'] = "";
    $row_array['arrive_airport_5'] = "";
    $row_array['LugBag'] = "";
    $row_array['LugBox'] = "";
    $row_array['LugBin'] = "";
    $row_array['FamilyMember'] = "";

    array_push($return_arr,$row_array);
}
else
{
    while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
    $row_array['ID'] = $row['ID'];
    $row_array['lastname'] = $row['lastname'];
    if($row['Gender'] == "1")
    {
        $row_array['gender'] = "Female";
    }
    else{
        $row_array['gender'] = "Male";
    }
    $row_array['PreviousSchool'] = $row['PreviousSchool'];
    $row_array['hometown'] = $row['hometown'];
    $row_array['Major'] = $row['Major'];
    $row_array['arrive_5'] = $row['arrive_5'];
    $row_array['arrive_airport_5'] = $row['arrive_airport_5'];
    $row_array['LugBag'] = $row['LugBag'];
    $row_array['LugBox'] = $row['LugBox'];
    $row_array['LugBin'] = $row['LugBin'];
    $row_array['FamilyMember'] = $row['FamilyMember'];
  

    array_push($return_arr,$row_array);
}
}



echo "{ \"aaData\": ".json_encode($return_arr)."}";
?>

<?php
//5. close connection
if(isset($connection)){
    mysql_close($connection);
    }

?>
     

