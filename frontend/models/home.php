<?php 
	require_once('models/model.php');
	class home extends model{
		public function loginAuth($email,$password){
			$con = $this->connection();
			$querySelect = "SELECT * FROM customers where email = '$email' and password='$password'";
			$result = mysqli_query($con,$querySelect);
			if(mysqli_num_rows($result) < 1){
				return '0';
			}
			return '1';
		}
		public function findUser($email){
			$con = $this->connection();
			$queryFinds = "SELECT email FROM customers";
			$finds = mysqli_query($con,$queryFinds);
			if($finds){
				if(mysqli_num_rows($finds) > 0){
					$findsArray = mysqli_fetch_all($finds,MYSQLI_ASSOC); 
					foreach ($findsArray as $find) {
						// echo $find['name'] . "<br/>";
						if($find['email'] == $email){
							return '1';
						}
					}
				}else{
					return '0';
				}
			}
		}

		public function register($request){
			$con = 	$con = $this->connection();
			$queryInsert = "INSERT INTO customers(name,email,password,phone) VALUES ('{$request['name']}','{$request['email']}','{$request['password']}','{$request['phone']}')";
			$result = mysqli_query($con,$queryInsert);
			return $result;
		}
	}

?>