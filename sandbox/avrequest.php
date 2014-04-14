

<?php
require_once("includes/Connection_pickup.php");
?>

<?php


$user_name =$_GET['user_name'];  

$query1=mysql_query("SELECT ID FROM admin_beta WHERE username='$user_name'");

while($row = mysql_fetch_assoc($query1)) {
    $aid=$row['ID'];
}
//echo "$aid\n";

$query2=mysql_query("SELECT ap.vid, ap.vlastname, ap.vfirstname,ap.vgender,ap.vemail,ap.vtel,v.approvednum,ap.submittime,ap.newcomerid,c.lastname,c.firstname,c.Email,c.arrive_airport_5,c.arrive_5  FROM application_beta as ap, volunteer_beta as v,customer_beta as c WHERE ap.status='2' AND ap.vid=v.ID AND ap.newcomerid=c.ID ORDER BY ap.newcomerid ASC, ap.submittime ASC" );
$query3=mysql_query("SELECT ap.vid, ap.vlastname, ap.vfirstname,ap.vgender,ap.vemail,ap.vtel,v.approvednum,ap.submittime,ap.newcomerid,c.lastname,c.firstname,c.Email,c.arrive_airport_5,c.arrive_5  FROM application_beta as ap, volunteer_beta as v,customer_beta as c WHERE ap.status='2' AND ap.vid=v.ID AND ap.newcomerid=c.ID ORDER BY ap.newcomerid ASC, ap.submittime ASC" );
$return_arr = array();



$i=0;
$array1=array();
while($row = mysql_fetch_assoc($query2)) {
    $array1[$i]=$row['vid'];
  $i++;
}




if(!count($array1)){
     $row_array['vid']="Data Unavailable";
     $row_array['vname']="";
     $row_array['vgender']="";
     $row_array['vemail']="";
     $row_array['vtel']="";
     if($row['approvednum']==NULL)
     {
        $row_array['approvednum'] = "";
     }
     else{
        $row_array['approvednum']="";
     }
     
     $row_array['submittime']="";
     $row_array['ID']="";
     $row_array['cname']="";
     $row_array['Email']="";
     $row_array['arrive_airport_5']="";
     $row_array['arrive_5']="";

     array_push($return_arr,$row_array);
}
else
{


while($row = mysql_fetch_assoc($query3)) {
     $row_array['vid']=$row['vid'];
     $row_array['vname']=$row['vlastname']." ".$row['vfirstname'];
     if($row['vgender']=="1")
     {
        $row_array['vgender']="Female";
     }
     else
     {
        $row_array['vgender']="Male";
     }
     
     $row_array['vemail']=$row['vemail'];
     $row_array['vtel']=$row['vtel'];
     if($row['approvednum']==NULL)
     {
        $row_array['approvednum'] = "0";
     }
     else{
        $row_array['approvednum']=$row['approvednum'];
     }
     
     $row_array['submittime']=$row['submittime'];
     $row_array['ID']=$row['newcomerid'];
     $row_array['cname']=$row['lastname']." ".$row['firstname'];
     $row_array['Email']=$row['Email'];
     $row_array['arrive_airport_5']=$row['arrive_airport_5'];
     $row_array['arrive_5']=$row['arrive_5'];

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
