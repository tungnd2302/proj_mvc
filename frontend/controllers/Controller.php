<?php 
	class Controller {
		public function __construct(){
			// kiểm tra tồn tại đăng nhập thì không được vào trang đăng nhập nữa
			if(!isset($_SESSION['customer'])){
				if($_GET['controller'] == 'customer'){
					header("location:?controller=home&action=index");
				}
			}else{
				if($_GET['action'] == 'login'){
					header("location:?controller=home&action=index");
				}
			}

			if(!isset($_SESSION['cart'])){
				if($_GET['controller'] == 'cart'){
					header("location:?controller=home&action=index");
				}
			}

		}
	}
?>