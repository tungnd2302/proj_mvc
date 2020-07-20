<?php 
require_once('models/notifications.php');
	class Controller {
		public function __construct(){
			if(!isset($_SESSION['employee']) && $_GET['action'] != 'login'){
				// die('Không tồn tại');
				header("location:?controller=home&action=login");
				// exit();
			}elseif(isset($_SESSION['employee'])){
				if($_SESSION['employee']['role'] != "administrator" && $_GET['controller'] == 'employees' && $_GET['action'] != 'profiledetail' && $_GET['action'] != 'changeprofile' && $_GET['action'] !='employeeupdate' && $_GET['action'] !='changepasswordemployee'){
					header("location:?controller=home&action=home");
				}
			}

			if($_GET['controller'] == 'home' && $_GET['action'] = 'home'){
				$getBirthday = new employees();
				$birthdays = $getBirthday->getBirthday();
				foreach ($birthdays as $birthday) {
					$birthDate = $birthday['birthday']; // Read this from the DB instead
					$time = strtotime($birthDate);
					if(date('m-d') == date('m-d', $time)) {
						if(!isset($_SESSION['birthday'])){
							$_SESSION['birthday']['contents'] = 'Today is '.$birthday['fullname'].' birthday';
							$_SESSION['birthday']['icon'] = 'icon-gift';
						}
					}
				}
			}


			
		}
	}
?>