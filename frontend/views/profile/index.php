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
				<img src="public/assets/images/customers/<?php echo $_SESSION['customer']['avatar'] ?>" class="img-responsive">
			</div>
			<div>
				<h4><?php echo $_SESSION['customer']['name'] ?></h4>
				<p class="red_color"><?php echo $_SESSION['customer']['points'] ?> Points</p>
			</div>
			<ul class="link_customer_profile">
				<li class="active"><a href="#">About</a></li>
				<li><a href="?controller=customer&action=edit">Edit Profile</a></li>
				<li><a href="?controller=customer&action=changepassword">Change password</a></li>
				<li><a href="?controller=customer&action=purchase">Purchase History</a></li>
				<li><a href="?controller=home&action=logout">Logout</a></li>
			</ul>
		</div>
		<div class="col-md-9">
			<h3 class="text-center">Profile</h3>
			<?php if(isset($_SESSION['success'])): ?>
				<div class="alert alert-warning">
					<?php 
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					?>
				</div>
			<?php endif; ?>
			<table class="table table-responsive">
				<tr>
					<td>Email</td>
					<td><?php echo $_SESSION['customer']['email'] ?></td>
				</tr>
				<tr>
					<td>Phone</td>
					<td><?php echo $_SESSION['customer']['phone'] ?></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><?php echo $_SESSION['customer']['address'] ?></td>
				</tr>
				<tr>
					<td>Birthday</td>
					<td><?php echo $_SESSION['customer']['birthday'] ?></td>
				</tr>
				<tr>
					<td>Last purchase</td>
					<td><?php echo $_SESSION['customer']['last_purchase'] ?></td>
				</tr>
			</table>
		</div>
	</div>
</section>
