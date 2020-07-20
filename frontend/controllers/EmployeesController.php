<?php 
require_once('controllers/Controller.php');
require_once('models/employees.php');
require_once('models/home.php');
	class employeesController extends Controller{
		public function list(){
			$employeesModel = new employees();
			$employees = $employeesModel->getAll();
			require_once('views/employees/list.php');
		}

		public function create(){
			if(isset($_POST['create'])){
				$username = $_POST['username'];
				$password = $_POST['password'];
				$fullname = $_POST['fullname'];
				$role = $_POST['role'];
				$status = $_POST['status'];
				$created_by = $_POST['created_by'];
				// echo $name;
				if(empty($username)){
					$_SESSION['error'] = "Username is not empty";
					require_once('views/employees/create.php');
					return;
				}elseif(strlen($username) < 3){
					$_SESSION['error'] = "Username is at least 3 characters";
					require_once('views/employees/create.php');
					return;
				}elseif(is_numeric($username)){
					$_SESSION['error'] = "Username is not a number";
					require_once('views/employees/create.php');
					return;
				}elseif(empty($password)){
					$_SESSION['error'] = "Password is not empty";
					require_once('views/employees/create.php');
					return;
				}elseif(strlen($password) < 3){
					$_SESSION['error'] = "Password is at least 3 characters";
					require_once('views/employees/create.php');
					return;
				}elseif(empty($fullname)){
					$_SESSION['error'] = "Fullname is not empty";
					require_once('views/employees/create.php');
					return;
				}elseif(strlen($fullname) < 10){
					$_SESSION['error'] = "Fullname is at least 10 characters";
					require_once('views/employees/create.php');
					return;
				}elseif(is_numeric($fullname)){
					$_SESSION['error'] = "Fullname is not a number";
					require_once('views/employees/create.php');
					return;
				}
				else{
					$employeesFindModel = new employees();
					$resultFind = $employeesFindModel->findUser($username);
					if($resultFind == 1){
						$_SESSION['error'] = "Username is exist";
						require_once('views/employees/create.php');
						return;
					}else{
						$requests = [
								     'username'   => $username,
								     'password'   => md5($password),	
								     'fullname'   => $fullname,	
								     'role'       => $role,	
								     'status'     => $status,
								     'created_by' => $created_by
								    ];
						$employeesModel = new employees();
						$result = $employeesModel->create($requests);
						if($result){
						// die("đã vào được đây ");
							$_SESSION['success'] = "Create a record successfully";
							header('location:?controller=employees&action=list');
							return;
						}
					}

				}
			}
			require_once('views/employees/create.php');
		}

		public function delete(){
			if(empty($_GET['id']) || !is_numeric($_GET['id'])){
					$_SESSION['error'] = "Parameter is not valid";
						header('location:?controller=employees&action=list');
				die('hi');
						return;
			}elseif($_GET['id'] == $_SESSION['employee']["ID"]){
					$_SESSION['error'] = "Cannot delete yourself";
					header('location:?controller=employees&action=list');
					return;
			}else{
				$id = $_GET['id'];
				$employeesModel = new employees();
				$result = $employeesModel->delete($id);
				if($result){
					$_SESSION['success'] = "Delete a record #". $id . " successfully";
					header('location:?controller=employees&action=list');
					return;
				}
			}
		}

		public function update(){
			if(empty($_GET['id']) || !is_numeric($_GET['id'])){
					$_SESSION['error'] = "Parameter is not valid";
						header('location:?controller=employees&action=list');
						return;
			}else{
				$id = $_GET['id'];
				$employeesModel = new employees();
				$employee = $employeesModel->getByID($id);
				// echo '<pre>';
				// print_r($employees);
				// echo '</pre>';
				if(isset($_POST['create'])){
				$username = $_POST['username'];
				$password = $_POST['password'];
				$fullname = $_POST['fullname'];
				$role = $_POST['role'];
				$created_by = $_POST['created_by'];
				// echo $name;
				if(empty($username)){
					$_SESSION['error'] = "Username is not empty";
					require_once('views/employees/create.php');
					return;
				}elseif(strlen($username) < 3){
					$_SESSION['error'] = "Username is at least 3 characters";
					require_once('views/employees/create.php');
					return;
				}elseif(is_numeric($username)){
					$_SESSION['error'] = "Username is not a number";
					require_once('views/employees/create.php');
					return;
				}elseif(empty($fullname)){
					$_SESSION['error'] = "Fullname is not empty";
					require_once('views/employees/create.php');
					return;
				}elseif(strlen($fullname) < 10){
					$_SESSION['error'] = "Fullname is at least 10 characters";
					require_once('views/employees/create.php');
					return;
				}elseif(is_numeric($fullname)){
					$_SESSION['error'] = "Fullname is not a number";
					require_once('views/employees/create.php');
					return;
				}
				else{
					$employeesFindModel = new employees();
					$resultFind = $employeesFindModel->findUsernameAndID($id,$username);
					if($resultFind == 1){
						$_SESSION['error'] = "Username is exist";
						require_once('views/employees/create.php');
						return;
					}else{
						$requests = [
									 'id'         => $id,
								     'username'   => $username,
								     'password'   => md5($password),	
								     'fullname'   => $fullname,	
								     'role'       => $role,	
								     'status'     => $status,
								     'created_by' => $created_by
								    ];
						$employeesModel = new employees();
						$result = $employeesModel->update($requests);
						if($result){
						// die("đã vào được đây ");
							$_SESSION['success'] = "Create a record successfully";
							header('location:?controller=employees&action=list');
							return;
						}
					}

				}
			}
				require_once('views/employees/update.php');
			}
		}

		public function status(){
			$status = $_GET['status'];
			$id     = $_GET['id'];
			if($id == $_SESSION['employee']['ID']){
				$_SESSION['success'] = "Cannot lock yourself";
				header('location:?controller=employees&action=list');
				return;
			}
			$request = [
				'status' => $status,
				'id'     => $id,
			];
			$employeesModel = new employees();
			$result = $employeesModel->changeStatus($request);
			if($result){
				// die("đã vào được đây ");
				$_SESSION['success'] = "Update a record successfully";
				header('location:?controller=employees&action=list');
				return;
			}
		}

		public function resetpassword(){
			if(empty($_GET['id']) || !is_numeric($_GET['id'])){
					$_SESSION['error'] = "Parameter is not valid";
						header('location:?controller=employees&action=list');
						return;
			}else{
				$id = $_GET['id'];
				$employeesModel = new employees();
				$employee = $employeesModel->getByID($id);
				if(isset($_POST['reset'])){
					$new_password        = $_POST['new_password'];
					$new_password_repeat = $_POST['new_password_repeat'];
					if(empty($new_password) || empty($new_password_repeat)){
						$_SESSION['error'] = "Password and repeat password is not empty";
						require_once('views/employees/changepassword.php');
						return;
					}elseif(strlen($new_password) < 3 || strlen($new_password_repeat) < 3){
						$_SESSION['error'] = "Password and repeat password is at least 3 characters";
						require_once('views/employees/changepassword.php');
						return;
					}elseif($new_password != $new_password_repeat){
						$_SESSION['error'] = "Password and repeat password is the same";
						require_once('views/employees/changepassword.php');
						return;
					}else{
						$employeesResetModel = new employees();
					    $result = $employeesResetModel->resetPassword($id,md5($new_password));
					    if($result){
							// die("đã vào được đây ");
							$_SESSION['success'] = "Reset successfully";
							header('location:?controller=employees&action=list');
							return;
						}
					}
				}
			}
			require_once('views/employees/changepassword.php');
		}

		public function detail(){
			if(empty($_GET['id']) || !is_numeric($_GET['id'])){
				$_SESSION['error'] = "Parameter is not valid";
				header('location:?controller=employees&action=list');
				return;
			}else{
				$id = $_GET['id'];
				$employeesModel = new employees();
				$employee_detail = $employeesModel->getByID($id);
				require_once('views/employees/detail.php');
			}
				return $employee_detail;
		}

		public function changeprofile(){
			require_once('views/employees/changeprofile.php');
		}

		public function employeeupdate(){
			if(isset($_POST['update'])){
				$fullname = $_POST['fullname'];
				$username = $_POST['username'];
				$birthday = $_POST['birthday'];
				$email    = $_POST['email'];
				$phone    = $_POST['phone'];
				$avatar   = $_FILES['file'];
				$ID   = $_POST['id'];
			}
			if(empty($fullname)){
				$_SESSION['error'] = "Fullname is not empty";
				require_once('views/employees/changeprofile.php');
				return;
			}elseif(strlen($fullname) < 10){
				$_SESSION['error'] = "Fullname is at least 10 characters";
				require_once('views/employees/changeprofile.php');
				return;
			}elseif(is_numeric($fullname)){
				$_SESSION['error'] = "Fullname is not a number";
				require_once('views/employees/changeprofile.php');
				return;
			}elseif(empty($birthday)){
				$_SESSION['error'] = "Birthday is not empty";
				require_once('views/employees/changeprofile.php');
				return;
			}elseif(empty($email)){
				$_SESSION['error'] = "Email is not empty";
				require_once('views/employees/changeprofile.php');
				return;
			}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				$_SESSION['error'] = "Email is not available";
				require_once('views/employees/changeprofile.php');
				return;
			}elseif(empty($phone)){
				$_SESSION['error'] = "Phone is not empty";
				require_once('views/employees/changeprofile.php');
				return;
			}elseif(strlen($phone) != 10){
				$_SESSION['error'] = "Phone has only 10 numbers";
				require_once('views/employees/changeprofile.php');
				return;
			}elseif(!is_numeric($phone)){
				$_SESSION['error'] = "Phone is a number";
				require_once('views/employees/changeprofile.php');
				return;
			}elseif(!is_numeric($phone)){
				$_SESSION['error'] = "Phone is a number";
				require_once('views/employees/changeprofile.php');
				return;
			}

			$dirUploads = 'uploads';
            $absolutePathUpload = __DIR__ ."/../public/". $dirUploads;
            if(!file_exists($absolutePathUpload)){
                    mkdir($absolutePathUpload); 
            }
            $fileName = time() . $avatar['name']; 
            $isUpload = move_uploaded_file($avatar['tmp_name'],  $absolutePathUpload.  '/' .$fileName);
            if($isUpload){
                $avatar = $fileName;
            }
			$requests = [
					'fullname' => $fullname,
					'birthday' => $birthday,
					'email'    => $email,
					'phone'    => $phone,
					'avatar'   => $avatar,
					'id'	   => $ID,
			];
				$employeesModel = new employees();
				$result  = $employeesModel->employeeupdate($requests);
				if($result){
							// die("đã vào được đây ");
							$_SESSION['success'] = "Update successfully";
							$infoHomeModel = new home();
							$employeeInfo = $infoHomeModel->getByUsername($username);
							$_SESSION['employee'] = $employeeInfo;
							header('location:?controller=employees&action=profiledetail');
							return;
				}
			}
			public function profiledetail(){
				require_once('views/employees/profiledetail.php');
			}

		public function changepasswordemployee(){
			if(isset($_POST['change'])){
				$id               = $_POST['id'];
				$old_password     = $_POST['old_password'];
				$new_password     = $_POST['new_password'];
				$repeate_password = $_POST['repeate_password'];
				if(empty($old_password)){
					$_SESSION['error'] = "Old password is not empty";
					header('location:?controller=employees&action=changepasswordemployee');
					return;
				}else{
					$employeesPassword = new employees();
					$password = $employeesPassword->getPasswordByID($old_password,$id);
					if($password == 0){
						$_SESSION['error'] = "Old password is wrong";
						header('location:?controller=employees&action=changepasswordemployee');
						return;
					}else{
						if(empty($repeate_password) || empty($new_password)){
							$_SESSION['error'] = "Password is not empty";
							header('location:?controller=employees&action=changepasswordemployee');
							return;
						}elseif($old_password == $new_password){
							$_SESSION['error'] = "Old password and new password must be different";
							header('location:?controller=employees&action=changepasswordemployee');
							return;
						}elseif($new_password != $repeate_password){
							$_SESSION['error'] = "The password must be same";
							header('location:?controller=employees&action=changepasswordemployee');
							return;
						}else{
							$employeesResetModel = new employees();
							$password = $employeesResetModel->resetPasswordEmployee(md5($new_password),$id);
							$_SESSION['success'] = "Change password is successfully";
							header('location:?controller=employees&action=profiledetail');
							return;
						}
					}
				}
			}
			require_once('views/employees/changepasswordemployee.php');
		}
	}

	
?>