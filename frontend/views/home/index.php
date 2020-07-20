<?php require_once('views/layouts/header.php'); ?>
<?php 
	// echo '<pre>';
	// print_r($products);
	// echo '</pre>';
?>
	<!-- End Navigation bar -->

	<!-- owl Carousel -->
	<div class="section section-header view-snippet-section-header owl_carousel_sm">
		<div class="owl-one owl-carousel owl-theme">
            <div class="item">
              <img src="public/assets/images/home/ipad.jpg" min-height="700px;">
            </div>
            <div class="item">
              <img src="public/assets/images/home/iphone.jpg" min-height="700px;">
            </div>
            <div class="item">
             <img src="public/assets/images/home/samsungs10.jpg" min-height="700px;">
            </div>
            <div class="item">
             <img src="public/assets/images/home/samsunggear.jpg" min-height="700px;">
            </div>
            <div class="item">
              <img src="public/assets/images/home/applewatch.jpg" min-height="700px;">
            </div>
          </div>
	</div>
	<!-- End owl Carousel -->
	
	<!-- Body -->
	<section class="main container-fluid margin_bottom_30">
		<!--- Search form -->
		<form action="#" method="post" class="form-inline text-center margin_bottom_30 sticky_form">
				<div class="form-group">
					<input type="text" name="search" class="form-control" id="search_field" placeholder="Search something....">
					<button type="submit" name="submit" id="searchBtn" class="btn btn-warning">
						<span class="fa fa-search"></span>
					</button>
				</div>
		</form>
		<div class="form_result">
			
		</div>

		<!--- End search form -->
		<!--- Service -->
		<div class="service row">
			<h2 class="text-center">Our Service</h2>
				<div class="col-md-3 col-sm-12 text_center_sm_xs">
					<div class="col-md-4 col-sm-12">
						<span class="fa fa-mobile" style="font-size: 70px;"></span>
					</div>
					<div class="col-md-8 col-sm-12">
						<p>We Always provide genuine products and warranty at least 1 year</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-12 text_center_sm_xs">
					<div class="col-md-4 col-sm-12">
						<span class="fa fa-exchange" style="font-size: 70px;"></span>
					</div>
					<div class="col-md-8 col-sm-12">
						<p>We can exchange old device to buy new ones and one to one within 1 year</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-12 text_center_sm_xs">
					<div class="col-md-4 col-sm-12">
						<span class="fa fa-credit-card" style="font-size: 70px;"></span>
					</div>
					<div class="col-md-8 col-sm-12">
						<p>We support to pay off upto 80% within 1-3 years</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-12 text_center_sm_xs">
					<div class="col-md-4 col-sm-12">
						<span class="fa fa-phone" style="font-size: 70px;"></span>
					</div>
					<div class="col-md-8 col-sm-12">
						<p>Our exchange support 24/7. Call us now</p>
					</div>
			</div>
		</div>
		<!--- End service -->
		<!--- Sale -->
		<div class="container hot_sale margin_bottom_30 no_border_sm_xs">
			<h2 class="text-center" style="margin-bottom: 30px;"> Hot deals </h2>
			<?php foreach ($hotsaleproducts as $hotsaleproduct): ?>
				<div class="col-md-3">
					<div class="thumbnail no_border">
	      				<a href="?controller=products&action=detail&id=<?php echo $hotsaleproduct['ID'] ?>">
	       					 <img src="../backend/public/uploadsFrontend/products/<?php echo $hotsaleproduct['avatar'] ?>" class="img-responsive" alt="Fjords" style="width:100%">
	        				 <div class="caption content_center">
	          			     	<p><?php echo $hotsaleproduct['name'] ?></p>
	       					 </div>
	      				</a>
	   				 </div>
				</div>
			<?php endforeach; ?>
		</div>
		<!--- End sale -->
		<div class="container product_groups">
			<!--- phone Only -->
			<div class="phone_phone margin_bottom_30">
				<div class="row">
					<div class="col-md-6">
						<h3>Phone</h3>
					</div>
				</div>
				<div class="row phone_products">
					<?php foreach($phones as $phone): ?>
						<div class="col-md-2">
							<div class="thumbnail no_border">
			      				<a class="no_underline" href="?controller=products&action=detail&id=<?php echo $phone['ID'] ?>">
			       					 <img src="../backend/public/uploadsFrontend/products/<?php echo $phone['avatar'] ?>" alt="Fjords" style="width:100%">
			        				 <div class="caption content_center">
			          			     	<p class="product_title"><?php echo $phone['name'] ?></p>
			          			     	<p class="price">$<?php echo $phone['price'] ?></p>
			       					 </div>
			      				</a>
			   				 </div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="see_more">
					<a href="?controller=products&action=<?php echo $phone['category_name'] ?>" class="text-center">See More</a>
				</div>

			</div>
			<!--- End phone Only -->

			<!-- watch only -->
			<div class="watch_watch margin_bottom_30">
				<div class="row">
					<div class="col-md-6">
						<h3>Watch</h3>
					</div>
				</div>
				<div class="row phone_products">
					<?php foreach($watches as $watch): ?>
					<div class="col-md-2">
						<div class="thumbnail no_border">
		      				<a class="no_underline" href="?controller=products&action=detail&id=<?php echo $watch['ID'] ?>">
		       					 <img src="../backend/public/uploadsFrontend/products/<?php echo $watch['avatar'] ?>" alt="Fjords" style="width:100%">
		        				 <div class="caption content_center">
		          			     	<p class="product_title"><?php echo $watch['name'] ?></p>
		          			     	<p class="price">$<?php echo $watch['price'] ?></p>
		       					 </div>
		      				</a>
		   				 </div>
		   			</div>
		   			<?php endforeach; ?>
		   		</div>
				<div class="see_more">
					<a href="?controller=products&action=<?php echo $watch['category_name'] ?>" class="text-center">See More</a>
				</div>

			</div>
			<!-- end watch only -->
		</div>

		<div class="container news">
			<div class="row">
				<h3>Tech News</h3>
				<div class="col-md-2">
					<div class="thumbnail no_border">
		      				<a class="no_underline article_link" href="">
		       					 <img src="public/assets/images/home/news1.jpg" alt="Fjords" style="width:100%">
		        				 <div class="caption no_padding">
		          			     	<p class="title_article">BBC Click's Stephen Beckett looks at some of the best of the week's technology news</p>
		          			     	<p class="author">John Adam</p>
		       					 </div>
		      				</a>
		   				 </div>
				</div>

				<div class="col-md-2">
					<div class="thumbnail no_border">
		      				<a class="no_underline article_link" href="">
		       					 <img src="public/assets/images/home/news1.jpg" alt="Fjords" style="width:100%">
		        				 <div class="caption no_padding">
		          			     	<p class="title_article">BBC Click's Stephen Beckett looks at some of the best of the week's technology news</p>
		          			     	<p class="author">John Adam</p>
		       					 </div>
		      				</a>
		   				 </div>
				</div>

				<div class="col-md-2">
					<div class="thumbnail no_border">
		      				<a class="no_underline article_link" href="">
		       					 <img src="public/assets/images/home/news1.jpg" alt="Fjords" style="width:100%">
		        				 <div class="caption no_padding">
		          			     	<p class="title_article">BBC Click's Stephen Beckett looks at some of the best of the week's technology news</p>
		          			     	<p class="author">John Adam</p>
		       					 </div>
		      				</a>
		   				 </div>
				</div>

				<div class="col-md-2">
					<div class="thumbnail no_border">
		      				<a class="no_underline article_link" href="">
		       					 <img src="public/assets/images/home/news1.jpg" alt="Fjords" style="width:100%">
		        				 <div class="caption no_padding">
		          			     	<p class="title_article">BBC Click's Stephen Beckett looks at some of the best of the week's technology news</p>
		          			     	<p class="author">John Adam</p>
		       					 </div>
		      				</a>
		   				 </div>
				</div>

				<div class="col-md-2">
					<div class="thumbnail no_border">
		      				<a class="no_underline article_link" href="">
		       					 <img src="public/assets/images/home/news1.jpg" alt="Fjords" style="width:100%">
		        				 <div class="caption no_padding">
		          			     	<p class="title_article">BBC Click's Stephen Beckett looks at some of the best of the week's technology news</p>
		          			     	<p class="author">John Adam</p>
		       					 </div>
		      				</a>
		   				 </div>
				</div>

				<div class="col-md-2">
					<div class="thumbnail no_border">
		      				<a class="no_underline article_link" href="">
		       					 <img src="public/assets/images/home/news1.jpg" alt="Fjords" style="width:100%">
		        				 <div class="caption no_padding">
		          			     	<p class="title_article">BBC Click's Stephen Beckett looks at some of the best of the week's technology news</p>
		          			     	<p class="author">John Adam</p>
		       					 </div>
		      				</a>
		   				 </div>
				</div>
			</div>
			<div class="see_more">
					<a href="" class="text-center">See More</a>
				</div>
		</div>

	</section>
	<!-- End body -->
<?php require_once('views/layouts/footer.php'); ?>
<script>
	$(document).ready(function(){
		<?php if(isset($_SESSION['success'])): ?>
			Command: toastr["success"]("Hello <?php echo $_SESSION['customer']['name'] ?>")
			toastr.options = {
			  "closeButton": false,
			  "debug": false,
			  "newestOnTop": false,
			  "progressBar": false,
			  "positionClass": "toast-bottom-right",
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
		<?php endif; ?>
		<?php unset($_SESSION['success']) ?>
		<?php if(isset($_SESSION['success'])): ?>
			Command: toastr["success"]("Logout successfully")
			toastr.options = {
			  "closeButton": false,
			  "debug": false,
			  "newestOnTop": false,
			  "progressBar": false,
			  "positionClass": "toast-bottom-right",
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
		<?php endif; ?>
		<?php unset($_SESSION['success']) ?>
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

		$("#search_field").keyup(function(event) {
			var current = $(this).val();
			if(current != ""){
				$.ajax({
					url: '?controller=home&action=search',
					type: 'POST',
					data: {'data' : current},
					success: function(html){
						$(".form_result").css({
							display: 'block'
						});
						$(".form_result").html(html);
						console.log(html);
					}
				});
			}else{
				$(".form_result").css({
					display: 'none'
				});
			}
		});
	})
</script>
	