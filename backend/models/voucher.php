<?php 
	require_once('models/model.php');
	class voucher extends model{
		public function getAll(){
			$con = $this->connection();
			$querySelect = "SELECT * FROM voucher";
			$result = mysqli_query($con,$querySelect);
			$vouchers = [];
			if(mysqli_num_rows($result) > 0){
				$vouchers = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			return $vouchers;
		}

		public function create($request){
			$con = $this->connection();
			$queryInsert = "INSERT INTO voucher(type,Content,description,Outdate,status) VALUES ('{$request['type']}','{$request['content']}','{$request['description']}','{$request['outdate']}','active')";
			// die($queryInsert);
			$result = mysqli_query($con,$queryInsert);
			return $result;
		}

		public function delete($id){
			$con = $this->connection();
			$queryDelete = "DELETE FROM voucher WHERE ID =". $id;
			// die($queryDelete);
			$result = mysqli_query($con,$queryDelete);
			return $result;
		}
	}

?>