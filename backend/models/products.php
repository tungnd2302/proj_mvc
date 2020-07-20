<?php 
	require_once('models/model.php');
	class products extends model{
		public function getAll(){
			$con = $this->connection();
			$querySelect = "SELECT products.*,category.name AS 'category_name',brands.name AS 'brand_name' 
							FROM products left join brands   ON products.brand_id = brands.ID 
										  left JOIN category ON products.category_id = category.ID";
			$result = mysqli_query($con,$querySelect);
			$categories = [];
			if(mysqli_num_rows($result) > 0){
				$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			return $categories;
		}

		public function create($request){
			$con = $this->connection();
			$name = ucfirst($request['name']);
			$queryInsert = "INSERT INTO prletoducts(name,category_id,brand_id,avatar,stock,price,description,created_by,status) 
				VALUES ('$name', {$request['category_id']},
								 {$request['brand_id']},
								'{$request['avatar']}',
								 {$request['stock']},
								 {$request['price']},
								'{$request['description']}',
								'{$request['created_by']}',
								'{$request['status']}')";
			// die($queryInsert);
			$result = mysqli_query($con,$queryInsert);
			return $result;
		}

		public function find($name){
			$nameFind = ucfirst($name);
			echo $nameFind;
			$con = $this->connection();
			$queryFinds = "SELECT name FROM products";
			$finds = mysqli_query($con,$queryFinds);
			if($finds){
				if(mysqli_num_rows($finds) > 0){
					$findsArray = mysqli_fetch_all($finds,MYSQLI_ASSOC); 
					foreach ($findsArray as $find) {
						// echo $find['name'] . "<br/>";
						if($find['name'] == $nameFind){
							return '1';
						}
					}
				}else{
					return '0';
				}
			}

		}

		public function delete($id){
			$con = $this->connection();
			$queryDelete = "DELETE FROM products WHERE ID =". $id;
			$result = mysqli_query($con,$queryDelete);
			return $result;
		}

		public function getByID($id){
			$con = $this->connection();
			$queryGet = "SELECT * FROM products WHERE ID =". $id;
			$result = mysqli_query($con,$queryGet);
			$products = [];
			if(mysqli_num_rows($result) > 0){
				$productsArray = mysqli_fetch_all($result,MYSQLI_ASSOC);
				$products = $productsArray[0];
			}
			return $products;
		}

		public function detail($id){
			$con = $this->connection();
			$queryGet = "SELECT products.*,category.name AS 'category_name',brands.name AS 'brand_name' 
							FROM products left join brands   ON products.brand_id = brands.ID 
										  left JOIN category ON products.category_id = category.ID WHERE products.ID =". $id;
			$result = mysqli_query($con,$queryGet);
			$products = [];
			if(mysqli_num_rows($result) > 0){
				$productsArray = mysqli_fetch_all($result,MYSQLI_ASSOC);
				$products = $productsArray[0];
			}
			return $products;
		}

		public function getNameAndID($id,$name){
			$nameFind = ucfirst($name);
			$con = $this->connection();
			$queryFinds = "SELECT name FROM products WHERE ID NOT LIKE $id";
			$finds = mysqli_query($con,$queryFinds);
			if($finds){
				if(mysqli_num_rows($finds) > 0){
					$findsArray = mysqli_fetch_all($finds,MYSQLI_ASSOC); 
					foreach ($findsArray as $find) {
						// echo $find['name'] . "<br/>";
						if($find['name'] == $nameFind){
							return '1';
						}
					}
				}else{
					return '0';
				}
			}

		}

		public function update($request){
			$con = $this->connection();
			$name = ucfirst($request['name']);
			if(empty($request['avatar'])){
			$queryUpdate = "UPDATE products SET name        = '$name' , 
												category_id = '{$request['category_id']}',
												brand_id    =  {$request['brand_id']},
												stock       = {$request['stock']},
												price       = {$request['price']},
												description = '{$request['description']}',
												created_by  = '{$request['created_by']}'
												 where ID   = '{$request['id']}'";
			}else{
			$queryUpdate = "UPDATE products SET name        = '$name' , 
												category_id = '{$request['category_id']}',
												brand_id    = {$request['brand_id']},
												avatar      = '{$request['avatar']}',
												stock       = {$request['stock']},
												price       = {$request['price']},
												description = '{$request['description']}',
												created_by  = '{$request['created_by']}'
												 where ID   = {$request['id']}";	
			}
			// die($queryUpdate);
			$result = mysqli_query($con,$queryUpdate);
			return $result;
		}

		public function changeStatus($request){
			$con = $this->connection();
			$status = $request['status'];
			$id     = $request['id'];
			$queryChange = "UPDATE products SET status = ";
			if($status == 'active'){
				$queryChange .= "'active' ";
			}else{
				$queryChange .= "'inactive' ";
			}
			$queryChange .= "where ID = $id";
			$result = mysqli_query($con,$queryChange);
			return $result;
		}

		public function countProducts(){
			$con = $this->connection();
			$queryCount = "SELECT COUNT(id) as qty FROM products";

			$result = mysqli_query($con,$queryCount);
			if(mysqli_num_rows($result) > 0){
				$countArr[0] = mysqli_fetch_all($result,MYSQLI_ASSOC);
			}
			return $countArr[0][0]['qty'];

		}

		public function brandsStatistic(){
			$con = $this->connection();
			$queryProcedure = "CALL brandsProcedure";
			$result = mysqli_query($con,$queryProcedure);
			if(mysqli_num_rows($result) > 0){
				$products = mysqli_fetch_all($result,MYSQLI_ASSOC);
			} 
			return $products[0];
			// echo '<pre>';
			// print_r();
			// echo '</pre>';
			// die();
		}

	}

?>