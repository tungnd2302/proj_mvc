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
				<li class="active"><a href="#">Change password</a></li>
				<li><a href="?controller=customer&action=purchase">Purchase History</a></li>
				<li><a href="?controller=home&action=logout">Logout</a></li>
			</ul>
		</div>
		<div class="col-md-9" style="padding: 0px 100px;">
			<h3 class="text-center">Change Password</h3>
			<form action="" method="post">
				<?php if(isset($_SESSION['error'])): ?>
					<div class="alert alert-warning">
						<?php 
							echo $_SESSION['error'];
							unset($_SESSION['error']);
						?>
					</div>
				<?php endif; ?>
				<input type="hidden" name="id" class="form-control" value="<?php echo $_SESSION['customer']['ID'] ?>">
				<div class="form-group">
					<label for="">Current Password</label>
					<input type="password" name="old_password" class="form-control">
				</div>

				<div class="form-group">
					<label for="">New Password</label>
					<input type="password" name="new_password" class="form-control">
				</div>

				<div class="form-group">
					<label for="">Repeat New Password</label>
					<input type="password" name="re_new_password" class="form-control">
				</div>

				<div class="form-group">
						<button type="submit" name="change" class="btn btn-danger">Change Password</button>
						<a href="?controller=customer&action=profile" class="btn btn-primary">Cancel</a>
				</div>

			</form>
		</div>
	</div>
</section>
