<?php 
session_start();
	$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home'; // cart
	$action     = isset($_GET['action'])     ? $_GET['action'] : 'index'; // list,read,write

	$controller = ucfirst($controller); //Cart
	$controllerClass = $controller."Controller"; //CartController

	$controllerPath = "controllers/$controllerClass.php"; // controllers/CartController.php

	if(!file_exists($controllerPath)){ // Kiểm tra đường dẫn
		die("Đường dẫn đến controller không tồn tại");
	}

	require_once($controllerPath);

	$object = new $controllerClass;
	if(!method_exists($object, $action)){
		die("Phương thức không tồn tại trong controller");
	}

	$object->$action();
?>