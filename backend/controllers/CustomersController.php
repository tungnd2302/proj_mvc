<?php 
require_once('controllers/Controller.php');
require_once('models/customers.php');
	class customersController extends Controller{
		public function list(){
			$categoryModel = new customers();
			$customers = $categoryModel->getAll();
			require_once('views/customers/list.php');
		}

		public function delete(){
			if(empty($_GET['id']) || !is_numeric($_GET['id'])){
					$_SESSION['error'] = "Parameter is not valid";
						header('location:?controller=customers&action=list');
						return;
			}else{
				$id = $_GET['id'];
				$customersModel = new customers();
				$result = $customersModel->delete($id);
				if($result){
					$_SESSION['success'] = "Delete a record #". $id . " successfully";
					header('location:?controller=customers&action=list');
					return;
				}
			}
		}
	}

?>