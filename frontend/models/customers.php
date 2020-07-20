<?php 
	require_once('models/model.php');
	class customers extends model{
		public function getByEmail($email){
			$con = $this->connection();
			$querySelect = "SELECT * FROM customers WHERE email = '$email'";
			$result = mysqli_query($con,$querySelect);
			$customer = [];
			if(mysqli_num_rows($result) > 0){
				$customer = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			return $customer[0];
		}

		public function getByID($id){
			$con = $this->connection();
			$querySelect = "SELECT * FROM customers WHERE id = '$id'";
			$result = mysqli_query($con,$querySelect);
			$customer = [];
			if(mysqli_num_rows($result) > 0){
				$customer = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			return $customer[0];
		}

		public function getPasswordByID($password,$id){
			$con = $this->connection();
			$queryFind = "SELECT password FROM customers WHERE ID = $id";
			$result = mysqli_query($con,$queryFind);
			if(mysqli_num_rows($result) > 0 ){
				$customer = mysqli_fetch_all($result,MYSQLI_ASSOC);
				if(md5($password) != $customer[0]['password']){
					return 0;
				}

			}
			return 1;
		}

		
		public function resetPasswordEmployee($password,$id){
			$con = $this->connection();
			$queryUpdate = "UPDATE customers SET password = '$password' where ID = $id ";

			$result = mysqli_query($con,$queryUpdate);
			return $result;
		}

		public function edit($request){
			$con = $this->connection();
				if(!empty($request['avatar'])){
				$queryUpdate = "UPDATE customers SET name     = '{$request['name']}', 
													 birthday = '{$request['birthday']}',
													 phone    = '{$request['phone']}',
													 address  = '{$request['address']}',
													 avatar   = '{$request['avatar']}'
								WHERE ID = {$request['id']} ";
			}else{
				$queryUpdate = "UPDATE customers SET name     = '{$request['name']}', 
													 birthday = '{$request['birthday']}',
													 phone    = '{$request['phone']}',
													 address  = '{$request['address']}'
								WHERE ID = {$request['id']} ";
			}
			$result = mysqli_query($con,$queryUpdate);
			return $result;
		}

		public function updatePoint($totalPrice,$id){
			$point = round($totalPrice / 70);
			$con = $this->connection();
			$queryLastPoint = "SELECT points FROM customers WHERE ID = $id";
			$queryLastPointResult = mysqli_query($con,$queryLastPoint);
			if(mysqli_num_rows($queryLastPointResult) > 0){
				$lastPoints = mysqli_fetch_all($queryLastPointResult,MYSQLI_ASSOC);
			}
			$currentPoint = $lastPoints[0]['points'] + $point;
			$_SESSION['customer']['points'] = $currentPoint;
			
			$queryUpdate = "UPDATE customers SET points = $currentPoint WHERE ID = $id ";
			$result = mysqli_query($con,$queryUpdate);

			$queryInsert = "INSERT INTO history_point(customer_ID,total_price)
							VALUES($id,$totalPrice)";
			$result1 = mysqli_query($con,$queryInsert);

			return $result;
		}

		public function lastPurchase($id){
			$con = $this->connection();
			$queryUpdate = "UPDATE customers SET last_purchase = CURDATE() WHERE ID = $id ";
			mysqli_query($con,$queryUpdate);
		}

		public function purchaseHistories($id){
			$con = $this->connection();
			$querySelect = "SELECT total_price,history_point.create_at AS 'created_at' FROM history_point 
							LEFT JOIN customers on history_point.customer_ID = customers.ID
							WHERE customers.ID =".$id;
			$result = mysqli_query($con,$querySelect);
			if(mysqli_num_rows($result) > 0){
				$histories = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}else{
				$histories = '';
			}
			return $histories;
		}

		public function deleteZero(){
			$con = $this->connection();
			$queryDelete = 'DELETE FROM history_point WHERE total_price = 0';
			$result = mysqli_query($con,$queryDelete);
		}
	}

?>