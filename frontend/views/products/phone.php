<?php require_once('views/layouts/header.php') ?>
<body>
	<!-- <div id="loading">
		<div id="loading-center">
			<div id="loading-center-absolute">
				<div class="object" id="object_one"></div>
				<div class="object" id="object_two"></div>
				<div class="object" id="object_three"></div>
			</div>
		</div>
	</div> -->
	<!-- Body -->
	<section class="main container-fluid margin_bottom_30">
		<!--- Breadcumb -->
			<nav aria-label="breadcrumb" class="margin_top_80" style="margin-top: 80px;">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="#">Home</a></li>
			    <li class="breadcrumb-item active" aria-current="page">Products</li>
			  </ol>
			</nav>
		<!--- End readcumb -->

		<!--- Hot saler --->
			<div class="container-fluid  hot_sale margin_bottom_30 no_border_sm_xs">
			<h2 class="text-center" style="margin-bottom: 30px;"> Hot deals </h2>
			<?php foreach($hotsaleproducts as $hotsaleproduct): ?>
				<div class="col-md-3">
					<div class="thumbnail no_border">
	      				<a href="?controller=products&action=detail&id=<?php echo $hotsaleproduct['ID'] ?>">
	       					 <img src="../backend/public/uploadsFrontend/products/<?php echo $hotsaleproduct['avatar'] ?>" style="height: 250px;"  alt="Fjords">
	        				 <div class="caption content_center">
	          			     	<p><?php echo $hotsaleproduct['brand_name'] . ' '.$hotsaleproduct['name'] ?></p>
	       					 </div>
	      				</a>
	   				 </div>
				</div>
			<?php endforeach; ?>

				
		</div>
		<!--- End hot saler --->


		<!--- Product list --->
			 <div class="container-fluid product_list">
			 	<div class="col-md-3">
			 		<p class="font24 margin_bottom_20">Search</p>
			 		<div class="search_keyword">
			 			<form method="post"  action="?controller=products&action=search">
				 			<div class="form-group">
				 				<input type="text" class="form-control" placeholder="Search something..." name="product_name" value="<?php echo isset($_POST['product_name']) ? $_POST['product_name'] : '' ?>">
				 				<button class="btn btn-info" type="submit" name="search"><i class="fa fa-search" ></i></button>
				 			</div>
			 			</form>
			 		</div>
			 		<p class="font24 margin_bottom_20">Filter</p>
			 		<div class="filler_keyword">
			 			<form action="?controller=products&action=filter" method="post">
				 			<div class="form-group">
				 				<label for="">By Price</label>
				 				<select class="form-control" name="byprice">
				 					<option value="all" <?php echo (isset($_POST['byprice']) && $_POST['byprice'] == 'all') ? "selected = 'true'" : ''?>>All price</option>
				 					<option value="lessthan100" <?php echo (isset($_POST['byprice']) && $_POST['byprice'] == 'lessthan100') ? "selected = 'true'" : ''?>>Less than $100</option>
				 					<option value="100-500" <?php echo (isset($_POST['byprice']) && $_POST['byprice'] == '100-500') ? "selected = 'true'" : ''?>>$100 - $500</option>
				 					<option value="500-1000" <?php echo (isset($_POST['byprice']) && $_POST['byprice'] == '500-1000') ? "selected = 'true'" : ''?>>$500 - $1000</option>
				 					<option value="morethan1000" <?php echo (isset($_POST['byprice']) && $_POST['byprice'] == 'morethan1000') ? "selected = 'true'" : ''?>>More than 1000$</option>
				 				</select>
				 			</div>
				 			<div class="form-group">
				 				<label for="">By Brand</label>
				 				<select name="bybrand" class="form-control" id="byBrand">
				 					<option value="all"  <?php echo (isset($_POST['bybrand']) && $_POST['bybrand'] == 'all') ? "selected = 'true'" : ''?>>All brands</option>
				 					<option value="apple"  <?php echo (isset($_POST['bybrand']) && $_POST['bybrand'] == 'apple') ? "selected = 'true'" : ''?>>Apple</option>
				 					<option value="samsung"  <?php echo (isset($_POST['bybrand']) && $_POST['bybrand'] == 'samsung') ? "selected = 'true'" : ''?>>Samsung</option>
				 					<option value="xiaomi"  <?php echo (isset($_POST['bybrand']) && $_POST['bybrand'] == 'xiaomi') ? "selected = 'true'" : ''?>>Xiaomi</option>
				 					<option value="other" <?php echo (isset($_POST['bybrand']) && $_POST['bybrand'] == 'other') ? "selected = 'true'" : ''?>>Other</option>
				 				</select>
				 			</div>
				 			<div class="form-group" id="type_brand" style="display: none;">
				 				<label for="">Type brand</label>
				 				<input type="text" class="form-control" name="other_name" placeholder="Type brand">
				 			</div>
				 			<div class="form-group">
				 				<label for="">By Category</label>
				 				<select name="bycategory" class="form-control">
				 					<!-- <option>All categories</option> -->
				 					<option value="phone" <?php echo (isset($_POST['bycategory']) && $_POST['bycategory'] == 'phone') ? "selected = 'true'" : ''?>>Phone</option>
				 					<option value="tablet" <?php echo (isset($_POST['bycategory']) && $_POST['bycategory'] == 'tablet') ? "selected = 'true'" : ''?>>Tablet</option>
				 					<option value="watch" <?php echo (isset($_POST['bycategory']) && $_POST['bycategory'] == 'watch') ? "selected = 'true'" : ''?>>Smart watch</option>
				 				</select>
				 			</div>
				 			<button class="btn btn-primary" type="submit" name="filter" style="width: 100%;">Filter</button>
			 			</form>
			 		</div>
			 	</div>
			 	<div class="col-md-9">
				 	<?php if(isset($products)): ?>
					 	<p class="font24 margin_bottom_20">Phone<i class="font18">(<?php echo $product_found ?> products)</i></p>
					<?php foreach($products as $product): ?>
						<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
					     	   <img class="img-responsive" src="../backend/public/uploadsFrontend/products/<?php echo $product['avatar'] ?>" alt="" style="height: 220px; margin: 0px auto 8px auto; cursor: pointer;" onclick="location.href='?controller=products&action=detail&id=<?php echo $product['ID'] ?>'">
					            
					            <p class="text-center no_margin"><?php echo $product['brand_name'] .' '. $product['name'] ?></p>
					            <?php if($product['stock'] != 0): ?>
						            <p class="red_color text-center font18 no_margin">$<?php echo $product['price'] ?></p>
						            <p class="rating_product text-center no_margin">
					            	<span class="fa fa-star" style="color: #f39c12"></span>
					            	<span class="fa fa-star" style="color: #f39c12"></span>
					            	<span class="fa fa-star" style="color: #f39c12"></span>
					            	<span class="fa fa-star" style="color: #f39c12"></span>
					            </p>
						            <p class="red_color text-center font18 no_margin" style="margin: 10px 0px;">
										<a class="btn btn-primary add_to_cart" id="<?php echo $product['ID'] ?>"><i class="fa fa-shopping-cart"></i></a>
										<a href="?controller=products&action=detail&id=<?php echo $product['ID'] ?>" class="btn btn-danger"><i class="fa fa-info-circle"></i></a>
						            </p>
					            <?php else: ?>
					            	<p class="rating_product text-center no_margin">
					            	<span class="fa fa-star" style="color: #f39c12"></span>
					            	<span class="fa fa-star" style="color: #f39c12"></span>
					            	<span class="fa fa-star" style="color: #f39c12"></span>
					            	<span class="fa fa-star" style="color: #f39c12"></span>
					            </p>
					            	<p class="red_color text-center font18 no_margin">Sold out</p>
					            	<p class="text-center" style="margin: 10px 0px;">
										<a href="?controller=products&action=detail&id=<?php echo $product['ID'] ?>" class="btn btn-danger"><i class="fa fa-info-circle"></i></a>
						            </p>
					            <?php endif; ?>
					            
						</div>
						<?php endforeach; ?>
					<?php else: ?>
						<p class="font24"><?php echo $_GET['category'] ?><i class="font18">(0 products found)</i></p>
					<?php endif; ?>
				</div>
			 </div>
		<!--- End products list --->
		

		<!-- keyWord -->
		<div class="keyword_product margin_bottom_30">
			<h3>Popular KeyWord:</h3>
			<a href="" class="btn btn-primary">Apple</a>
			<a href="" class="btn btn-primary">Mi band 3</a>
		</div>
		<!-- end Keyword -->

		<!-- Recent news -->
	<div class="tech_news">
			<a href="" class="font18 latest_news" style="display: block;">Lastest News</a>
		<div class="two-owl owl-carousel owl-theme">
			<a href="">
	            <div class="item">
	              <img src="../../assets/images/home/ipad.jpg" min-height="250px;">
	              <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
	            </div>
            </a>
            <a href="">
	            <div class="item">
	              <img src="../../assets/images/home/iphone.jpg" min-height="250px;">
	              <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
	            </div>
        	</a>
        	<a href="">
	            <div class="item">
	             <img src="../../assets/images/home/samsungs10.jpg" min-height="250px;">
	             <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
	            </div>
        	</a>
        </div>
	</div>
		<!-- End Recent news -->
	</section>
	<!-- End body -->

	<!-- Footer -->
<?php require_once('views/layouts/footer.php') ?>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#byBrand").change(function(event) {
				var brand = $(this).children("option:selected").val();
				if(brand == 'other'){
					$("#type_brand").css({
						display: 'block',
					});
				}else{
					$("#type_brand").css({
						display: 'none',
					});
				}
			});
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