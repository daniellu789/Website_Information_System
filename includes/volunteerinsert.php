<?php
require_once("connection.php");
?>
<?php
$username = htmlspecialchars(trim($_POST['username']));   
$password = htmlspecialchars(trim($_POST['password']));  
$name = htmlspecialchars(trim($_POST['name']));
$gender = htmlspecialchars(trim($_POST['gender']));
$email = htmlspecialchars(trim($_POST['email'])); 


$query=mysql_query("insert into volunteer_beta(volunteerId,psw,Name,Gender,Email)values('$username','$password','$name','$gender','$email')");   
if($query) {echo 1; echo "insert into volunteer_beta(volunteerId,psw,Name,Gender,Email)values('$username','$password','$name','$gender','$email')";}  
else {echo "insert into volunteer_beta(volunteerId,psw,Name,Gender,Email)values('$username','$password','$name','$gender','$email')";}
?>

<?php
//5. close connection
if(isset($connection)){
    mysql_close($connection);
    }

?>
     