<?php 
	require_once('models/model.php');
	class bill extends model{
		public function getAll(){
			$con = $this->connection();
			$querySelect = "SELECT bill.*,name FROM bill 
						    LEFT JOIN customers ON bill.customer_ID = customers.ID";
			$result = mysqli_query($con,$querySelect);
			$bill = [];
			if(mysqli_num_rows($result) > 0){
				$bill = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			return $bill;
		}

		public function delete($id){
			$con = $this->connection();
			$queryDelete = "DELETE FROM bill WHERE bill_ID =". $id;
			$result = mysqli_query($con,$queryDelete);

			$queryDelete_detail = "DELETE FROM bill_detail WHERE bill_ID =". $id;
			$result_queryDelete_detail = mysqli_query($con,$queryDelete_detail);

			return $result;
		}

		public function countbill(){
			$con = $this->connection();
			$queryCount = "SELECT COUNT(id) as qty FROM bill";

			$result = mysqli_query($con,$queryCount);
			if(mysqli_num_rows($result) > 0){
				$countArr[0] = mysqli_fetch_all($result,MYSQLI_ASSOC);
			}
			return $countArr[0][0]['qty'];

		}

		public function deleteZero(){
			$con = $this->connection();
			$queryDelete = "DELETE FROM bill WHERE price = 0";
			$result = mysqli_query($con,$queryDelete);
			return $result;
		}

		public function detail($id){
			$con = $this->connection();
			$querySelect = "SELECT * FROM bill_detail where bill_ID = ".$id;
			$result = mysqli_query($con,$querySelect);
			$bill = [];
			if(mysqli_num_rows($result) > 0){
				$bill = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			return $bill;
		}

	}

?>