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
$invitnumber = htmlspecialchars(trim($_POST['invitnumber'])); 


$query=mysql_query("UPDATE admin_beta SET username='$username',psw='$password',lastname='$lastname',firstname='$firstname',gender='$gender',email='$email' WHERE invitnumber='$invitnumber'");   
$after = $invitnumber.'a……%￥&……%';
mysql_query("UPDATE admin_beta SET invitnumber='$after' WHERE invitnumber='$invitnumber'");
if($query) {echo 1; }  
else {echo "UPDATE admin_beta SET username='$username',psw='$password',lastname='$lastname',firstname='$firstname',gender='$gender',email='$email' WHERE invitnumber='$invitnumber'";}


?>

<?php
//5. close connection
if(isset($connection)){
    mysql_close($connection);
    }

?>
     