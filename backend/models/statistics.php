<?php 
	require_once('models/model.php');
	class statistics extends model{
		public function list(){
			$con = $this->connection();
			$procQuery = "CALL revenue";
			$result = mysqli_query($con,$procQuery);
			$revenues = [];
			if(mysqli_num_rows($result) > 0){
				$revenues = mysqli_fetch_all($result,MYSQLI_ASSOC);
			}
			return $revenues[0];
		}

		public function totalYear(){
			$con 		 = $this->connection();
			$querySelect = "SELECT sum(pay) AS 'totalRevenue' FROM bill_detail";
			$result      = mysqli_query($con,$querySelect);
			if(mysqli_num_rows($result) > 0){
				$revenues = mysqli_fetch_all($result,MYSQLI_ASSOC);
			}
			return $revenues[0]['totalRevenue'];
		}

		public function totalQuarter(){
			$month = date("m",time()); 
			$con 		 = $this->connection();
			$monthSelect = "SELECT sum(pay) AS 'totalRevenuemonth' FROM bill_detail 
					 LEFT JOIN bill ON bill_detail.bill_id = bill.bill_ID WHERE ";
			switch ($month) {
				case '01':
					$monthSelect .= "MONTH(created_at) = 1 OR MONTH(created_at) = 2 OR MONTH(created_at) = 3 ";
					break;
				case '02':
					$monthSelect .= "MONTH(created_at) = 1 OR MONTH(created_at) = 2 OR MONTH(created_at) = 3 ";
					break;
				case '03':
					$monthSelect .= "MONTH(created_at) = 1 OR MONTH(created_at) = 2 OR MONTH(created_at) = 3 ";
					break;
				case '04':
					$monthSelect .= "MONTH(created_at) = 4 OR MONTH(created_at) = 5 OR MONTH(created_at) = 6 ";
					break;
				case '05':
					$monthSelect .= "MONTH(created_at) = 4 OR MONTH(created_at) = 5 OR MONTH(created_at) = 6 ";
					break;
				case '06':
					$monthSelect .= "MONTH(created_at) = 4 OR MONTH(created_at) = 5 OR MONTH(created_at) = 6 ";
					break;
				case '07':
					$monthSelect .= "MONTH(created_at) = 7 OR MONTH(created_at) = 8 OR MONTH(created_at) = 9 ";
					break;
				case '08':
					$monthSelect .= "MONTH(created_at) = 7 OR MONTH(created_at) = 8 OR MONTH(created_at) = 9 ";
					break;
				case '09':
					$monthSelect .= "MONTH(created_at) = 7 OR MONTH(created_at) = 8 OR MONTH(created_at) = 9 ";
					break;
				case '10':
					$monthSelect .= "MONTH(created_at) = 10 OR MONTH(created_at) = 11 OR MONTH(created_at) = 12 ";
					break;
				case '11':
					$monthSelect .= "MONTH(created_at) = 10 OR MONTH(created_at) = 11 OR MONTH(created_at) = 12";
					break;
				case '12':
					$monthSelect .= "MONTH(created_at) = 10 OR MONTH(created_at) = 11 OR MONTH(created_at) = 12";
					break;
				default:
					// code...
					break;
			}
			$result      = mysqli_query($con,$monthSelect);
			if(mysqli_num_rows($result) > 0){
				$revenues = mysqli_fetch_all($result,MYSQLI_ASSOC);
			}
			return $revenues[0]['totalRevenuemonth'];
		}

		public function totalMonth(){
			$month = date("m",time()); 
			$con 		 = $this->connection();
			$monthSelect = "SELECT sum(pay) AS 'totalRevenuemonth' FROM bill_detail 
					 LEFT JOIN bill ON bill_detail.bill_id = bill.bill_ID WHERE MONTH(created_at) = $month";
			$result      = mysqli_query($con,$monthSelect);
			if(mysqli_num_rows($result) > 0){
				$revenues = mysqli_fetch_all($result,MYSQLI_ASSOC);
			}
			return $revenues[0]['totalRevenuemonth'];
		}

		public function totalDay(){
			$today = date("Y-m-d",time()); 
			$con 		 = $this->connection();
			$monthSelect = "SELECT ifnull(sum(pay),0) AS 'totalRevenuemonth' FROM bill_detail 
					 LEFT JOIN bill ON bill_detail.bill_id = bill.bill_ID WHERE created_at > '$today 00:00:00' AND created_at < '$today 23:59:59'";
					 // die($monthSelect);
			$result      = mysqli_query($con,$monthSelect);
			if(mysqli_num_rows($result) > 0){
				$revenues = mysqli_fetch_all($result,MYSQLI_ASSOC);
			}
			return $revenues[0]['totalRevenuemonth'];
		}

	}

?>
