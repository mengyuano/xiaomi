<?php
$id = $_POST['id'];
session_start();

if(!empty($_SESSION['username'])){
	$uid = $_SESSION['uid'];
	$sql1 = "SELECT * FROM commodity WHERE id=$id";
	$res1 = getone($sql1);
	$money = $res1['money'];
	$sql = "SELECT * FROM car WHERE uid=$uid AND commodityid=$id";
	$res = getone($sql);
	//print_r($res);
	if($res){
		$num = $res['num']+1;
		$sql = "UPDATE car SET num=$num WHERE commodityid=$id";
		$res = add($sql);
		if($res){
			$arr['status'] = 1;
			$arr['info'] = "√添加购物车成功,请去购物车查看";
		}else{
			$arr['status'] = 2;
			$arr['info'] = "*添加购物车失败，请重新添加";
		}
	}else{
		$sql = "INSERT INTO car (uid,commodityid,num,money) VALUES ($uid,$id,1,'$money')";
		$res = add($sql);
		if($res){
			$arr['status'] = 1;
			$arr['info'] = "√添加购物车成功,请去购物车查看";
		}else{
			$arr['status'] = 2;
			$arr['info'] = "*添加购物车失败，请重新添加";
		}
	}
	
}else{
	$arr = "请登录";
}


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




function add($sql){
	$res = mysql_connect("localhost","root","root") ;
	 mysql_select_db("bookname");
	mysql_query("set names utf8");
	$reslut = mysql_query($sql);
	if($reslut){
		return true;
	}else{
		return false;
	}
}
?>

