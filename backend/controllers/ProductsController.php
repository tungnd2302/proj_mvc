<?php 
require_once('controllers/Controller.php');
require_once('models/products.php');
require_once('models/category.php');
require_once('models/brands.php');
	class ProductsController extends Controller{
		public function list(){
			$productsModel = new products;
			$products = $productsModel->getAll();
			require_once('views/products/list.php');
		}

		public function create(){
			$brands_brandModel = new brands();
			$brands_list = $brands_brandModel->getAll(); 
			$categories_brandModel = new category();
			$categories_list = $categories_brandModel->getAll(); 
			// echo '<pre>';
			// print_r($brands_list);
			// echo '</pre>';
			// die();
			if(isset($_POST['create'])){
				$name           = $_POST['name'];
				$price          = $_POST['price'];
				$category_id    = $_POST['category_id'];
				$brand_id       = $_POST['brand_id'];
				$stock          = $_POST['stock'];
				$description    = $_POST['description'];
				$created_by     = $_POST['created_by'];
				$avatarArr      = $_FILES['file'];
				$status = $_POST['status'];
				// echo $name;
				if(empty($name)){
					$_SESSION['error'] = "Name is not empty";
					require_once('views/products/create.php');
					return;
				}elseif(strlen($name) < 5){
					$_SESSION['error'] = "Name is at least 5 characters";
					require_once('views/products/create.php');
					return;
				}elseif(is_numeric($name)){
					$_SESSION['error'] = "Name is not a number";
					require_once('views/products/create.php');
					return;
				}elseif(!is_numeric($price)){
					$_SESSION['error'] = "Price is a number";
					require_once('views/products/create.php');
					return;
				}elseif(empty($stock)){
					$_SESSION['error'] = "Stock is not empty";
					require_once('views/products/create.php');
					return;
				}elseif(empty($description)){
					$_SESSION['error'] = "Description is not empty";
					require_once('views/products/create.php');
					return;
				}elseif(strlen($description) < 5){
					$_SESSION['error'] = "Description is at least 5 characters";
					require_once('views/products/create.php');
					return;
				}
				$avatar = '';
				if($avatarArr['size'] > 0 && $avatarArr['error'] == 0 ){
					$dirUpload ='uploadsFrontend/products';
					$absolutePathUpload = __DIR__."/../public/".$dirUpload;
					if(!file_exists($absolutePathUpload)){
						mkdir($absolutePathUpload);
					}

					$fileName = time() . $avatarArr['name'];
					$isUpload = move_uploaded_file($avatarArr['tmp_name'], $absolutePathUpload .'/'. $fileName);
					if($isUpload){
						$avatar = $fileName;
					}else{
						$_SESSION['error'] = "Có lỗi trong quá trình xử lý ảnh";
						require_once('views/products/create.php');
						return;
					}
				}

				$productsFindModel = new products();
				$resultFind = $productsFindModel->find($name);
				if($resultFind == 1){
					$_SESSION['error'] = "Name is exist";
					require_once('views/products/create.php');
					return;
				}else{
					$requests = [
							'name'        => $name,
							'price'       => $price,
							'status'      => $status,
							'category_id' => $category_id,
							'brand_id'    => $brand_id,
							'stock'       => $stock,
							'description' => $description,
							'avatar'      => $avatar,
						 	'created_by'  => $created_by
						];
					$productsModel = new products();
					$result = $productsModel->create($requests);
					if($result){
						// die("đã vào được đây ");
						$_SESSION['success'] = "Update a record successfully";
						header('location:?controller=products&action=list');
						return;
					}
				}
			}
			require_once('views/products/create.php');
		}

		public function delete(){
			if(empty($_GET['id']) || !is_numeric($_GET['id'])){
					$_SESSION['error'] = "Parameter is not valid";
						header('location:?controller=products&action=list');
						return;
			}else{
				$id = $_GET['id'];
				$productsModel = new products();
				$result = $productsModel->delete($id);
				if($result){
					$_SESSION['success'] = "Delete a record #". $id . " successfully";
					header('location:?controller=products&action=list');
					return;
				}
			}
		}

		public function update(){
			if(empty($_GET['id']) || !is_numeric($_GET['id'])){
					$_SESSION['error'] = "Parameter is not valid";
						header('location:?controller=products&action=list');
						return;
			}else{
				$id = $_GET['id'];
				$productsModel = new products();
				$product = $productsModel->getByID($id);
				$brands_brandModel = new brands();
				$brands_list = $brands_brandModel->getAll(); 
				$categories_brandModel = new category();
				$categories_list = $categories_brandModel->getAll(); 
				// echo '<pre>';
				// print_r($products);
				// echo '</pre>';
				if(isset($_POST['update'])){
				$name           = $_POST['name'];
				$price          = $_POST['price'];
				$category_id    = $_POST['category_id'];
				$brand_id       = $_POST['brand_id'];
				$stock          = $_POST['stock'];
				$description    = $_POST['description'];
				$created_by     = $_POST['created_by'];
				$avatarArr      = $_FILES['file'];
				// echo $name;
				if(empty($name)){
					$_SESSION['error'] = "Name is not empty";
					require_once('views/products/create.php');
					return;
				}elseif(strlen($name) < 5){
					$_SESSION['error'] = "Name is at least 5 characters";
					require_once('views/products/create.php');
					return;
				}elseif(is_numeric($name)){
					$_SESSION['error'] = "Name is not a number";
					require_once('views/products/create.php');
					return;
				}elseif(!is_numeric($price)){
					$_SESSION['error'] = "Price is a number";
					require_once('views/products/create.php');
					return;
				}elseif(empty($stock)){
					$_SESSION['error'] = "Stock is not empty";
					require_once('views/products/create.php');
					return;
				}elseif(empty($description)){
					$_SESSION['error'] = "Description is not empty";
					require_once('views/products/create.php');
					return;
				}elseif(strlen($description) < 5){
					$_SESSION['error'] = "Description is at least 5 characters";
					require_once('views/products/create.php');
					return;
				}
				$avatar = '';
				if($avatarArr['size'] > 0 && $avatarArr['error'] == 0 ){
					$dirUpload ='uploadsFrontend/products';
					$absolutePathUpload = __DIR__."/../public/".$dirUpload;
					if(!file_exists($absolutePathUpload)){
						mkdir($absolutePathUpload);
					}

					$fileName = time() . $avatarArr['name'];
					$isUpload = move_uploaded_file($avatarArr['tmp_name'], $absolutePathUpload .'/'. $fileName);
					if($isUpload){
						$avatar = $fileName;
					}else{
						$_SESSION['error'] = "Có lỗi trong quá trình xử lý ảnh";
						require_once('views/products/create.php');
						return;
					}
				}

				$productsFindModel = new products();
				$resultFind = $productsFindModel->getNameAndID($id,$name);
				if($resultFind == 1){
					$_SESSION['error'] = "Name is exist";
					require_once('views/products/create.php');
					return;
				}else{
					$requests = [
							'id'          => $id,
							'name'        => $name,
							'price'       => $price,
							'category_id' => $category_id,
							'brand_id'    => $brand_id,
							'stock'       => $stock,
							'description' => $description,
							'avatar'      => $avatar,
						 	'created_by'  => $created_by
						];
					$productsModel = new products();
					$result = $productsModel->update($requests);
					if($result){
						// die("đã vào được đây ");
						$_SESSION['success'] = "Update a record successfully";
						header('location:?controller=products&action=list');
						return;
					}
				}
			}
				require_once('views/products/update.php');
			}
		}

		public function detail(){
			if(empty($_GET['id']) || !is_numeric($_GET['id'])){
				$_SESSION['error'] = "Parameter is not valid";
				header('location:?controller=products&action=list');
				return;
			}else{
				$id = $_GET['id'];
				$productsModel = new products();
				$product_detail = $productsModel->detail($id);
				require_once('views/products/detail.php');
			}
				return $product_detail;
		}

		public function status(){
			$status = $_GET['status'];
			$id     = $_GET['id'];
			$request = [
				'status' => $status,
				'id'     => $id,
			];
			$productsModel = new products();
			$result = $productsModel->changeStatus($request);
			if($result){
				// die("đã vào được đây ");
				$_SESSION['success'] = "Update a record successfully";
				header('location:?controller=products&action=list');
				return;
				}
		}

		
	}

?>