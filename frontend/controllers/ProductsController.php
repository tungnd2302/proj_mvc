<?php 
require_once('controllers/Controller.php');
require_once('models/products.php');
require_once('models/category.php');
require_once('models/brands.php');
	class ProductsController extends Controller{
		public function list(){
			$productsModel = new products();
			$products = $productsModel->getAll();

			require_once('views/products/list.php');
		}

		public function detail(){
			if(isset($_GET['id']) && !is_numeric($_GET['id'])){
				header('location:?controller=home&action=index');
			}
			$id = $_GET['id'];
			$productModel = new products();
			$product = $productModel->getByID($id);

			$relateModel = new products();
			$relate_products = $relateModel->getByBrand($product['brand_name'],$id);

			$commentCount = new products();
			$comments_qty = $commentCount->countComment($id);
			// echo '<pre>';
			// print_r($comments_qty);
			// die();
			require_once('views/product_detail/index.php');
		}

		public function sendComment(){
			// echo '<pre>';
			// print_r($_POST['fullname']);
			// echo '</pre>';
			// die();
			$error    = '';
			$fullname = '';
			$comment  = '';
			$product_id = $_POST['id'];
			if(empty($_POST['fullname'])){
				$error .= 'Name is required<br/>';
			}else{
				$fullname = $_POST['fullname'];
			}

			if(empty($_POST['comment'])){
				$error .= 'Comment is required';
			}else{
				$comment = $_POST['comment'];
			}


			if($error == ''){
				$productModel = new products();
 				$query = $productModel->saveComment($product_id,$fullname,$comment);
				$query = $productModel->getByID($product_id);
				if($query){
					$error = "Comment added!!";
				}else{
					$error = "Thaast bai";
				}
			}
			$data = array(
				'error' => $error,
			);

			echo json_encode($data);
		}

		public function showComment(){
			$id = $_POST['id'];
			$productsModel = new products();
			$comments = $productsModel->showComment($id);
			
			$output = " ";
			if(isset($comments)){
				foreach ($comments as $comment) {
					$output .= '
					<div class="panel panel-default">
									    <div class="panel-heading">
									    	By <b>'.$comment['fullname'].'</b> on <i>'.$comment['created_at'].'</i>
									    </div>
									    <div class="panel-body">
											'.$comment['contents'].'
									   	</div>
									  </div>';
				}
			}else{
				$output = "<h3>No comment</h3>";
			}
			echo $output;
		}

		public function phone(){
			$hotSaleProductModel = new products;
			$hotsaleproducts = $hotSaleProductModel->hotsaler();
			$productModel = new products();
			$products = $productModel->getByCategory('Phone');
			$product_found = 0;
			foreach ($products as $product) {
				$product_found += 1;
			}
			require_once('views/products/phone.php');
		}

		public function watch(){
			$hotSaleProductModel = new products;
			$hotsaleproducts = $hotSaleProductModel->hotsaler();
			$productModel = new products();
			$products = $productModel->getByCategory('Watch');
			$product_found = 0;
			foreach ($products as $product) {
				$product_found += 1;
			}
			require_once('views/products/watch.php');
		}

		public function tablet(){
			$hotSaleProductModel = new products;
			$hotsaleproducts = $hotSaleProductModel->hotsaler();
			$productModel = new products();
			$products = $productModel->getByCategory('Tablet');
			$product_found = 0;
			foreach ($products as $product) {
				$product_found += 1;
			}
			require_once('views/products/tablet.php');
		}

		public function search(){
			 	$product_name = $_POST['product_name'];
				if(empty($product_name)){
					$_SESSION['error'] = 'Search box is not empty';
					require_once('views/products/search.php');
					return;
				}
				$productModel = new products();
				$products = $productModel->getByNameNoLimit($product_name);
				$product_found = 0;
				foreach ($products as $product) {
						$product_found += 1;
				}
				require_once('views/products/search.php');
		}

		public function filter(){
			$min_price  = '';
			$max_price  = '';
			$brand_name = '';
			$other_name = '';
			$category   = '';
			if(isset($_POST['filter'])){
				$byprice    = $_POST['byprice'];
				$bybrand    = $_POST['bybrand'];
				$bycategory = $_POST['bycategory'];
				switch ($byprice) {
					case 'all':
						break;
					case 'lessthan100':
						$max_price = 100;
						$min_price = 0;
						break;
					case '100-500':
						$max_price = 500;
						$min_price = 100;
						break;
					case '500-1000':
						$max_price = 1000;
						$min_price = 500;
						break;
					case 'morethan1000':
						$min_price = 1000;
						break;
					default:
							// code...
						break;
				}
				switch ($bybrand) {
					case 'all':
						$brand_name = '';
						break;
					case 'apple':
						$brand_name = 'apple';
						break;
					case 'samsung':
						$brand_name = 'samsung';
						break;
					case 'xiaomi':
						$brand_name = 'xiao mi';
						break;
					case 'other':
						$brand_name = '';
						break;
					default:
						break;
				}
				switch ($bycategory) {
					case 'phone':
						$category = 'phone';
						break;
					case 'tablet':
						$category = 'tablet';
						break;
					case 'watch':
						$category = 'watch';
						break;
					default:
						break;
				}
				if(isset($_POST['other_name'])){
					$other_name = $_POST['other_name'];
				}
				$request = [
					'min_price'  => $min_price,
					'max_price'  => $max_price,
					'other_name' => $other_name,
					'brand_name' => $brand_name,
					'category'   => $category
				];
				$productModel = new products();	
				$products = $productModel->filter($request);
				$product_found = 0;
				foreach ($products as $product) {
						$product_found += 1;
				}
				require_once('views/products/search.php');
			}
		}



		
	}

?>