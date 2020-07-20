<?php 
require_once('controllers/Controller.php');
require_once('models/products.php');
require_once('models/bill.php');
require_once('models/customers.php');
require_once('../backend/models/notifications.php');
require_once('models/discount.php');
	class CartController extends Controller{
		public function add(){
			$id = $_POST['id'];
			$productsModel = new products();
			$info = $productsModel->getByID($id);
			if(!isset($_SESSION['cart'][$id]['qty']) && !isset($_SESSION['cart'][$id]['info'])){
				$_SESSION['cart'][$id]['info'] = $info ;
				$_SESSION['cart'][$id]['qty'] = 1;
			}else{
				$_SESSION['cart'][$id]['qty'] = 1;
			}
		}

		public function list(){
			$cart_products = $_SESSION['cart'];
			$total_price = 0;
			foreach ($cart_products as $key => $value) {
				$total_price += $cart_products[$key]['info']['price'] * $cart_products[$key]['qty'];;
			}
			// foreach ($cart_products as $key => $value) {

			// 	echo '<pre>';
			// 	print_r($cart_products[$key]['info']['price']);
			// 	echo '</pre>';
				
			// }
			// die();
			require_once('views/cart/index.php');
		}

		public function remove(){
			$id = $_GET['id'];
			// session_destroy();
			unset($_SESSION['cart'][$id]);
			if(empty($_SESSION['cart'])){
				unset($_SESSION['cart']);
				unset($_SESSION['discount']);
				$_SESSION['error'] = "Your cart is empty";
				header('location:?controller=home&action=index');
				return;
			}else{
				header('location:?controller=cart&action=list');
			}
		}

		public function changeprice(){
			$id    = $_POST['id'];
			$qty = $_POST['qty'];
			$_SESSION['cart'][$id]['qty'] = $qty;	
			// echo '<pre>';
			// print_r($_SESSION['cart']);
			// echo '</pre>';
			$cart_products = $_SESSION['cart'];
			$total_price = 0;
			foreach ($cart_products as $key => $value) {
				$total_price += $cart_products[$key]['info']['price'] * $cart_products[$key]['qty'];;
			}
			require_once('views/ajax/cart.php');
		}

		public function destroy(){
			session_destroy();
		}

		public function payment(){
			if(isset($_SESSION['cart'])){
				if(isset($_GET['id'])){
					$id = $_GET['id'];
					$productsModel = new products();
					$info = $productsModel->getByID($id);
					$_SESSION['cart'][$id]['info'] = $info ;
					$_SESSION['cart'][$id]['qty'] = 1;	
				}
				$cart_products = $_SESSION['cart'];
				$total_price = 0;
				foreach ($cart_products as $key => $value) {
					$total_price += $cart_products[$key]['info']['price'] * $cart_products[$key]['qty'];
					if($cart_products[$key]['qty'] > $cart_products[$key]['info']['stock']){
						$_SESSION['error'] = "You choose more than products quantity of ".$cart_products[$key]['info']['name'];
						require_once('views/cart/index.php');
						return;
					}
				}
				// die('tồn tại');
			}else{
				$id = $_GET['id'];
				$productsModel = new products();
				$info = $productsModel->getByID($id);
				$_SESSION['cart'][$id]['info'] = $info ;
				$_SESSION['cart'][$id]['qty'] = 1;	
				$cart_products = $_SESSION['cart'];
				$total_price = 0;
				foreach ($cart_products as $key => $value) {
					$total_price += $cart_products[$key]['info']['price'] * $cart_products[$key]['qty'];
				}

			}
			// echo '<pre>';
			// print_r($_SESSION['cart']);
			// echo '</pre>';
			// die();
			require_once('views/pay/index.php');
		}

		public function purchase(){
			if(!isset($_SESSION['cart'])){
				header("location:?controller=home&action=index");
				return;
			}
			if(isset($_POST['purchase'])){
				$email    = $_POST['email'];
				$name     = $_POST['name'];
				$phone    = $_POST['phone'];
				$address  = $_POST['address'];
				$discount_code = $_POST['discount'];
				$discount = $_POST['discount_hidden'];
				$total_price = $_POST['total_price_hidden'];
				if(empty($email)){
					$_SESSION['error'] = "Email is not empty";
					header('location:?controller=cart&action=payment');
					return;
				}elseif(strlen($email) < 3){
					$_SESSION['error'] = "Email is at least 3 characters";
					header('location:?controller=cart&action=payment');
					return;
				}elseif(empty($name)){
					$_SESSION['error'] = "Name is not empty";
					header('location:?controller=cart&action=payment');
					return;
				}elseif(strlen($name) < 10){
					$_SESSION['error'] = "Name is at least 10 characters";
					header('location:?controller=cart&action=payment');
					return;
				}elseif(empty($phone)){
					$_SESSION['error'] = "Phone is not empty";
					header('location:?controller=cart&action=payment');
					return;
				}elseif(!is_numeric($phone)){
					$_SESSION['error'] = "Phone is not a number";
					header('location:?controller=cart&action=payment');
					return;
				}elseif(empty($address)){
					$_SESSION['error'] = "Address is not empty";
					header('location:?controller=cart&action=payment');
					return;
				}
				$cart_products = $_SESSION['cart'];

				if(!isset($_SESSION['customer'])){
					$request =[
						'customer_ID'       => 0,
						'customer_name'     => $name,
						'email'             => $email,
						'customer_phone'    => $phone,
						'customer_address'  => $address,
						'code'              => $discount_code,
						'price'             => $total_price + $discount,
						'discount'          => $discount,
						'cart'              => $_SESSION['cart'],
					];
				}else{
					$request =[
						'customer_ID'     => $_SESSION['customer']['ID'],
						'customer_name'   => $name,
						'customer_phone'  => $phone,
						'customer_address'=> $address,
						'price'           => $total_price,
						'discount'        => $discount,
						'email'           => $email,
						'cart'            => $_SESSION['cart']
					];
				}

				$billModel = new bill();
				$result = $billModel->insert($request);

				$updateStockModel = new bill();
				$result2 = $updateStockModel->updateStock($request);

				$mailBillModel = new bill();
				$resultMail = $mailBillModel->mail($request);

				$noti = new notifications();
				$noti->createPurchase($request);

				$discountModel = new discount();
				$discountModel->inactive($discount_code);

				if(isset($_SESSION['customer'])){
					$customerModel = new customers();
					$updatePoint = $customerModel->updatePoint($total_price,$_SESSION['customer']['ID']);
					$customer_lastPurchase = new customers();
					$customer_lastPurchase->lastPurchase($_SESSION['customer']['ID']);
				}
				if($result){
					$customer = [
						'email'   => $email,
						'name'    => $name,
						'phone'   => $phone,
						'address' => $address,
					];
					unset($_SESSION['cart']);
					require_once('views/thankforpay/index.php');
				}
			}
		}

		public function ajax_payment(){
			
		}




	}

?>