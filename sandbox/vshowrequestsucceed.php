

<?php
require_once("includes/Connection_pickup.php");
?>

<?php

$user_name =$_GET['user_name'];  



$query1=mysql_query("SELECT ID FROM volunteer_beta WHERE username='$user_name'");

while($row = mysql_fetch_assoc($query1)) {
    $vid=$row['ID'];
}
//echo "$vid\n";

$query2=mysql_query("SELECT newcomerid FROM application_beta WHERE vid='$vid' AND status='1'");

$i=0;
$array1=array();
while($row = mysql_fetch_assoc($query2)) {
    $array1[$i]=(int)$row['newcomerid'];
  $i++;
}

//echo "hihi"."$array1[2]"."length".count($array1)."\n";

$return_arr = array();
if(!count($array1)){
    $row_array['ID'] = "Data Unavailable";
    $row_array['lastname'] = "";
    $row_array['gender'] = "";
    $row_array['QQ'] = "";
    $row_array['email'] = "";
    $row_array['PreviousSchool'] = "";
    $row_array['hometown'] = "";
    $row_array['Major'] = "";
    $row_array['flightno_5']="";
    $row_array['arrive_5'] = "";
    $row_array['arrive_airport_5'] = "";
    $row_array['LugBag'] = "";
    $row_array['LugBox'] = "";
    $row_array['LugBin'] = "";
    $row_array['FamilyMember'] = "";
  

    array_push($return_arr,$row_array);

}
else{

  for($j=0; $j<count($array1);$j++)
{
  //echo "$array1[$j]"."\n";

  $fetch = mysql_query("SELECT * FROM customer_beta WHERE ID=$array1[$j] "); 



while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
    $row_array['ID'] = $row['ID'];
    $row_array['lastname'] = $row['lastname']." ".$row['firstname'];
    if($row['Gender'] == "1")
    {
      $row_array['gender'] = "Female";
    }
    else
    {
      $row_array['gender'] = "Male";
    }
    $row_array['QQ'] = $row['QQ'];
    $row_array['email'] = $row['Email'];
    $row_array['PreviousSchool'] = $row['PreviousSchool'];
    $row_array['hometown'] = $row['hometown'];
    $row_array['Major'] = $row['Major'];
    $row_array['flightno_5'] = $row['flightno_5'];
    $row_array['arrive_5'] = $row['arrive_5'];
    $row_array['arrive_airport_5'] = $row['arrive_airport_5'];
    $row_array['LugBag'] = $row['LugBag'];
    $row_array['LugBox'] = $row['LugBox'];
    $row_array['LugBin'] = $row['LugBin'];
    $row_array['FamilyMember'] = $row['FamilyMember'];
  

    array_push($return_arr,$row_array);
}

}
}



echo "{ \"aaData\": ".json_encode($return_arr)."}";







/*
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

*/
//echo "123:::\n".$user_name;
//echo "456";
?>


<?php
//5. close connection
if(isset($connection)){
    mysql_close($connection);
    }

?>
