<?php 
	require_once('models/model.php');
	class home extends model{
		public function loginAuth($username,$pasword){
			$con = $this->connection();
			$querySelect = "SELECT username,password,status FROM employees where username = '$username'";
			$result = mysqli_query($con,$querySelect);
			if(mysqli_num_rows($result) < 1){
				return '0';
			}else{
				$auth = mysqli_fetch_all($result,MYSQLI_ASSOC);
				if($auth[0]['status'] == 'inactive'){
					return '3';
				}elseif($pasword == $auth[0]['password']){
					return '2';
				}else{
					return '1';
				}
			}
		}

		public function getByUsername($username){
			$con = $this->connection();
			$queryGet = "SELECT * FROM employees WHERE username = '$username'";
			$result = mysqli_query($con,$queryGet);
			$employee = [];
			if(mysqli_num_rows($result) > 0){
				$employeesArray = mysqli_fetch_all($result,MYSQLI_ASSOC);
				$employee = $employeesArray[0];
			}
			return $employee;
		}
	}

?>