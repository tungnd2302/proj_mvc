<?php require_once('views/layouts/header.php'); ?>
	<!-- Body -->
	<section class="main container margin_bottom_30">
		<!--- Breadcumb -->
			<nav aria-label="breadcrumb" class="margin_top_80" style="margin-top: 80px;">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="#">Home</a></li>
			    <li class="breadcrumb-item active" aria-current="page">Detail</li>
			  </ol>
			</nav>
		<!--- End readcumb -->
		<!--- Phone section -->
			<div class="phone_section container">
				<!--- Head section -->
				<div class="head_section">
					<h2><?php echo $product['brand_name']. ' '.$product['name'] ?></h2>
					<div class="rating_result">
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="glyphicon glyphicon-star"></span>
						<span class="reviews"><?php echo $comments_qty ?> reviews</span>
					</div>
					<div class="clear_fix"></div>
				</div>
				<!--- End head section -->

				<!--- Product Infomation section -->
				<div class="row product_infomation">
					<div class="col-md-4">
						<div class="image_product_infomation">
							<img src="../backend/public/uploadsFrontend/products/<?php echo $product['avatar'] ?>" class="img-responsive" style="height: 225px;">
						</div>
					</div>
					<div class="col-md-4">
						<div class="price_product_infomation">
							<?php if(!$product['stock'] == 0): ?>
							<strong class="red_color no_margin">$<?php echo $product['price'] ?></strong>
							<label class="installment">Installment 0%</label>
							<p class="available red_color">Available from our shop (<?php echo $product['stock'] ?> products)</p>
							<p class="buy_button">
								<a class="btn btn-success add_to_cart" id="<?php echo $product['ID'] ?>">
									<span class="fa fa-plus"></span>Add to cart
								</a>
							</p>
							<p class="cart_button">
								<a href="?controller=cart&action=payment&id=<?php echo $product['ID'] ?>" class="btn btn-primary">
									<span class="fa fa-shopping-cart"></span>Buy now
								</a>
							</p>
							<?php else: ?>
							<p class="available"><h3 class="red_color">This product is not available</h3></p>
							<?php endif; ?>
							<ul class="extra_infomation">
								<li>Get a voucher upto 1000$ to buy third product in same session</li>
								<li>Support to install application, syncorise data at home</li>
								<li>Get a warranty combo upto 1 year</li>
							</ul>
						</div>
					</div>
					<div class="col-md-4">
						<div class="specifications_product_info">
							<strong class="red_color no_margin">Specifications</strong>
							<div class="table_specifications">
								<div class="row_specification">
									<div class="col_specification">
										Display size:
									</div>
									<div class="col_specification">
										5.5 inches
									</div>
								</div>
								<div class="row_specification">
									<div class="col_specification">
										Memory:
									</div>
									<div class="col_specification">
										128Gb
									</div>
								</div>
								<div class="row_specification">
									<div class="col_specification">
										RAM:
									</div>
									<div class="col_specification">
										2Gb
									</div>
								</div>
								<div class="row_specification">
									<div class="col_specification">
										OS
									</div>
									<div class="col_specification">
										IOS 11
									</div>
								</div>
								<div class="row_specification">
									<div class="col_specification">
										Annouced
									</div>
									<div class="col_specification">
										2016, September
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--- End Product Infomation section -->
				

				<!--- Description -->
				<div class="row description">
					<div class="col-md-9">
						<ul class="nav nav-tabs">
						    <li class="active"><a data-toggle="tab" href="#review">Descriptions</a></li>
						    <li><a data-toggle="tab" href="#menu1">Reviews</a></li>
						 </ul>

						 <div class="tab-content">
						    <div id="review" class="tab-pane fade in active">
						      <h3>Descriptions</h3>
						     	<?php echo $product['description'] ?>
						    </div>
						    <div id="menu1" class="tab-pane fade">
						      <h3>Comments <span class="font12">(<i><?php echo $comments_qty ?></i> comments)</span></h3> 
						      <form method="post" id="comment_form">
						      	<input type="hidden" name="id" value="<?php echo $product['ID'] ?>">
						      	<div class="form-group">
						      		<input type="text" name="fullname" placeholder="Type your fullname" class="form-control">
						      	</div>
						      	<div class="form-group">
						      		<textarea name="comment" class="form-control" style="height: 125px;" placeholder="Type your comment"></textarea>
						      	</div>
						      	<div class="form-group">
						      		<input type="submit" name="submit" value="Send" class="btn btn-default"style="width: 100%">
						      	</div>
							   </form>
							   <div id="status_message"></div>
							   <br>
							   <div id="display_comment">
							   </div>
						    </div>
						 </div>
					</div>
					<div class="col-md-3 product_relate">
						<h3>Products Relate</h3>
						<?php foreach($relate_products as $relate_product): ?>
						<div class="thumbnail" style="margin-top: 20px;">
					      <a href="?controller=products&action=detail&id=<?php echo $relate_product['ID']  ?>">
					        <img src="../backend/public/uploadsFrontend/products/<?php echo $relate_product['avatar'] ?>" alt="Nature" style="width:100%;height: 225px;">
					        <div class="caption content_center">
					          <p><?php echo $relate_product['name'] ?></p>
					          <p class="price">$<?php echo $relate_product['price'] ?></p>
					        </div>
					      </a>
					    </div>
						<?php endforeach; ?>
					</div>
				</div>
				<!--- End desscription -->

			</div>
		<!--- End Phone section -->

	</section>
	<!-- End body -->

	<!-- Footer -->
	<?php require_once('views/layouts/footer.php'); ?>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#comment_form").on('submit',function(event){
			event.preventDefault();
			var form_data = $(this).serialize();
			$.ajax({
				url:'?controller=products&action=sendComment',
				method: 'POST',
				data: form_data,
				dataType: "JSON",
				success:function(data)
				{
					$('#status_message').html('success');
					if(data.error != '')
					{
						$('#comment_form')[0].reset();
						$('#status_message').html(data.error);
					}else{
						$('#status_message').html('hihiih');
					}
				}
			})
		})
		load_comment();
		function load_comment(){
			$.ajax({
				url:'?controller=products&action=showComment',
				method: 'POST',
				data: {
					'id' : <?php echo $product['ID'] ?>,
				},
				success:function(data){
					$('#display_comment').html(data);
				}
			})
		}

		$(".add_to_cart").click(function(){
			var id = $(this).attr('id');
			$.ajax({
				url:'?controller=cart&action=add',
				method: 'POST',
				data: {
					'id' : id,
				},
				success:function(data){
					Command: toastr["success"]("Product add, Do you wanna go to cart?")
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
				}
			})
					toastr.options.onclick = function() {
						location.href = "?controller=cart&action=list";
					}
		})


	})
	</script>