<?php 
	require_once('models/model.php');
	class brands extends model{
		public function getAll(){
			$con = $this->connection();
			$querySelect = "SELECT * FROM brands where status = 'active' LIMIT 4";
			$result = mysqli_query($con,$querySelect);
			$brands = [];
			if(mysqli_num_rows($result) > 0){
				$brands = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			return $brands;
		}

		public function create($request){
			$con = $this->connection();
			$name = ucfirst($request['name']);
			$queryInsert = "INSERT INTO brands(name,status,created_by) VALUES ('$name','{$request['status']}','{$request['created_by']}')";
			// die($queryInsert);
			$result = mysqli_query($con,$queryInsert);
			return $result;
		}

		public function find($name){
			$nameFind = ucfirst($name);
			echo $nameFind;
			$con = $this->connection();
			$queryFinds = "SELECT name FROM brands";
			$finds = mysqli_query($con,$queryFinds);
			if($finds){
				if(mysqli_num_rows($finds) > 0){
					$findsArray = mysqli_fetch_all($finds,MYSQLI_ASSOC); 
					foreach ($findsArray as $find) {
						// echo $find['name'] . "<br/>";
						if($find['name'] == $nameFind){
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
			$queryDelete = "DELETE FROM brands WHERE ID =". $id;
			$result = mysqli_query($con,$queryDelete);
			return $result;
		}

		public function getByID($id){
			$con = $this->connection();
			$queryGet = "SELECT * FROM brands WHERE ID =". $id;
			$result = mysqli_query($con,$queryGet);
			$brand = [];
			if(mysqli_num_rows($result) > 0){
				$brandsArray = mysqli_fetch_all($result,MYSQLI_ASSOC);
				$brand = $brandsArray[0];
			}
			return $brand;
		}

		public function getNameAndID($id,$name){
			$nameFind = ucfirst($name);
			$con = $this->connection();
			$queryFinds = "SELECT name FROM category WHERE ID NOT LIKE $id";
			$finds = mysqli_query($con,$queryFinds);
			if($finds){
				if(mysqli_num_rows($finds) > 0){
					$findsArray = mysqli_fetch_all($finds,MYSQLI_ASSOC); 
					foreach ($findsArray as $find) {
						// echo $find['name'] . "<br/>";
						if($find['name'] == $nameFind){
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
			$name = ucfirst($request['name']);
			$queryUpdate = "UPDATE category SET name = '$name' , status = '{$request['status']}' where ID = '{$request['id']}'";
			$result = mysqli_query($con,$queryUpdate);
			return $result;
		}

		public function changeStatus($request){
			$con = $this->connection();
			$status = $request['status'];
			$id     = $request['id'];
			$queryChange = "UPDATE brands SET status = ";
			if($status == 'active'){
				$queryChange .= "'active' ";
			}else{
				$queryChange .= "'inactive' ";
			}
			$queryChange .= "where ID = $id";
			$result = mysqli_query($con,$queryChange);
			return $result;
		}

	}

?>