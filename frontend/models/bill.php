<?php 
	require_once('models/model.php');
	class bill extends model{
		public function insert($request){
			$con = $this->connection();
			$queryInsert = "INSERT INTO bill(customer_ID,price,discount,customer_name,Code,customer_phone,customer_address) VALUES 
							({$request['customer_ID']},'{$request['price']}','{$request['discount']}','{$request['customer_name']}','{$request['code']}','{$request['customer_phone']}','{$request['customer_address']}')";
							// die($queryInsert);
			$result = mysqli_query($con,$queryInsert);
			$id  = mysqli_insert_id($con);


			$queryInsert1  = '';
			$queryInsert1 .= "INSERT INTO bill_detail(bill_ID,product_name,quantity,price,pay)";  
			$queryInsert1 .= "VALUES";
			foreach ($request['cart'] as $key => $value) {
				$queryInsert1 .= '('.$id . ",'";
				$queryInsert1 .= $request['cart'][$key]['info']['name'] . "',";
				$queryInsert1 .= $request['cart'][$key]['qty'] .',';
				$queryInsert1 .= $request['cart'][$key]['info']['price'] .',';
				$queryInsert1 .= $request['cart'][$key]['info']['price'] * $request['cart'][$key]['qty']  .'),';
			}
			$queryInsert1=rtrim($queryInsert1,", ");
			$result1 = mysqli_query($con,$queryInsert1);
			return $result;
		}

		public function updateStock($request){
			$con = $this->connection();
			foreach ($request['cart'] as $key => $value) {
				$selectStock = "SELECT stock FROM products WHERE ID = ".$request['cart'][$key]['info']['ID'];
				$result_selectStock = mysqli_query($con,$selectStock);
				if(mysqli_num_rows($result_selectStock) > 0){
					$stock = mysqli_fetch_all($result_selectStock,MYSQLI_ASSOC);
				}
				$lastStock = $stock[0]['stock'];
				$currentStock = $lastStock - $request['cart'][$key]['qty'];
				// echo $currentStock;
				$update_stock = "UPDATE products SET stock = $currentStock WHERE ID = ".$request['cart'][$key]['info']['ID'];
				$result_stock = mysqli_query($con,$update_stock);
			}
		}

		public function mail($request){
			$to = $request['email'];
			$subject = "HTML email";

			$message = '
			<html>
			<head>
			<title>Thank for purchasing from our Shop</title>
			</head>
			<body>
			<p>Dear '.$request['customer_name'].'</p>
			<p>Thank you for purchasing from our shop, check your cart again, please</p>
			<table border="1" width="100%" cellspacing="1">
			<tr>
				<th>Product name</th>
				<th>Quantity</th>
				<th>Total Price</th>
			</tr>
			<tr>';
			foreach ($request['cart'] as $key => $value) {
			$message .= '
						<td style="text-align:center">'.$request['cart'][$key]['info']['name'].'</td>
						<td style="text-align:center">'.$request['cart'][$key]['qty'].'</td>
						<td style="text-align:center">'.$request['cart'][$key]['info']['price'] * $request['cart'][$key]['qty'].'$</td>
						';
			}
			$message .= '<tr colspan=2>
							<th>Bill price total</th>
							<th></th>
							<th>'.$request['price'].'$</th>
						</tr>';		
			$message .= '</tr></table></body></html>';
			// die($message);

			// Always set content-type when sending HTML email
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$result = mail($to,$subject,$message,$headers);
		}


	}

?>