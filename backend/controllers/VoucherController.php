<?php 
require_once('controllers/Controller.php');
require_once('models/voucher.php');
class VoucherController extends Controller{
		public function list(){
			$voucherList = new voucher();
			$vouchers = $voucherList->getAll();
			require_once('views/voucher/list.php');
		}

		public function create(){
			if(isset($_POST['create'])){
				// $content = $_POST['typeVoucher'];
				// $charge  = isset($_POST['charge'])  ? $_POST['charge'] : '0'; 
				// $percent = isset($_POST['percent']) ? $_POST['percent'] : '0';
				$type = $_POST['typeVoucher'];
				if($type == 'discount_by_charge'){
					$content = $_POST['charge'];
				}else{
					$content = $_POST['percent'];
				}

				$expire =  $_POST['expire'];
				if($expire == 'Other'){
					$expire = $_POST['type_expire'];
				}else{
					$expire =  $_POST['expire'];
				}
				$expire = (int)$expire;
				 
				$date = date('m/d/Y', time());		
				$currentDate = strtotime($date);
				$currentDate = $currentDate + $expire * 86500;
				$outdate = date('Y-m-d',$currentDate);

				$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			    $charactersLength = strlen($characters);
			    $description = '';
			    for ($i = 0; $i < 5; $i++) {
			        $description .= $characters[rand(0, $charactersLength - 1)];
			    }
			    $requests = [
			    	'type'        => $type,
			    	'content'     => $content,
			    	'description' => $description,
			    	'outdate'     => $outdate,
			    ];
			    $voucherModel = new voucher();
			    $vouchers = $voucherModel->create($requests);
			    if($vouchers){
			    	header("location:?controller=voucher&action=list");
			    	$_SESSION['success'] = "Create a voucher successfully";
			    	return;
			    }
			}
			require_once('views/voucher/create.php');
		}

		public function delete(){
			if(empty($_GET['id']) || !is_numeric($_GET['id'])){
					$_SESSION['error'] = "Parameter is not valid";
						header("location:?controller=voucher&action=list");
				return;
			}else{
				$voucherDelete = new voucher();
				$voucher = $voucherDelete->delete($_GET['id']);
				if($voucher){
					header("location:?controller=voucher&action=list");
			    	$_SESSION['success'] = "Delete a voucher successfully";
			    	return;
				}
			}
		}

		public function mail(){
			require_once('views/voucher/mail.php');
		}
	}

?>