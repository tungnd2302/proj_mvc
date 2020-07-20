<?php 
	require_once('models/model.php');
	class notifications extends model{
		public function getAll(){
			$con = $this->connection();
			$querySelect = "SELECT * FROM notifications ORDER BY ID DESC";
			$result = mysqli_query($con,$querySelect);
			$notifications = [];
			if(mysqli_num_rows($result) > 0){
				$notifications = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			return $notifications;
		}

		public function create($value){
			$con = $this->connection();
			$created_by = $_SESSION['employee']['fullname'];
			$queryInsert = "INSERT INTO notifications(contents,icon) VALUES ('{$value} created by $created_by','icon-user')";
			mysqli_query($con,$queryInsert);
		}	

		public function delete($id){
			$con = $this->connection();
			$queryDelete = "DELETE FROM notifications WHERE ID = ".$id ;
			$result = mysqli_query($con,$queryDelete);
			return $result;
		}

		public function insertBirthday($fullname){
			$con = $this->connection();
			$queryInsert = "INSERT INTO notifications(contents,icon) VALUES ('Today is $fullname birthday','icon-gift')";
			mysqli_query($con,$queryInsert);
		}

		public function createPurchase($request){
			$con = $this->connection();
			$queryInsert = "INSERT INTO notifications(contents,icon) VALUES ('{$request['customer_name']} costed {$request['price']} from our shop','icon-shopping-cart')";
			// die($queryInsert);
			mysqli_query($con,$queryInsert);
		}

	}

?>
