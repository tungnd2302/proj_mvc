<?php 
	require_once('models/model.php');
	class category extends model{
		public function getAll(){
			$con = $this->connection();
			$querySelect = "SELECT * FROM category";
			$result = mysqli_query($con,$querySelect);
			$categories = [];
			if(mysqli_num_rows($result) > 0){
				$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
			}
			return $categories;
		}

		public function create($request){
			$con = $this->connection();
			$name = ucfirst($request['name']);
			$queryInsert = "INSERT INTO category(name,status,created_by) VALUES ('$name','{$request['status']}','{$request['created_by']}')";
			// die($queryInsert);
			$result = mysqli_query($con,$queryInsert);
			return $result;
		}

		public function find($name){
			$nameFind = ucfirst($name);
			echo $nameFind;
			$con = $this->connection();
			$queryFinds = "SELECT name FROM category";
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
			$queryDelete = "DELETE FROM category WHERE ID =". $id;
			$result = mysqli_query($con,$queryDelete);
			return $result;
		}

		public function getByID($id){
			$con = $this->connection();
			$queryGet = "SELECT * FROM category WHERE ID =". $id;
			$result = mysqli_query($con,$queryGet);
			$category = [];
			if(mysqli_num_rows($result) > 0){
				$categoryArray = mysqli_fetch_all($result,MYSQLI_ASSOC);
				$category = $categoryArray[0];
			}
			return $category;
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
			$queryChange = "UPDATE category SET status = ";
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