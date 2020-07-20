<?php 
	require_once('controllers/Controller.php');
	require_once('models/discount.php');
	class DiscountController extends Controller
	{
	    public function checkdiscount(){
	    	$discount = $_POST['discount'];
			$discountModel = new discount();
			$content = $discountModel->checkdiscount($discount);


			$cart_products = $_SESSION['cart'];
				$total_price = 0;
				foreach ($cart_products as $key => $value) {
					$total_price += $cart_products[$key]['info']['price'] * $cart_products[$key]['qty'];
				}
				$error = '';
			if($content == 'fail'){
				$error = "Code is not exist";
			}else{
				// var_dump($content[0]['Outdate']);
				date_default_timezone_set("Asia/Bangkok");
				$currentTime_1 = date('d-m-Y',time());
				$currentTime   = strtotime($currentTime_1);

				$outdate   = strtotime($content[0]['Outdate']);

				if($currentTime > $outdate){
					$error = "Code is not expire";
				}else{
					if($content[0]['type'] == 'discount_by_charge'){
						$content = (int)$content[0]['Content'];
						$total_discount_price = $total_price - $content + 30;
						if($total_discount_price < 0){
							$total_discount_price = 1;
						}	
					}else{
						$content_discount = (int)$content[0]['Content'] ;
						$content              = round($content_discount * $total_price / 100);
						$total_discount_price = $total_price - $content  + 30;
						$total_discount_price = round($total_discount_price);
						if($total_discount_price < 0){
							$total_discount_price = 1;
						}	
					}
					// echo '<pre>';
					// print_r($_SESSION['voucher']);
					// die();
				}
				// $_SESSION['voucher']['info']  = $content;
				$data = [
					'content' => $content,
					'total_discount_price' => $total_discount_price,
					'error'                => $error,
				];
				echo json_encode($data);
			}
		
	    }
	}
?>