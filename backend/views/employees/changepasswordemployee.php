<?php 
	require_once('views/layouts/header.php');
?>
	<h2 class="text-center">Change Password</h2>
	<div class="row" style="margin-top: 50px;">
		<div class="col-md-offset-2 col-md-3 " >
			<div class="text-center" style="margin-top: 10px; cursor: pointer;">
		<form id="form1" method="post" action="">
	        <img id="blah" src="public/uploads/<?php echo $_SESSION['employee']['avatar']  ?>" alt="your image" style="height: 100px;" /><br/>
	       <!--  <button id="abc" type="button" class="btn btn-warning">Upload</button> -->
			
			<h4 style="margin: 0px; font-weight: bold;"><?php echo $_SESSION['employee']['username'] ?></h4>
	    
	</div>
		</div>
		<div class="col-md-5">
			 <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-info fade in">
            <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
             ?>
        </div>
        <?php endif; ?>
    			<div class="form-group row">
                    <input type="hidden" value="<?php echo $_SESSION['employee']['ID'] ?>" name="id">
    				<label class="col-md-4" for="">Old password</label>
    				<div class="col-md-8">
    					<input type="password" class="form-control" name="old_password">
    				</div>
    			</div>

    			<div class="form-group row">
    				<label class="col-md-4" for="">New Password</label>
    				<div class="col-md-8">
    					<input type="password" class="form-control" name="new_password">
    				</div>
    			</div>

    			<div class="form-group row">
    				<label class="col-md-4" for="">Repeate new password</label>
    				<div class="col-md-8">
    					<input type="password" class="form-control" name="repeate_password">
    				</div>
    			</div>

    			<div class="form-group row">
    				<div class="text-center">
    					<input type="submit" name="change" value="Change" class="btn btn-primary">
    					<a href="?controller=employees&action=profiledetail" class="btn btn-warning">Cancel</a>
    				</div>
    			</div>
		</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	
</script>
<?php 
	require_once('views/layouts/footer.php');
?>