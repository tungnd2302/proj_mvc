
				<div class="col-md-8 infomation_cart_section">
					<h2>
						Cart 
						<span>(3 products)</span>
					</h2>
					<div class="table_infomation_cart_section">
						<div class="row_infomation_cart_section">
							<div class="col_infomation_cart_section" style="width: 30%;text-align: center;">
								<span>Image</span>
							</div>
							<div class="col_infomation_cart_section" style="width: 30%;">
								<span>Name</span>
							</div>
							<div class="col_infomation_cart_section" style="width: 20%;">
								<span>Quantity</span>
							</div>
							<div class="col_infomation_cart_section" style="width: 20%;">
								<span>Price</span>
							</div>
						</div>
						<?php foreach($cart_products as $key => $value): ?>
						<div class="row_infomation_cart_section">
							<div class="col_infomation_cart_section">
								<div class="thumbnail no_border">
				      				<a href="../product_detail/index.php">
				       					 <img src="../backend/public/uploadsFrontend/products/<?php echo $cart_products[$key]['info']['avatar'] ?>" alt="Fjords" style="width:100%" class="img-responsive">
				      				</a>
				   				 </div>
							</div>
							<div class="col_infomation_cart_section">
								<p class="font_bold font18"><?php echo $cart_products[$key]['info']['name'] ?></p>
								<p class="font12"><a href="?controller=cart&action=remove&id=<?php echo $cart_products[$key]['info']['ID'] ?>">Remove</a></p>
							</div>
							<div class="col_infomation_cart_section quantity_form" >
								<input type="number" name="number" class="change_number" id="<?php echo $cart_products[$key]['info']['ID']  ?>" value="<?php echo $cart_products[$key]['qty'] ?>" min=1 max=<?php echo $cart_products[$key]['info']['stock']  ?>>
								<p style="margin-top: 10px; font-size: 12px; color: red">Stock: <?php echo $cart_products[$key]['info']['stock']  ?></p>
								<input type="hidden" name="quantity" value="<?php echo $cart_products[$key]['qty'] ?>">
							</div>
							<div class="col_infomation_cart_section">
								<span class="red_color font18" ><?php echo $cart_products[$key]['info']['price'] * $cart_products[$key]['qty'] ?>$</span>
							</div>
						</div>
						<?php endforeach;?>
					</div>
				</div>
				<div class="col-md-4">
					<h2>
						Price
					</h2>
					<div class="price_total">
						<h3 class="float_left">Price Total:</h3>
						<h4 class="float_right red_color">$<?php echo $total_price ?></h4>
						<div style="clear: both;"></div>
						<a href="?controller=cart&action=payment" class="width100 margin_top_10 btn btn-primary">Pay Now</a>
						<a href="?controller=home&action=index" class="width100 margin_top_10 btn btn-success">Continue to Shoping</a>
					</div>
				</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(".change_number").change(function(event) {
			var id = $(this).attr('id');
			var qty = $(this).val();
		$.ajax({
				url: '?controller=cart&action=changeprice', 
				type: 'POST',
				data: {
					'id'    : id,
					'qty'   : qty
				},
				success: function(data){
					$("#load_cart").html(data);
				}
			})
		});
		<?php if(isset($_SESSION['error'])): ?>
			Command: toastr["success"]("<?php echo $_SESSION['error'] ?>")
					toastr.options = {
					  "closeButton": false,
					  "debug": false,
					  "newestOnTop": false,
					  "progressBar": true,
					  "positionClass": "toast-top-right",
					  "preventDuplicates": false,
					  "onclick": null,
					  "showDuration": "300",
					  "hideDuration": "1000",
					  "timeOut": "5000",
					  "extendedTimeOut": "1000",
					  "showEasing": "swing",
					  "hideEasing": "linear",
					  "showMethod": "fadeIn",
					  "hideMethod": "fadeOut"
					}
		<?php unset($_SESSION['error']); ?>
		<?php endif; ?>
	})
</script>