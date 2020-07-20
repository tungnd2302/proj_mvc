<?php 
	require_once('controllers/Controller.php');
	require_once('models/customers.php');
	class CustomerController extends Controller
	{
	    public function profile(){
	    	require_once('views/profile/index.php');
	    }

	   public function changepassword(){
			if(isset($_POST['change'])){
				$id               = $_POST['id'];
				$old_password     = $_POST['old_password'];
				$new_password     = $_POST['new_password'];
				$re_new_password  = $_POST['re_new_password'];
				if(empty($old_password)){
					$_SESSION['error'] = "Old password is not empty";
					header('location:?controller=customer&action=changepassword');
					return;
				}else{
					$employeesPassword = new customers();
					$password = $employeesPassword->getPasswordByID($old_password,$id);
					if($password == 0){
						$_SESSION['error'] = "Old password is wrong";
						header('location:?controller=customer&action=changepassword');
						return;
					}else{
						if(empty($re_new_password) || empty($new_password)){
							$_SESSION['error'] = "New Password is not empty";
							header('location:?controller=customer&action=changepassword');
							return;
						}elseif($old_password == $new_password){
							$_SESSION['error'] = "Old password and new password must be different";
							header('location:?controller=customer&action=changepassword');
							return;
						}elseif($new_password != $re_new_password){
							$_SESSION['error'] = "The password must be same";
							header('location:?controller=customer&action=changepassword');
							return;
						}else{
							$employeesResetModel = new customers();
							$password = $employeesResetModel->resetPasswordEmployee(md5($new_password),$id);
							$_SESSION['success'] = "Change password is successfully";
							header('location:?controller=customer&action=profile');
							return;
						}
					}
				}
			}
			require_once('views/profile/changepassword.php');
		}

		public function edit(){
			if(isset($_POST['update'])){
				$id       = $_POST['id'];
				$name     = $_POST['name'];
				$birthday = $_POST['birthday'];
				$phone    = $_POST['phone'];
				$address  = $_POST['address'];
				$avatarArr= $_FILES['file'];
				// echo '<pre>';
				// print_r($avatar);
				// echo '<pre>';
				// die();
				if(empty($name)){
					$_SESSION['error'] = "Name is not empty";
					require_once('views/profile/edit.php');
					return;
				}elseif(strlen($name) < 5){
					$_SESSION['error'] = "Name is at least 5 charecters";
					require_once('views/profile/edit.php');
					return;
				}elseif(empty($birthday)){
					$_SESSION['error'] = "Birthday is not empty";
					require_once('views/profile/edit.php');
					return;
				}elseif(empty($phone)){
					$_SESSION['error'] = "Phone is not empty";
					require_once('views/profile/edit.php');
					return;
				}elseif(!is_numeric($phone)){
					$_SESSION['error'] = "Phone is only numbers";
					require_once('views/profile/edit.php');
					return;
				}elseif(strlen($phone) != 10){
					$_SESSION['error'] = "Phone is only 10 numbers";
					require_once('views/profile/edit.php');
					return;
				}elseif(empty($phone)){
					$_SESSION['error'] = "Address is not empty";
					require_once('views/profile/edit.php');
					return;
				}
				$dirUploads = 'customers';
	            $absolutePathUpload = __DIR__ ."/../public/assets/images/". $dirUploads;
	            if(!file_exists($absolutePathUpload)){
	                    mkdir($absolutePathUpload); 
	            }
	            $avatar = '';
	            $fileName = time() . $avatarArr['name']; 
	            $isUpload = move_uploaded_file($avatarArr['tmp_name'],  $absolutePathUpload.  '/' .$fileName);
	            if($isUpload){
	                $avatar = $fileName;
	            }
	            $request = [
	            	'id'       => $id,
	            	'name'     => $name,
	            	'birthday' => $birthday,
	            	'phone'    => $phone,
	            	'address'  => $address,
	            	'avatar'   => $avatar
	            ];
	            $updateCustomer = new customers();
	            $isUpdate = $updateCustomer->edit($request);
	            if($isUpdate){
	            	$_SESSION['success'] = "Update successfully";
	            	$customersInfo = new customers();
					$customer = $customersInfo->getByID($id);
					$_SESSION['customer'] = $customer;

					require_once('views/profile/index.php');
					return;
	            }
			}
			require_once('views/profile/edit.php');
		}

		public function purchase(){
			$id = $_SESSION['customer']['ID'];

			$deletePurchaseZero = new customers();
			$deletePurchaseZero -> deleteZero();
			
			$customerPurchase = new customers();
			$histories = $customerPurchase->purchaseHistories($id);
			// echo '<pre>';
			// print_r($histories);
			// echo '</pre>';
			// die();
			require_once('views/profile/purchase.php');
		}
	}
?>