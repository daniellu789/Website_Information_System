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
$telephone = htmlspecialchars(trim($_POST['telephone'])); 


$query=mysql_query("insert into volunteer_beta(username,psw,lastname,firstname,gender,email,telephone)values('$username','$password','$lastname','$firstname','$gender','$email','$telephone')");   
if($query) {echo 1; }  
else {echo "values('$username','$password','$lastname','$firstname','$gender','$email','$telephone')";}
?>

<?php
//5. close connection
if(isset($connection)){
    mysql_close($connection);
    }

?>
     