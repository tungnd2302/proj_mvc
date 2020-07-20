<?php 
require_once('controllers/Controller.php');
require_once('models/category.php');
	class CategoryController extends Controller{
		public function list(){
			$categoryModel = new category;
			$categories = $categoryModel->getAll();
			require_once('views/category/list.php');
		}

		public function create(){
			if(isset($_POST['create'])){
				$name = $_POST['name'];
				$status = $_POST['status'];
				$created_by = $_POST['created_by'];
				// echo $name;
				if(empty($name)){
					$_SESSION['error'] = "Name is not empty";
					require_once('views/category/create.php');
					return;
				}elseif(strlen($name) < 3){
					$_SESSION['error'] = "Name is at least 3 characters";
					require_once('views/category/create.php');
					return;
				}
				elseif(is_numeric($name)){
					$_SESSION['error'] = "Name is not a number";
					require_once('views/category/create.php');
					return;
				}
				else{
					$categoryFindModel = new category();
					$resultFind = $categoryFindModel->find($name);
					if($resultFind == 1){
						$_SESSION['error'] = "Name is exist";
						require_once('views/category/create.php');
						return;
					}else{
						$requests = [
								     'name' => $name,
								     'status' => $status,
								     'created_by' => $created_by
								    ];
						$categoryModel = new category();
						$result = $categoryModel->create($requests);
						if($result){
						// die("đã vào được đây ");
							$_SESSION['success'] = "Create a record successfully";
							header('location:?controller=category&action=list');
							return;
						}
					}

				}
			}
			require_once('views/category/create.php');
		}

		public function delete(){
			if(empty($_GET['id']) || !is_numeric($_GET['id'])){
					$_SESSION['error'] = "Parameter is not valid";
						header('location:?controller=category&action=list');
						return;
			}else{
				$id = $_GET['id'];
				$categoryModel = new category();
				$result = $categoryModel->delete($id);
				if($result){
					$_SESSION['success'] = "Delete a record #". $id . " successfully";
					header('location:?controller=category&action=list');
					return;
				}
			}
		}

		public function update(){
			if(empty($_GET['id']) || !is_numeric($_GET['id'])){
					$_SESSION['error'] = "Parameter is not valid";
						header('location:?controller=category&action=list');
						return;
			}else{
				$id = $_GET['id'];
				$categoryModel = new category();
				$category = $categoryModel->getByID($id);
				// echo '<pre>';
				// print_r($category);
				// echo '</pre>';
				if(isset($_POST['update'])){
				$name = $_POST['name'];
				$status = $_POST['status'];
				$created_by = $_POST['created_by'];
				// echo $name;
				if(empty($name)){
					$_SESSION['error'] = "Name is not empty";
					require_once('views/category/update.php');
					return;
				}elseif(strlen($name) < 3){
					$_SESSION['error'] = "Name is at least 3 characters";
					require_once('views/category/update.php');
					return;
				}
				elseif(is_numeric($name)){
					$_SESSION['error'] = "Name is not a number";
					require_once('views/category/update.php');
					return;
				}
				else{
					$categoryFindModel = new category();
					$resultFind = $categoryFindModel->getNameAndID($id,$name);
					if($resultFind == 1){
						$_SESSION['error'] = "Name is exist";
						require_once('views/category/update.php');
						return;
					}else{
						$requests = [
									 'id'   => $id,
								     'name' => $name,
								     'status' => $status,
								     'created_by' => $created_by
								    ];
						$categoryModel = new category();
						$result = $categoryModel->update($requests);
						if($result){
						// die("đã vào được đây ");
							$_SESSION['success'] = "Update a record successfully";
							header('location:?controller=category&action=list');
							return;
						}
					}

				}
			}
				require_once('views/category/update.php');
			}
		}

		public function status(){
			$status = $_GET['status'];
			$id     = $_GET['id'];
			$request = [
				'status' => $status,
				'id'     => $id,
			];
			$categoryModel = new category();
			$result = $categoryModel->changeStatus($request);
			if($result){
				// die("đã vào được đây ");
				$_SESSION['success'] = "Update a record successfully";
				header('location:?controller=category&action=list');
				return;
				}
		}
	}

?>