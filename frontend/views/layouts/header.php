<!DOCTYPE html>
<!DOCTYPE>
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
	<!-- Navigation bar -->
	
	<nav class="navbar filter-bar fixed-absolute navbar-transparent navbar_sm">
		<div class="container">
			<div class="navbar-header"> 
				<button type="button" class="navbar-toggle navbar_toggle_xs" data-toggle="collapse" data-target=".navbar-ex1-collapse"> 
					<span class="icon-bar icon_bar_xs"></span> 
					<span class="icon-bar icon_bar_xs"></span> 
					<span class="icon-bar icon_bar_xs"></span> 
				</button>
				<div> 
					<a itemprop="url" href="?controller=home&action=index" class="navbar-brand">
						<p>PHP store</p> 
				    </a>
				</div>
			</div>

			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a itemprop="url" href="?controller=home&action=index"> 
							<i class="fa fa-home"></i>
							<p>Home</p> 
						</a>
					</li>
					<li> 
						<a itemprop="url" href="?controller=products&action=Phone"> 
							<i class="fa fa-phone"></i>
							<p>Phone</p> 
						</a>
					</li>
					<li> 
						<a itemprop="url" href="?controller=products&action=Tablet"> 
							<i class="fa fa-tablet"></i>
							<p>Tablet</p> 
						</a>
					</li>
					<!-- <li> 
						<a itemprop="url" href="../news_home/index.php"> 
							<i class="fa fa-rss"></i>
							<p>News</p> 
						</a>
					</li> -->
					<?php if(isset($_SESSION['customer'])): ?>
					<li> 
						<a itemprop="url" href="#" data-toggle="dropdown" class="dropdown-toggle">  
							<i class="fa fa-user"></i>
							<p><?php 
								$array = explode(' ', $_SESSION['customer']['name']);
								echo $array[0];
							?></p> 
						</a>
						<ul class="dropdown-menu account color_while_sm" style="">
							<li class="account_header">Account</li>
							<li><a href="?controller=customer&action=profile" class="account_profile">My profile</a></li>
							<li class="float_left">My Point:</li>
							<li class="float_right">150 Points</li>
							<li class="clear_fix"></li>
							<li class="account_button_group">
								
								<a href="?controller=home&action=logout" class="btn btn-success">Logout</a>
							</li>
						</ul>
					</li>
				 	<?php else: ?>
					<li>
						<a class="btn big-login" href="?controller=home&action=login">
							<i class="fa fa-user"></i>
							<p>Login</p> 
						</a>
					</li>
					<?php endif; ?>
					<?php if(isset($_SESSION['cart'])): ?>
					<li> 
						<a href="?controller=cart&action=list"> 
							<?php 
								$total_cart = 0;
								foreach ($_SESSION['cart'] as $key=>$value) {
									$total_cart += $_SESSION['cart'][$key]['qty'];
								}
							?>
							<i class="fa fa-shopping-cart"><span class="badge"><?php echo isset($total_cart) ? $total_cart : '' ?></span></i>
							<p>Cart</p> 
						</a>
					</li>
					<?php endif ?>
				</ul>
			</div>
		</div>
	</nav>