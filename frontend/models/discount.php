<?php 
	require_once('models/model.php');
	class discount extends model{
		public function checkdiscount($discount){
			$con = $this->connection();
			$querySelect = "SELECT * FROM voucher where description = '$discount' AND status='active'";
			// die($querySelect);
			$result = mysqli_query($con,$querySelect);
			$content = [];
			if(mysqli_num_rows($result) > 0){
				$content = mysqli_fetch_all($result,MYSQLI_ASSOC);
			}else{
				$content = 'fail';
			}
			return $content;
		}

		public function inactive($discount_code){
			$con = $this->connection();
			$queryUodate = "UPDATE voucher SET status='inactive' WHERE description = '$discount_code'";
			// die($queryUodate);
			mysqli_query($con,$queryUodate);
		}


	}

?>