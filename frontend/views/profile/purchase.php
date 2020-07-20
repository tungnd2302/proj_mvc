<?php require_once('views/layouts/header.php') ?>
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
				<img class="img-responsive" id="blah" src="public/assets/images/customers/<?php echo $_SESSION['customer']['avatar']  ?>" class="img-responsive">
			</div>
			<div>
				<h4><?php echo $_SESSION['customer']['name'] ?></h4>
				<p class="red_color"><?php echo $_SESSION['customer']['points'] ?> Points</p>
			</div>
			<ul class="link_customer_profile">
				<li><a href="?controller=customer&action=profile">About</a></li>
				<li><a href="?controller=customer&action=edit">Edit Profile</a></li>
				<li><a href="?controller=customer&action=changepassword">Change password</a></li>
				<li class="active"><a href="#">Purchase History</a></li>
				<li><a href="?controller=home&action=logout">Logout</a></li>
			</ul>
		</div>
		<div class="col-md-9" style="padding: 0px 100px;">
			<h3 class="text-center">Points History</h3>
			<?php if(!empty($histories)): ?>
				<?php foreach($histories as $history): ?>
					<div class="panel panel-success">
				      <div class="panel-heading">On <?php echo $history['created_at'];  ?></div>
				      <div class="panel-body">You purchased <?php echo $history['total_price']; ?>$ from our shop</div>
				    </div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
