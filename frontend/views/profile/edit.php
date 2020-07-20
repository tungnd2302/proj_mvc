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
				<img class="img-responsive" id="blah" src="public/assets/images/customers/<?php echo $_SESSION['customer']['avatar']  ?>" alt="No Avatar"  />				
			</div>
			<div>
				<h4><?php echo $_SESSION['customer']['name'] ?></h4>
				<p class="red_color"><?php echo $_SESSION['customer']['points'] ?> Points</p>
			</div>
			<ul class="link_customer_profile">
				<li><a href="?controller=customer&action=profile">About</a></li>
				<li  class="active"><a href="?controller=customer&action=edit">Edit Profile</a></li>
				<li><a href="?controller=customer&action=changepassword">Change password</a></li>
				<li><a href="?controller=customer&action=purchase">Purchase History</a></li>
				<li><a href="?controller=home&action=logout">Logout</a></li>
			</ul>
		</div>
		<div class="col-md-9" style="padding: 0px 100px;">
			<h3 class="text-center">Edit profile</h3>
				<form action="" method="post" enctype="multipart/form-data">
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
					<label for="">Fullname</label>
					<input type="text" name="name" class="form-control" value="<?php echo (isset($_POST['name'])) ? $_POST['name'] : $_SESSION['customer']['name'] ?>">
				</div>

				<div class="form-group">
					<label for="">Birthday</label>
					<input type="date" name="birthday" class="form-control" value="<?php echo $_SESSION['customer']['birthday'] ?>">
				</div>

				<div class="form-group">
					<label for="">Phone</label>
					<input type="text" name="phone" class="form-control" value="<?php echo $_SESSION['customer']['phone'] ?>">
				</div>

				<div class="form-group">
					<label for="">Address</label>
					<input type="text" name="address" class="form-control" value="<?php echo $_SESSION['customer']['address'] ?>">
				</div>

				<div class="form-group">
						<button type="submit" name="update" class="btn btn-danger">Update</button>
						<a href="?controller=customer&action=profile" class="btn btn-primary">Cancel</a>
				</div>
				<input type='file' onchange="readURL(this);"  name="file"  style="opacity: 0;" />
			</form>
		</div>
	</div>
</section>
<script type="text/javascript" src="public/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="public/assets/js/myjs.js"></script>

