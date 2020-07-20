<?php require_once('views/layouts/header.php') ?>
	<!-- End Navigation bar -->
	<!-- Body -->
	<section class="main container margin_bottom_30">
		<!--- Breadcumb -->
			<nav aria-label="breadcrumb" class="margin_top_80" style="margin-top: 80px;">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item"><a href="../home/">Home</a></li>
			    <li class="breadcrumb-item active" aria-current="page">Login</li>
			  </ol>
			</nav>
		<!--- End readcumb -->

		<!--- Login --->
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					 <div class="login_and_register">
					   	<?php 
					   		if(isset($_GET['status'])){
					   			$divClass = ($_GET['status'] == 'fail') ? ' in active' : '';
					   			$liClass = ($_GET['status'] == 'fail') ? ' active' : ''; 
					   		} 
					   	?>
					   <ul class="nav nav-tabs">
						    <li class="<?php echo isset($divClass) ? '' : 'active'?>"><a data-toggle="tab" href="#home">
						    	<i class="fa fa-user-circle" style="margin-right: 5px;"></i>Login
							</a></li>
						    <li class="<?php echo isset($divClass) ? 'active' : ''?>"><a data-toggle="tab" href="#menu1">
						   		<i class="fa fa-registered" style="margin-right: 5px;"></i>Register
							</a></li>
					   </ul>
					   <div class="tab-content">
						    <div id="home" class="tab-pane fade <?php echo isset($divClass) ? '' : 'in active'   ?>">
						      <h3 class="text-center">Login</h3>
						        <?php if(isset($_SESSION['success'])): ?>
									<div class="alert alert-warning">
									 <?php 
									 	    echo $_SESSION['success'];
									 		unset($_SESSION['success']);
									 ?>
									</div>
								<?php endif; ?>
								<?php if(isset($_SESSION['error'])): ?>
									<div class="alert alert-warning">
									 <?php 
									 	    echo $_SESSION['error'];
									 		unset($_SESSION['error']);
									 ?>
									</div>
								<?php endif; ?>
							<form action="" method="post">
						      <div class="form-group">
						      		<input type="text" name="email" class="form-control" placeholder="Email" value='<?php echo isset($_SESSION['email']) ? ($_SESSION['email']) : ''?>'>
						      	</div>
						      	<div class="form-group">
						      		<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo isset($_SESSION['password']) ? ($_SESSION['password']) : ''?>">
						      	</div>
						      	<div class="form-group">
						      		<input type="checkbox" name="remember" value="0" class="checkbox-inline"> Remember me
						      	</div>
						      	<div class="form-group">
						      		<button class="btn btn-success" type="submit" name="login" style="width: 100%">Login</button>
						      	</div>
						      	<?php
						      		unset($_SESSION['email']);
						      		unset($_SESSION['password']);
						      	 ?>
						    </div>
						    </form>
						    <div id="menu1" class="tab-pane fade <?php echo isset($divClass) ? $divClass : ''   ?>">
						      <h3 class="text-center">Register</h3>
						      <?php if(isset($_SESSION['error'])): ?>
									<div class="alert alert-warning">
									 <?php 
									 	    echo $_SESSION['error'];
									 		unset($_SESSION['error']);
									 ?>
									</div>
						      <?php endif; ?>
						      	<form action="?controller=home&action=login" method="post">
						      	<div class="form-group">
						      		<input type="text" name="email" class="form-control" placeholder="Your email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
						      	</div>
						      	<div class="form-group">
						      		<input type="text" name="name" class="form-control" placeholder="Your name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>">
						      	</div>
						      	<div class="form-group">
						      		<input type="text" name="phone" class="form-control" placeholder="Your phone" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>">
						      	</div>
						      	<div class="form-group">
						      		<input type="password" name="password" class="form-control"  placeholder="Your password"> 
						      	</div>
						      	<div class="form-group">
						      		<input type="password" name="re_password" class="form-control"placeholder="Confirm your password"> 
						      	</div>
						      	<div class="form-group">
						      		<button class="btn btn-danger" type="submit" name="register" style="width: 100%">Register</button>
						      	</div>
						      </form>
						    </div>
					 	</div>
					 </div>
				</div>
			</div>
		<!--- End login --->

	</section>
	<!-- End body -->

<?php require_once('views/layouts/footer.php') ?>