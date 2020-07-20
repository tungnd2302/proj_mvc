<?php 
require_once('controllers/Controller.php');
require_once('models/bill.php');
	class billController extends Controller{
		public function list(){
			$deleteZero = new bill();
			$deleteZero->deleteZero();

			$categoryModel = new bill();
			$bills = $categoryModel->getAll();

			require_once('views/bill/list.php');
		}

		public function delete(){
			if(empty($_GET['id']) || !is_numeric($_GET['id'])){
					$_SESSION['error'] = "Parameter is not valid";
						header('location:?controller=bill&action=list');
						return;
			}else{
				$id = $_GET['id'];
				$billModel = new bill();
				$result = $billModel->delete($id);
				if($result){
					$_SESSION['success'] = "Delete a record #". $id . " successfully";
					header('location:?controller=bill&action=list');
					return;
				}
			}
		}

		public function detail(){
			if(empty($_GET['id']) || !is_numeric($_GET['id'])){
				$_SESSION['error'] = "Parameter is not valid";
					header('location:?controller=bill&action=list');
					return;
			}else{
				$id = $_GET['id'];
				$billModel = new bill();
				$bills = $billModel->detail($id);
				if($bills){
					require_once('views/bill/detail.php');
					return;
				}
			}
		}
	}

?>