<?php 
require_once('controllers/Controller.php');
require_once('models/home.php');
require_once('models/brands.php');
require_once('models/customers.php');
require_once('models/products.php');
	class HomeController extends Controller{
		public function index(){
			$hotSaleProductModel = new products;
			$hotsaleproducts = $hotSaleProductModel->hotsaler();

			$phoneModel = new products;
			$phones = $phoneModel->phone();

			$watchesModel = new products;
			$watches = $watchesModel->watch();

			$brandsModel = new brands;
			$brands = $brandsModel->getAll();
			require_once('views/home/index.php');


		}

		public function login() {
			if(isset($_POST['login'])){
				$email = $_POST['email'];
				$password = $_POST['password'];
				$authHomeModel = new home();
				$auth = $authHomeModel->loginAuth($email,md5($password));
				// die($auth);
				if($auth == 1){
						$_SESSION['success'] = 'Login successfully';
						$customersInfo = new customers();
						$customer = $customersInfo->getByEmail($email);
						$_SESSION['customer'] = $customer;
						if(!isset($_SESSION['login'])){
							header("location:?controller=home&action=index");
							exit();
						}else{
							header("location:?controller=cart&action=payment");
							unset($_SESSION['login']);
							exit();	
						}
				}else{
					// die('đăng nhập thất bại');
					$_SESSION['error'] = 'Email or password is not correct';
					header("location:?controller=home&action=login");
					exit();

				}
			}
			if(isset($_POST['register'])){
				$email = $_POST['email'];
				$name  = $_POST['name'];
				$phone  = $_POST['phone'];
				$password  = $_POST['password'];
				$re_password  = $_POST['re_password'];
				if(empty($email)){
					$_SESSION['error'] = 'Email is not empty';
						header("location:?controller=home&action=login&status=fail");
					exit();
				}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					$_SESSION['error'] = 'Email is not available';
						header("location:?controller=home&action=login&status=fail");
					exit();
				}elseif(empty($phone)){
					$_SESSION['error'] = 'Phone is not empty';
						header("location:?controller=home&action=login&status=fail");
					exit();
				}elseif(!is_numeric($phone)){
					$_SESSION['error'] = 'Phone is a number';
						header("location:?controller=home&action=login&status=fail");
					exit();
				}elseif(!is_numeric($phone)){
					$_SESSION['error'] = 'Phone is a number';
						header("location:?controller=home&action=login&status=fail");
					exit();
				}elseif(strlen($phone) != 10){
					$_SESSION['error'] = 'Phone is only 10 numbers';
						header("location:?controller=home&action=login&status=fail");
					exit();
				}elseif(empty($password)){
					$_SESSION['error'] = 'password is not empty';
						header("location:?controller=home&action=login&status=fail");
					exit();
				}elseif(strlen($password) < 2 || strlen($password) > 10){
					$_SESSION['error'] = 'Password only 2 to 10 charactor';
						header("location:?controller=home&action=login&status=fail");
					exit();
				}elseif($password != $re_password){
					$_SESSION['error'] = 'Password and re password are the same';
						header("location:?controller=home&action=login&status=fail");
					exit();
				}else{
					$homeRegister = new home();
					$result = $homeRegister->findUser($email);
					if($result == 1){
						$_SESSION['error'] = 'Email was be exist';
						header("location:?controller=home&action=login&status=fail");
						exit();
					}
					$request = [
						'email'    => $email,
						'name'     => $name,
						'phone'    => $phone,
						'password' => md5($password)   
					];
					$homeRegister = new home();
					$result = $homeRegister->register($request);
					if($result){
						$_SESSION['success'] = "Register successfully";
						$_SESSION['email'] = $email;
						$_SESSION['password'] = $password;
						header("location:?controller=home&action=login");
						exit();
					}
				}


			}
			require_once("views/login/index.php");
		}

		public function logout() {
			if(isset($_SESSION['customer'])){
				unset($_SESSION['customer']);
				$_SESSION['success'] = 'Logout successfully';
				header("location:?controller=home&action=index");
				exit();
			}
		}

		public function session(){
			echo '<pre>';
			print_r($_SESSION);
			echo '</pre>';	
		}

		public function search(){
			$xhtml = '';
			$data = $_POST['data'];
			$productsModel = new products();
			$products = $productsModel->getByName($data);
			// echo '<pre>';
			// print_r($products);
			// echo '<pre>';
			foreach ($products as $product) {
				if($product['stock'] > 0){	
					$xhtml .= sprintf('<table class="table table-responsive">
						<tr>
							<td width="100" align="center">
								<a href="?controller=products&action=detail&id=%s ">
									<img src="../backend/public/uploadsFrontend/products/%s" class="img-responsive" style="height: 50px;">
								</a>
							</td>
							<td>
								<a href="?controller=products&action=detail&id=%s">
									<h4 class="no_margin">%s</h4>
									<span class="red_color">%s$</span>
								</a>
							</td>
						</tr>
					</table>',$product['ID'],$product['avatar'],$product['ID'],$product['name'],$product['price']);
				}else{
					$xhtml .= sprintf('<table class="table table-responsive">
						<tr>
							<td width="100" align="center">
								<a href="?controller=products&action=detail&id=%s ">
									<img src="../backend/public/uploadsFrontend/products/%s" class="img-responsive" style="height: 50px;">
								</a>
							</td>
							<td>
								<a href="?controller=products&action=detail&id=%s">
									<h4 class="no_margin">%s</h4>
									<span class="red_color">Sold out</span>
								</a>
							</td>
						</tr>
					</table>',$product['ID'],$product['avatar'],$product['ID'],$product['name']);
				}
			}
			echo $xhtml;
		}
	}

?>