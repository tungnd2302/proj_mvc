<?php 
	require_once('models/model.php');
	class products extends model{
		public function hotsaler(){
			$con = $this->connection();
			$querySelect = "SELECT products.*,category.name AS 'category_name',brands.name AS 'brand_name' 
							FROM products left join brands   ON products.brand_id = brands.ID 
										  left JOIN category ON products.category_id = category.ID WHERE products.status = 'active' AND price > 100  AND brands.status ='active' LIMIT 4";
			$result = mysqli_query($con,$querySelect);
			$categories = [];
			if(mysqli_num_rows($result) > 0){
				$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			return $categories;
		}

		public function phone(){
			$con = $this->connection();
			$querySelect = "SELECT products.*,category.name AS 'category_name',brands.name AS 'brand_name' 
							FROM products left join brands   ON products.brand_id = brands.ID 
										  left JOIN category ON products.category_id = category.ID WHERE products.status = 'active' AND category.id = 20 AND brands.status ='active' LIMIT 6";
			$result = mysqli_query($con,$querySelect);
			$phones = [];
			if(mysqli_num_rows($result) > 0){
				$phones = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			return $phones;
		}

		public function watch(){
			$con = $this->connection();
			$querySelect = "SELECT products.*,category.name AS 'category_name',brands.name AS 'brand_name' 
							FROM products left join brands   ON products.brand_id = brands.ID 
										  left JOIN category ON products.category_id = category.ID WHERE products.status = 'active' AND category.id = 17 AND brands.status ='active' LIMIT 6";
			$result = mysqli_query($con,$querySelect);
			$watches = [];
			if(mysqli_num_rows($result) > 0){
				$watches = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			return $watches;
		}

		public function getByID($id){
			$con = $this->connection();
			$querySelect = "SELECT products.*,category.name AS 'category_name',brands.name AS 'brand_name'
							FROM products left JOIN brands   ON products.brand_id = brands.ID 
										  left JOIN category ON products.category_id = category.ID 
										  left JOIN reviews ON  products.id = reviews.product_id
										  WHERE products.ID = $id";
										  // die($querySelect);
			$result = mysqli_query($con,$querySelect);
			$product = [];
			if(mysqli_num_rows($result) > 0){
				$product = mysqli_fetch_all($result, MYSQLI_ASSOC);

			}
			// echo '<pre>';
			// print_r($product[0]);
			// die();
			return $product[0];
		}

		public function getByBrand($brand,$id){
			$con = $this->connection();
			$querySelect = "SELECT products.avatar,products.ID,products.name,price,category.name AS 'category_name',brands.name AS 'brand_name' 
							FROM products left join brands   ON products.brand_id = brands.ID 
										  left JOIN category ON products.category_id = category.ID WHERE brands.name = '$brand' and products.ID NOT LIKE $id LIMIT 2";
			$result = mysqli_query($con,$querySelect);
			$product = [];
			if(mysqli_num_rows($result) > 0){
				$product = mysqli_fetch_all($result, MYSQLI_ASSOC);

			}
			return $product;
		}

		public function saveComment($product_id,$fullname,$comment){
			$con = $this->connection();
			$querySave = "INSERT INTO reviews(product_id,fullname,contents) 
							VALUES ($product_id,'$fullname','$comment')";
			$result = mysqli_query($con,$querySave);
			return $result;
		}

		public function showComment($id){
			$con = $this->connection();
			$querySelect = "SELECT fullname,contents,created_at FROM reviews WHERE product_id = $id ORDER BY ID DESC LIMIT 5";
			// die($querySelect);
			$result = mysqli_query($con,$querySelect);
			if(mysqli_num_rows($result) > 0){
				$comments = mysqli_fetch_all($result, MYSQLI_ASSOC);

			}else{
				return;
			}
			return $comments;
		}

		public function countComment($id){
			$con = $this->connection();
			$queryCount = "SELECT COUNT(ID) as 'comments_qty' FROM reviews WHERE product_id = $id";
			$result = mysqli_query($con,$queryCount);
			if(mysqli_num_rows($result) > 0){
				$comments_qty = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			return $comments_qty[0]['comments_qty'];
		}

		public function getByCategory($name){
			$con = $this->connection();
			$querySelect = "SELECT products.*, category.name as 'category_name',brands.name as 'brand_name' FROM products		
							LEFT JOIN category ON products.category_id = category.ID
							LEFT JOIN brands   ON products.brand_id    = brands.ID
							 WHERE category.name = '$name' ";
			$result = mysqli_query($con,$querySelect);
			$products =[];
			if(mysqli_num_rows($result) > 0){
				$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			return $products;
		}

		public function getByName($data){
			$con = $this->connection();
			$querySelect = "SELECT products.name AS 'name',products.ID AS 'ID',avatar,price,brands.name AS 'brand_name',stock FROM products 
							left JOIN category ON products.category_id = category.ID 
							LEFT JOIN brands ON products.brand_id = brands.ID
							WHERE  products.name LIKE '%$data%' OR brands.name LIKE '%$data%' 
					        LIMIT 4";
							 // die($querySelect);
			$result = mysqli_query($con,$querySelect);
			$products = [];
			if(mysqli_num_rows($result) > 0){
				$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			return $products;
		}

		public function getByNameNoLimit($data){
			$con = $this->connection();
			$querySelect = "SELECT products.name AS 'name',products.ID AS 'ID',avatar,price,brands.name AS 'brand_name',COUNT(reviews.ID) as 'review',stock FROM products 
							LEFT JOIN reviews ON products.ID = reviews.product_id
							LEFT JOIN category ON products.category_id = category.ID 
							LEFT JOIN brands ON products.brand_id = brands.ID
					        WHERE products.name LIKE '%$data%' OR brands.name LIKE '%$data%'
					        GROUP BY reviews.product_id ";
			// die($querySelect);
			$result = mysqli_query($con,$querySelect);
			$products = [];
			if(mysqli_num_rows($result) > 0){
				$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			return $products;
		}

		public function filter($request){
			$con = $this->connection();
			$querySelect = "SELECT products.name AS 'name',products.ID AS 'ID',avatar,price,brands.name AS 'brand_name',COUNT(reviews.ID) as 'review',stock FROM products 
							LEFT JOIN reviews ON products.ID = reviews.product_id
							LEFT JOIN category ON products.category_id = category.ID 
							LEFT JOIN brands ON products.brand_id = brands.ID WHERE ";
			if(!empty($request['max_price'])){
				$querySelect .= "price < {$request['max_price']} AND ";
			} 
			if(!empty($request['min_price'])){
				$querySelect .= "price > {$request['min_price']} AND ";
			}
			if(!empty($request['brand_name'])){
				$querySelect .= "brands.name LIKE '{$request['brand_name']}' AND ";
			}
			if(!empty($request['other_name'])){
				$querySelect .= "brands.name LIKE '{$request['other_name']}' AND ";
			}
			if(!empty($request['category'])){
				$querySelect .= "category.name LIKE '{$request['category']}' AND ";
			}

				$querySelect .= 'GROUP BY reviews.product_id';
			$querySelect = str_replace('AND GROUP', 'GROUP', $querySelect);
			$querySelect = str_replace('WHERE GROUP', 'GROUP', $querySelect);
			// die($querySelect);
			$result = mysqli_query($con,$querySelect);
			$products = [];
			if(mysqli_num_rows($result) > 0){
				$products = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			return $products;
		}
	}

?>