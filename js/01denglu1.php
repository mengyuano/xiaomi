<?php
//  获取传递过来的参数
$user = $_POST['user'];
$pswd = $_POST['pswd'];
$is_checked = $_POST['is_checked'];
//  数据库查询语句
$sql = "SELECT * FROM user WHERE user='$user' AND password='$pswd'";
$res = getone($sql);
if($res){
	//  验证正确
	$arr['status'] = 1;
	$arr['info'] = "√帐号密码正确";
	//  开启session存储
	session_start();
	$_SESSION['username']=$res['username'];
	$_SESSION['uid'] = $res['id'];
	$arr['nmnm'] = $_SESSION['username'];
	$arr['idid'] = $_SESSION['uid'];
	if($is_checked=="true"){
		setcookie("username",$res['username'],time()+60*60*24);
		setcookie("uid",$res['id'],time()+60*60*24);
	}
}else{
	//  帐号密码错误，不做操作
	$arr['status'] = 2;
	$arr['info'] = "*密码不正确";
}

//  将数据打包成json包发送前台
echo json_encode($arr);


function getone($sql){
	@mysql_connect("localhost","root","root") or die("数据连接失败");
	mysql_select_db("shopping");
	mysql_query("set names utf8");
	$res = mysql_query($sql);
	$one = mysql_fetch_assoc($res);
	if($one){
		return $one;
	}else{
		return false;
	}	
}
?>