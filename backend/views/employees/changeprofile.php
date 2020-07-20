<?php 
	require_once('views/layouts/header.php');
?>
	<h2 class="text-center">My Profile</h2>
	<div class="container">
		<a href="?controller=employees&action=changepasswordemployee" class="btn btn-success" style="float: right;">Change Password</a>
	</div>
	<div class="row" style="margin-top: 50px;">
		<div class="col-md-offset-2 col-md-3 " >
			<div class="text-center" style="margin-top: 10px; cursor: pointer;">
		<form id="form1" method="post" action="?controller=employees&action=employeeupdate" enctype="multipart/form-data">
	        <img id="blah" src="public/uploads/<?php echo $_SESSION['employee']['avatar']  ?>" alt="your image" style="height: 100px;" /><br/>
	       <!--  <button id="abc" type="button" class="btn btn-warning">Upload</button> -->
			
			<h4 style="margin: 0px; font-weight: bold;"><?php echo $_SESSION['employee']['role'] ?></h4>
	    
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
                    <input type="hidden" value="<?php echo $_SESSION['employee']['username'] ?>" name="username">
    				<label class="col-md-2" for="">Name</label>
    				<div class="col-md-10">
    					<input type="text" class="form-control" value="<?php echo $_SESSION['employee']['fullname']  ?>" name="fullname">
    				</div>
    			</div>

    			<div class="form-group row">
    				<label class="col-md-2" for="">Birthday</label>
    				<div class="col-md-10">
    					<input type="date" class="form-control" name="birthday" value='<?php echo isset($birthday) ? $birthday : $_SESSION['employee']['birthday'] ?>'>
    				</div>
    			</div>

    			<div class="form-group row">
    				<label class="col-md-2" for="">Email</label>
    				<div class="col-md-10">
    					<input type="text" class="form-control" name="email" value='<?php echo isset($email) ? $email : $_SESSION['employee']['email'] ?>'>
    				</div>
    			</div>

    			<div class="form-group row">
    				<label class="col-md-2" for="">Phone</label>
    				<div class="col-md-10">
    					<input type="text" class="form-control" name="phone" value='<?php echo isset($phone) ? $phone : $_SESSION['employee']['phone'] ?>'>
    				</div>
    			</div>

    			<div class="form-group row">
    				<div class="text-center">
    					<input type="submit" name="update" value="Update" class="btn btn-primary">
    					<a href="?controller=employees&action=profiledetail" class="btn btn-warning">Cancel</a>
    				</div>
    			</div>
				<input type='file' onchange="readURL(this);"  name="file"  style="opacity: 0;" />
		</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	
</script>
<?php 
	require_once('views/layouts/footer.php');
?>