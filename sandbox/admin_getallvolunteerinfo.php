
<?php
require_once("includes/Connection_pickup.php");
?>
<?php



//$query=mysql_query("insert into customer_beta(UserId,psw,Name,Gender,Email)values('ccc','ddda','asd','1','asf')");  

//echo "UPDATE customer_beta SET ";   


$return_arr = array();

$fetch = mysql_query("SELECT * FROM volunteer_beta"); 

while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
    $row_array['ID'] = $row['ID'];
    $row_array['name'] = $row['lastname']." ".$row['firstname'];

    if($row['gender']=="1")
    {
        $row_array['Gender'] = "Female";
    }
    else
    {
        $row_array['Gender'] = "Male";
    }

    $row_array['Email'] = $row['email'];
    $row_array['telephone'] = $row['telephone'];
    if($row['emailornot'] =="1"){
        $row_array['emailornot']="是";
    }
    else if($row['emailornot']==null)
    {
        $row_array['emailornot']="未选择";
    }
    else
    {
        $row_array['emailornot']="否";
    }
    
    if($row['approvednum']=="")
    {
        $row_array['approvednum'] = "0";
    }
    else
    {
        $row_array['approvednum'] = $row['approvednum'];
    }
    

    if($row['helpornot'] =="1"){
        $row_array['helpornot']="是";
    }
    else if($row['helpornot']==null)
    {
        $row_array['helpornot']="未选择";
    }
    else
    {
        $row_array['helpornot']="否";
    }

    $row_array['supplement'] = $row['supplement'];

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
     

