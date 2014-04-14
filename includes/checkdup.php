<?php
require_once("connection.php");
?>
<?php
 $user_name  = $_GET['user_name']; 
//$user_name = htmlspecialchars(trim($_POST['user_name']));   


$query=mysql_query("SELECT UserId FROM customer_beta WHERE UserID = '$user_name'");  
$line = mysql_num_rows($query);

if($line<>0){
          echo "1";
}
else{
          echo "0";
}

?>

<?php
//5. close connection
if(isset($connection)){
    mysql_close($connection);
    }

?>
