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
	<section class="main container">
			<h3>PHP store</h3>
			<div class="container">
				<div class="col-md-8 bill_infomation">
					<div class="success_payment">
						<div class="float_left un_float_center_xs" style="margin-right: 10px;">
							<div class="icon icon--order-success svg">
                                <svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
                                    <g fill="none" stroke="#8EC343" stroke-width="2">
                                        <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                                        <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                                    </g>
                                </svg></div>
						</div>
						<div class="float_left thank_message">
							<h4>Thank you for ordering from our online shop</h4>
							<span class="email_confirm">
								A mail send to your email <?php echo $customer['email'] ?> . Please check it!!
							</span>
						</div>
						<div style="clear: both;"></div>
					</div>
					<div class="google_map">
							<iframe width="100%" height="300" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJ3TNQdclUNDEROfJmEo0yO_E&key=AIzaSyDpa7mJX_d6fNA33fRujHDp-u_g_Balwy4" allowfullscreen></iframe>
					</div>
					<div class="payment_infomation">
						<h3>Payment Infomation</h3>
						<table class="table table-responsive">
							<tr>
								<td>Name</td>
								<td><?php echo $customer['name'] ?></td>
							</tr>
							<tr>
								<td>Email</td>
								<td><?php echo $customer['email'] ?></td>
							</tr>
							<tr>
								<td>Phone number</td>
								<td><?php echo $customer['phone'] ?></td>
							</tr>
							<tr>
								<td>Address</td>
								<td><?php echo $customer['address'] ?></td>
							</tr>
						</table>
					</div>
					<div class="button_continue">
						<a href="?controller=home&action=index" class="btn btn-primary" style="100%">Continue to shop</a>
					</div>
				</div>
				<div class="col-md-4 padding_left_10 payment_section" >
					<div class="bill_detail" >
						<h4 class="padding_left_10">#4012<span class="font18"> (3)</span></h4>
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
						<div class="payment_total padding_left_10" style="margin-top: 30px;">
							<div class="sub_total">
								<div class="float_left">Sub total</div>
								<div class="float_right">$<?php echo $total_price + $discount - 30; ?></div>
								<div style="clear: both;"></div>
							</div>
							<div class="total_transport_fee">
								<div class="float_left">Shipment fee</div>
								<div class="float_right">$30</div>
								<div style="clear: both;"></div>
							</div>

							<div class="sub_total">
								<div class="float_left">Discount</div>
								<div class="float_right">$<?php echo $discount ?></div>
								<div style="clear: both;"></div>
							</div>
							

							<div class="total_purchase">
								<div class="float_left font24">Total</div>
								<div class="float_right font24 red_color">$<?php echo $total_price ?></div>
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
	<script type="text/javascript" src="../../assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="../../assets/js/bootstrap.js"></script>
	<script type="text/javascript" src="../../assets/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="../../assets/js/main.js"></script>
</body>
</html>