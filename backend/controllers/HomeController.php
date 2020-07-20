<?php 
require_once('controllers/Controller.php');
require_once('models/home.php');
require_once('models/employees.php');
require_once('models/products.php');
require_once('models/customers.php');
require_once('models/notifications.php');
	class HomeController extends Controller{
		public function home(){
			$employeesModel = new employees();
			$countEmployees = $employeesModel -> countEmployees();
			$customersModel = new customers();
			$countCustomers = $customersModel -> countCustomers();
			$productsModel = new products();
			$countProducts = $productsModel -> countProducts();

			$brandsModel = new products();
			$brand = $brandsModel->brandsStatistic();

			$noti = new notifications();
			$notis = $noti->getAll();

			// Tính toán 
			// Tính tổng số sản phẩm: $countProducts
			$percent_apple    =  round($brand['apple']   / $countProducts,2) * 100;
			$percent_samsung  =  round($brand['samsung'] / $countProducts,2) * 100;
			$percent_xiaomi   =  round($brand['xiaomi']  / $countProducts,2) * 100;
			$percent_other    =  100 - $percent_apple - $percent_xiaomi - $percent_samsung;

			$birthday = new employees();
			$employees = $birthday->getBirthday();

			
			// die($brand['apple']);
			// echo '<pre>';
			// print_r($employees);
			// echo '</pre>';
			// die();
			require_once('views/home/index.php');
		}

		public function login() {
			if(isset($_POST['login'])){
				$username = $_POST['username'];
				$password = $_POST['password'];
				$authHomeModel = new home();
				$auth = $authHomeModel->loginAuth($username,md5($password));
				// die($auth);
				switch ($auth) {
					case '0':
						$_SESSION['error'] = "Username is not exist";
						require_once("views/home/login.php");
						break;
					case '1':
						$_SESSION['error'] = "Password is wrong";
						require_once("views/home/login.php");
						break;
					case '3':
						$_SESSION['error'] = "This account is locked";
						require_once("views/home/login.php");
						break;
					case '2':
						$_SESSION['success'] = "Login successfully";
						$infoHomeModel = new home();
						$employeeInfo = $infoHomeModel->getByUsername($username);
						$_SESSION['employee'] = $employeeInfo;
						// echo '<pre>';
						// print_r();
						// echo '</pre>';
						header("location:?controller=home&action=home");
						break;
					default:
						break;
				}
			}
			require_once("views/home/login.php");
		}

		public function logout() {
			if(isset($_SESSION['employee'])){
				unset($_SESSION['employee']);
				header("location:?controller=home&action=login");
				exit();
			}
		}	

		public function deleteNotification(){
			$id = $_POST['id'];
			$del = new notifications();
			$result = $del->delete($id);
			$noti = new notifications();
			$notis = $noti->getAll();
			require_once('views/ajax/notifications.php');
		}

		public function checkBirthday(){
			
		}
	}

?>