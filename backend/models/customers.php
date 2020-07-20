<?php 
	require_once('models/model.php');
	class customers extends model{
		public function getAll(){
			$con = $this->connection();
			$querySelect = "SELECT * FROM customers";
			$result = mysqli_query($con,$querySelect);
			$customers = [];
			if(mysqli_num_rows($result) > 0){
				$customers = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			return $customers;
		}

		public function delete($id){
			$con = $this->connection();
			$queryDelete = "DELETE FROM customers WHERE ID =". $id;
			$result = mysqli_query($con,$queryDelete);
			return $result;
		}

		public function countCustomers(){
			$con = $this->connection();
			$queryCount = "SELECT COUNT(id) as qty FROM customers";

			$result = mysqli_query($con,$queryCount);
			if(mysqli_num_rows($result) > 0){
				$countArr[0] = mysqli_fetch_all($result,MYSQLI_ASSOC);
			}
			return $countArr[0][0]['qty'];

		}

	}

?>