<?php
if(!file_exists("upload/")){
	mkdir("upload/");
}
$nb = mt_rand(1, 1000000);
$imgurl = time().$nb.$_FILES['imgurl']['name'];
$res = move_uploaded_file($_FILES['imgurl']['tmp_name'],'upload/'.$imgurl);
if($res){
	$arr['imgurl'] = 1;
}else{
	$arr['imgurl'] = 2;
}

$name = $_POST['name'];
$shuxing = $_POST['shuxing'];
$money = $_POST['money'];
$username = $_POST['username'];
$num = $_POST['num'];


$sql = "INSERT INTO commodity (name,shuxing,money,imgurl,merchant,number) VALUES ('$name','$shuxing','$money','$imgurl','$username','$num')";
$ress = add($sql);
if($ress){
	$arr['status'] = 2;
	$arr['info'] = "=√上传成功";
}else{
	$arr['status'] = 3;
	$arr['info'] = "*上传失败";
}
echo json_encode($arr);
function add($sql){
	$res = mysql_connect("localhost","root","root");
	mysql_select_db("shopping");
	mysql_query("set names utf8");
	$reslut = mysql_query($sql);
	if($reslut){
		return true;
	}else{
		return false;
	}
}

?>