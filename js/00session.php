<?php

session_start();
if(!empty($_SESSION['username'])){
	$nmnm = $_SESSION['username'];
}else{
	$nmnm = "请登录";
}
echo json_encode($nmnm);

?>