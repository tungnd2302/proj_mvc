<?php 
	require_once('models/model.php');
	class employees extends model{
		public function getAll(){
			$con = $this->connection();
			$querySelect = "SELECT * FROM employees";
			$result = mysqli_query($con,$querySelect);
			$categories = [];
			if(mysqli_num_rows($result) > 0){
				$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			return $categories;
		}

		public function create($request){
			$con = $this->connection();
			$queryInsert = "INSERT INTO employees(username,password,fullname,role,status,created_by) VALUES ('{$request['username']}','{$request['password']}','{$request['fullname']}','{$request['role']}','{$request['status']}','{$request['created_by']}')";
			// die($queryInsert);
			$result = mysqli_query($con,$queryInsert);
			return $result;
		}

		public function findUser($username){
			$con = $this->connection();
			$queryFinds = "SELECT username FROM employees";
			$finds = mysqli_query($con,$queryFinds);
			if($finds){
				if(mysqli_num_rows($finds) > 0){
					$findsArray = mysqli_fetch_all($finds,MYSQLI_ASSOC); 
					foreach ($findsArray as $find) {
						// echo $find['name'] . "<br/>";
						if($find['username'] == $username){
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
			$queryDelete = "DELETE FROM employees WHERE ID =". $id;
			$result = mysqli_query($con,$queryDelete);
			return $result;
		}

		public function getByID($id){
			$con = $this->connection();
			$queryGet = "SELECT * FROM employees WHERE ID =". $id;
			$result = mysqli_query($con,$queryGet);
			$employee = [];
			if(mysqli_num_rows($result) > 0){
				$employeesArray = mysqli_fetch_all($result,MYSQLI_ASSOC);
				$employee = $employeesArray[0];
			}
			return $employee;
		}

		public function findUsernameAndID($id,$username){
			$con = $this->connection();
			$queryFinds = "SELECT username FROM employees WHERE ID NOT LIKE $id";
			$finds = mysqli_query($con,$queryFinds);
			if($finds){
				if(mysqli_num_rows($finds) > 0){
					$findsArray = mysqli_fetch_all($finds,MYSQLI_ASSOC); 
					foreach ($findsArray as $find) {
						// echo $find['name'] . "<br/>";
						if($find['username'] == $username){
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
			$queryUpdate = "UPDATE employees SET username = '{$request['username']}' ,fullname = '{$request['fullname']}' ,role = '{$request['role']}' where ID = '{$request['id']}'";
			$result = mysqli_query($con,$queryUpdate);
			return $result;
		}

		public function changeStatus($request){
			$con = $this->connection();
			$status = $request['status'];
			$id     = $request['id'];
			$queryChange = "UPDATE employees SET status = ";
			if($status == 'active'){
				$queryChange .= "'active' ";
			}else{
				$queryChange .= "'inactive' ";
			}
			$queryChange .= "where ID = $id";
			$result = mysqli_query($con,$queryChange);
			return $result;
		}

		public function resetPassword($id,$password){
			$con = $this->connection();
			$queryUpdate = "UPDATE employees SET password = '$password' where ID = '{$request['id']}'";
			$result = mysqli_query($con,$queryUpdate);
			return $result;
		}

		public function employeeupdate($request){
			$con = $this->connection();
			$queryUpdate = "UPDATE employees SET fullname = '{$request['fullname']}',birthday = '{$request['birthday']}',email = '{$request['email']}', phone = '{$request['phone']}' , avatar = '{$request['avatar']}'  where ID = '{$request['id']}'";
			$result = mysqli_query($con,$queryUpdate);
			return $result;
		}

		public function getPasswordByID($password,$id){
			$con = $this->connection();
			$queryFind = "SELECT password FROM employees WHERE ID = $id";
			$result = mysqli_query($con,$queryFind);
			if(mysqli_num_rows($result) > 0 ){
				$employee = mysqli_fetch_all($result,MYSQLI_ASSOC);
				if(md5($password) != $employee[0]['password']){
					return 0;
				}

			}
			return 1;
		}

		public function resetPasswordEmployee($password,$id){
			$con = $this->connection();
			$queryUpdate = "UPDATE employees SET password = '$password' where ID = $id ";

			$result = mysqli_query($con,$queryUpdate);
			return $result;
		}

		public function countEmployees(){
			$con = $this->connection();
			$queryCount = "SELECT COUNT(id) as qty FROM employees";

			$result = mysqli_query($con,$queryCount);
			if(mysqli_num_rows($result) > 0){
				$countArr[0] = mysqli_fetch_all($result,MYSQLI_ASSOC);
			}
			return $countArr[0][0]['qty'];

		}
	}

?>