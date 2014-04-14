<?php
session_start();
?>
<?php
require_once("includes/Connection_pickup.php");
?>
<?php
$flightno_1 = htmlspecialchars(trim($_POST['flightno_1'])); 
$flightno_2 = htmlspecialchars(trim($_POST['flightno_2'])); 
$flightno_3 = htmlspecialchars(trim($_POST['flightno_3'])); 
$flightno_4 = htmlspecialchars(trim($_POST['flightno_4'])); 
$flightno_5 = htmlspecialchars(trim($_POST['flightno_5'])); 
$leave_1 = htmlspecialchars(trim($_POST['leave_1'])); //leave time
$leave_2 = htmlspecialchars(trim($_POST['leave_2'])); 
$leave_3 = htmlspecialchars(trim($_POST['leave_3'])); 
$leave_4 = htmlspecialchars(trim($_POST['leave_4'])); 
$leave_5 = htmlspecialchars(trim($_POST['leave_5'])); 
$leave_city_1 = htmlspecialchars(trim($_POST['leave_city_1'])); 
$leave_city_2 = htmlspecialchars(trim($_POST['leave_city_2'])); 
$leave_city_3 = htmlspecialchars(trim($_POST['leave_city_3'])); 
$leave_city_4 = htmlspecialchars(trim($_POST['leave_city_4'])); 
$leave_city_5 = htmlspecialchars(trim($_POST['leave_city_5'])); 
$leave_airport_1 = htmlspecialchars(trim($_POST['leave_airport_1'])); 
$leave_airport_2 = htmlspecialchars(trim($_POST['leave_airport_2'])); 
$leave_airport_3 = htmlspecialchars(trim($_POST['leave_airport_3'])); 
$leave_airport_4 = htmlspecialchars(trim($_POST['leave_airport_4'])); 
$leave_airport_5 = htmlspecialchars(trim($_POST['leave_airport_5'])); 
$arrive_1 = htmlspecialchars(trim($_POST['arrive_1'])); //arrive time
$arrive_2 = htmlspecialchars(trim($_POST['arrive_2'])); 
$arrive_3 = htmlspecialchars(trim($_POST['arrive_3'])); 
$arrive_4 = htmlspecialchars(trim($_POST['arrive_4'])); 
$arrive_5 = htmlspecialchars(trim($_POST['arrive_5'])); 

$arrive_city_1 = htmlspecialchars(trim($_POST['arrive_city_1']));
$arrive_city_2 = htmlspecialchars(trim($_POST['arrive_city_2']));
$arrive_city_3 = htmlspecialchars(trim($_POST['arrive_city_3']));
$arrive_city_4 = htmlspecialchars(trim($_POST['arrive_city_4']));
$arrive_city_5 = htmlspecialchars(trim($_POST['arrive_city_5']));

$arrive_airport_1 = htmlspecialchars(trim($_POST['arrive_airport_1'])); 
$arrive_airport_2 = htmlspecialchars(trim($_POST['arrive_airport_2'])); 
$arrive_airport_3 = htmlspecialchars(trim($_POST['arrive_airport_3'])); 
$arrive_airport_4 = htmlspecialchars(trim($_POST['arrive_airport_4'])); 
$arrive_airport_5 = htmlspecialchars(trim($_POST['arrive_airport_5'])); 

$UserId = $_SESSION['user'];

$statement = "UPDATE customer_beta SET 
	flightno_1='$flightno_1',
	leave_1='$leave_1',
	leave_city_1='$leave_city_1',
	leave_airport_1='$leave_airport_1',
	arrive_1='$arrive_1',
	arrive_city_1='$arrive_city_1',
	arrive_airport_1='$arrive_airport_1',
	flightno_2='$flightno_2',
	leave_2='$leave_2',
	leave_city_2='$leave_city_2',
	leave_airport_2='$leave_airport_2',
	arrive_2='$arrive_2',
	arrive_city_2='$arrive_city_2',
	arrive_airport_2='$arrive_airport_2',
	flightno_3='$flightno_3',
	leave_3='$leave_3',
	leave_city_3='$leave_city_3',
	leave_airport_3='$leave_airport_3',
	arrive_3='$arrive_3',
	arrive_city_3='$arrive_city_3',
	arrive_airport_3='$arrive_airport_3',
	flightno_4='$flightno_4',
	leave_4='$leave_4',
	leave_city_4='$leave_city_4',
	leave_airport_4='$leave_airport_4',
	arrive_4='$arrive_4',
	arrive_city_4='$arrive_city_4',
	arrive_airport_4='$arrive_airport_4',
	flightno_5='$flightno_5',
	leave_5='$leave_5',
	leave_city_5='$leave_city_5',
	leave_airport_5='$leave_airport_5',
	arrive_5='$arrive_5',
	arrive_city_5='$arrive_city_5',
	arrive_airport_5='$arrive_airport_5' WHERE UserId = '$UserId'";
$query=mysql_query($statement);   

if($query) {echo 1;}  
else {echo "Save失败";echo $statement;}
?>

<?php
//5. close connection
if(isset($connection)){
    mysql_close($connection);
    }

?>
     

