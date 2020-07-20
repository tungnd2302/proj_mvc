<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link rel="stylesheet" type="text/css" href="public/assets/css/bootstrap.min.css">
	<!-- Font awesome -->
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<!-- Owl carousel -->
	<link rel="stylesheet" type="text/css" href="public/assets/css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="public/assets/css/owl.theme.default.min.css">
	<!-- Toastr -->
	<link rel="stylesheet" type="text/css" href="public/assets/css/toastr.css">
	<!-- Main -->
	<link rel="stylesheet" type="text/css" href="public/assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="public/assets/css/default.css">
	<link rel="stylesheet" type="text/css" href="public/assets/css/responsive.css">
	<link rel="stylesheet" type="text/css" href="public/assets/css/effect.css">

</head>
<body>
	<!-- Body -->
	<section class="main container" id="loadall">
		<!--- Breadcumb -->
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="?controller=home&action=index">Home</a></li>
			    <li class="breadcrumb-item active" aria-current="page">Payment</li>
			  </ol>
			</nav>
		<!--- End readcumb -->
			<h3>PHP store</h3>
			<div class="container-fluid">
				<div class="col-md-4 bill_infomation">
					<div class="header_infomation">
						<h4 class="float_left">Bill Infomation</h4>
						<?php if(!isset($_SESSION['customer'])): ?>
						<p class="float_right">
							<a href="?controller=home&action=login">
								<i class="fa fa-user-circle"></i>Login
								<?php $_SESSION['login'] = '123' ?>
							</a>
						</p>
						<?php endif; ?>
						<div style="clear: both;"></div>
					</div>
					<div class="body_infomation">
						<?php if(isset($_SESSION['error'])): ?>
							<div class="alert alert-warning">
								<?php 
									echo $_SESSION['error'];
									unset($_SESSION['error']);
								?>
							</div>
						<?php endif; ?>
						<form action="?controller=cart&action=purchase" method="post">
							<div class="form-group">
								<input type="text" name="email" placeholder="Your email" class="form-control" value="<?php echo isset($_SESSION['customer']['email']) ? $_SESSION['customer']['email'] : '' ?>">
							</div>

							<div class="form-group">
								<input type="text" name="name" placeholder="Your name" class="form-control" value="<?php echo isset($_SESSION['customer']['name']) ? $_SESSION['customer']['name'] : '' ?>">
							</div>

							<div class="form-group">
								<input type="text" name="phone" placeholder="Your phone" class="form-control" value="<?php echo isset($_SESSION['customer']['phone']) ? $_SESSION['customer']['phone'] : '' ?>">
							</div>

							<div class="form-group">
								<input type="text" name="address" placeholder="Your Address" class="form-control" value="<?php echo isset($_SESSION['customer']['address']) ? $_SESSION['customer']['address'] : '' ?>">
							</div>

							<div class="form-group">
								<textarea name="note" placeholder="Note" class="form-control"></textarea>
							</div>
						
					</div>

				</div>
				<div class="col-md-4 bill_transport">
					<h4 class="no_padding">Transport</h4>
					<div class="row transport_fee">
						<div class="float_left">
							<i class="fa fa-bus"></i><span>Transport fees</span>
						</div>
						<div class="float_right">
							<span class="red_color">$30</span>
						</div>
						<div styles="clear: both;"></div>
					</div>
				</div>
				<div class="col-md-4 padding_left_10 payment_section" >
					<div class="bill_detail" >
						<h4 class="padding_left_10">Bill<span class="font18"> (3 products)</span></h4>
						<div class="wrap_bill_detai">
							<div class="table_bill_detail">
								<?php foreach($cart_products as $key => $value): ?>
								<div class="row_bill_detail">
									<div class="col_bill_detail" style="width: 25%;">
										<a href="?controller=cart&action=list" style="display: block;">
					       					 <img src="../backend/public/uploadsFrontend/products/<?php echo $cart_products[$key]['info']['avatar'] ?>" alt="Fjords" style="width:70%; position: relative;" class="img-responsive" >
					       					 <span class="quantity_thumbnail"><?php echo $cart_products[$key]['qty'] ?></span>
					      				</a>
									</div>
									<div class="col_bill_detail">
										<span><?php echo $cart_products[$key]['info']['name'] ?></span>
									</div>
									<div class="col_bill_detail">
										<span>$<?php echo $cart_products[$key]['info']['price'] * $cart_products[$key]['qty'] ?></span>
									</div>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
						<?php $discount = (isset($content)) ? $content : 0 ?>
						<input type="hidden" name="discount" value="<?php echo $discount; ?>">
						<div class="payment_total padding_left_10" id="loadDiscount">
							<div class="sale_code">
									<div class="form-group">
										<input type="text" name="discount" class="form-control" placeholder="Type your discount" style="width: 80%; display: inline;" id="discount">
										<a class="btn btn-danger" style="margin-top: -3px;" id="apply">Apply</a>
									</div>
									<p class="red_color" id="error_noti"></p>
							</div>
							<div class="sub_total">
								<div class="float_left">Sub total</div>
								<div class="float_right">$<?php echo $total_price; ?></div>
								<div style="clear: both;"></div>
							</div>
							<div class="total_transport_fee">
								<div class="float_left">Shipment fee</div>
								<div class="float_right">$30</div>
								<div style="clear: both;"></div>
							</div>
							<div class="sub_total">
								<div class="float_left">Discount</div>
								<div class="float_right red_color" id="discount_value">$<?php echo $discount; ?></div>
								<div style="clear: both;"></div>
								<input type="hidden" name="discount_hidden" value="<?php echo $discount; ?>" id ="discount_hidden">
							</div>
							<div class="total_purchase">
								<div class="float_left font24">Total</div>
								<div class="float_right font24 red_color" id="total_price_ajax">$<?php echo $total_price - $discount ?></div>
								<input type="hidden" name="total_price_hidden" value="<?php echo $total_price ?>" id="total_price_hidden">
								<div style="clear: both;"></div>
							</div>
						</div>
						<div>
							<div class="final_payment padding_left_10">
								<div class="float_left">
									<a href="?controller=cart&action=list">
										<i class="fa fa-chevron-left"><span>Back to cart</span></i>
									</a>
								</div>
								<div class="float_right">
									<button type="submit" name="purchase" class="btn btn-primary">Purchase</button>
								</div>
							</form>
								<div style="clear: both;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>

	</section>
	<!-- End body -->
	<button  id='toTop' class="btn btn-primary">
		<span class="glyphicon glyphicon-chevron-up"></span>
	</button>
	<!-- End back to top -->
	<script type="text/javascript" src="public/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="public/assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="public/assets/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="public/assets/js/toastr.min.js"></script>
	<script type="text/javascript" src="public/assets/js/main.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#apply").on('click',function(event){
				// alert('hi');
				var discount = $("#discount").val();
				if(discount == ""){
					$('#error_noti').html("You must type voucher code");
				}else{
					$.ajax({
						url: '?controller=discount&action=checkdiscount	',
						type: 'POST',
						dataType: 'JSON',
						data: {
							'discount' : discount
						},
						success: function(data){
							// $('#loadDiscount').html(data);
							console.log('ok');
							$('#discount_value').html('$' + data.content);
							$('#total_price_ajax').html('$' + data.total_discount_price);
							$('#total_price_hidden').attr('value',data.total_discount_price);
							$('#discount_hidden').attr('value',data.content);
						}
					})
				}
			})
		})
	</script>
</body>
</html>