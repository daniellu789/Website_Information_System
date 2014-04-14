<?php

session_start();


require_once ('includes/connection.php');

$action = $_GET['action'];
if ($action == 'login') {  //登录
    $user = stripslashes(trim($_POST['user']));
	$pass = stripslashes(trim($_POST['pass']));
	if (empty ($user)) {
		echo 'ID不能为空';
		exit;
	}
	if (empty ($pass)) {
		echo 'Password不能为空';
		exit;
	}
	//$md5pass = md5($pass);
	$query = mysql_query("select * from volunteer_beta where volunteerId='$user'");

	$us = is_array($row = mysql_fetch_array($query));

	$ps = $us ? $pass == $row['psw'] : FALSE;
	if ($ps) {
		$_SESSION['user'] = $row['volunteerId'];
		//$arr['msg'] = '登录成功！';
		//echo '1';exit;
		$arr['success'] = 1;
		$arr['msg'] = '登录成功！';
		$arr['user'] = $_SESSION['user'];
		//$arr['login_time'] = date('Y-m-d H:i:s',$_SESSION['login_time']);
		//$arr['login_counts'] = $_SESSION['login_counts'];
		
		
	} else {
		$arr['success'] = 0;
	    $arr['msg'] = 'ID或Password错误！';
	}
	echo json_encode($arr);
}
elseif ($action == 'logout') {  //退出
	unset($_SESSION);
	session_destroy();
	echo '1';
}

?>
