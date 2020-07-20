<?php 
	require_once('views/layouts/header.php');
?>
<div class="row">
    <h3 class="text-center">Update Employee</h3>
    	<div class="col-md-6 col-md-offset-3">
	 <form class="form-horizontal row-border" action="" method="post">
	 <?php if(isset($_SESSION['error'])): ?>
	    <div class="alert alert-info fade in">
	    	<?php
	    	 	echo $_SESSION['error'];
	    	 	unset($_SESSION['error']);
	    	 ?>
	    </div>
	 <?php endif; ?>
	    <div class="form-group">
	        <label class="col-md-2 control-label">Username:</label>
	        <div class="col-md-10">
	            <input type="text" name="username" value="<?php echo isset($_POST['username']) ? $_POST['username'] : $employee['username'] ?>"  class="form-control">
	        </div>
	    </div>

	    <div class="form-group">
	        <label class="col-md-2 control-label">Fullname:</label>
	        <div class="col-md-10">
	            <input type="text" name="fullname" value="<?php echo isset($_POST['fullname']) ? $_POST['fullname'] : $employee['fullname'] ?>"  class="form-control">
	        </div>
	    </div>

	    <div class="form-group">
	        <label class="col-md-2 control-label">Role</label>
	        <div class="col-md-10">
	           <select name="role" class="form-control">
	           	<?php 
	           	$administratorOption = ($employee['role'] == 'administrator')? "selected = 'selected'" : '';
	           	$managerOption      = ($employee['role'] == 'managerr')    ? "selected = 'selected'" : '';
	           	$staffOption        = ($employee['role'] == 'staff')       ? "selected = 'selected'" : '';
	           	?>
	           	<option value="administrator" <?php echo $administratorOption ?>>Administrator</option>
	           	<option value="manager"      <?php echo $managerOption ?>     >Manager</option>
	           	<option value="staff"        <?php echo $staffOption ?>       >Staff</option>
	           </select>
	        </div>
	    </div>

	    <div class="form-group">
	        <label class="col-md-2 control-label">Create_by:</label>
	        <div class="col-md-10">
	            <input type="text" name="created_by" value="<?php echo $_SESSION['employee']['fullname'] ?>" class="form-control" readonly="true">
	        </div>
	    </div>

	    <div class="text-center">
	       <button class="btn btn-warning" type="submit" name="create">Update</button>
	       <a class="btn btn-primary" href="?controller=category&action=list" >Cancel</a>
	    </div>

	</form>
    </div>
</div>
<?php 
	require_once('views/layouts/footer.php');
?>