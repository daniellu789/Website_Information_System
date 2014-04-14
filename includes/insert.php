<?php
require_once("connection.php");
?>
<?php
$username = htmlspecialchars(trim($_POST['username']));   
$password = htmlspecialchars(trim($_POST['password']));  
$lastname = htmlspecialchars(trim($_POST['lastname']));
$firstname = htmlspecialchars(trim($_POST['firstname']));
$gender = htmlspecialchars(trim($_POST['gender']));
$email = htmlspecialchars(trim($_POST['email'])); 


$query=mysql_query("insert into customer_beta(UserId,psw,lastname,firstname,Gender,Email)values('$username','$password','$lastname','$firstname','$gender','$email')");   
if($query) {echo 1; }  
else {echo "insert into customer_beta(UserId,psw,lastname,firstname,Gender,Email)values('$username','$password','$lastname','$firstname','$gender','$email')";}
?>

<?php
//5. close connection
if(isset($connection)){
    mysql_close($connection);
    }

?>
     