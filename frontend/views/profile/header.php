<section class="main container margin_bottom_30">
		<!--- Breadcumb -->
	<nav aria-label="breadcrumb" class="margin_top_80" style="margin-top: 80px;">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="?controller=home&action=index">Home</a></li>
			<li class="breadcrumb-item active" aria-current="page">Profile</li>
		 </ol>
	</nav>
	<div class="container-fluid">
		<div class="col-md-3 text-center customer_profile">
			<div class="img_customer_profile">
				<img src="public/assets/images/home/hotsale1.jpg" class="img-responsive">
			</div>
			<div>
				<h4><?php echo $_SESSION['customer']['name'] ?></h4>
				<p class="red_color">146 Scores</p>
			</div>
			<ul class="link_customer_profile">
				<li><a href="">Edit Profile</a></li>
				<li><a href="">Change password</a></li>
				<li><a href="">Purchase History</a></li>
				<li><a href="">About</a></li>
				<li><a href="?controller=home&action=logout">Logout</a></li>
			</ul>
		</div>