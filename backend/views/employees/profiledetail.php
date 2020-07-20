<?php 
	require_once('views/layouts/header.php');
?>
	<h2 class="text-center">My Profile</h2>
	<div class="container">
		<a class="btn btn-success" style="float: right;" href="?controller=employees&action=changeprofile">Edit</a>
	</div>
	<div class="row" style="margin-top: 50px;">
		<div class="col-md-offset-2 col-md-3 " >
			<div class="text-center" style="margin-top: 10px; cursor: pointer;">
	        <img id="blah" src="public/uploads/<?php echo $_SESSION['employee']['avatar'] ?>" alt="your image" style="height: 100px;" /><br/>
			<h4 style="margin: 0px; font-weight: bold;"><?php echo $_SESSION['employee']['role'] ?></h4>
	    
	</div>
		</div>
		<div class="col-md-5">
			 <?php if(isset($_SESSION['success'])): ?>
               <div class="alert alert-info fade in">
            <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
             ?>
             </div>
            <?php endif; ?>
    		<table class="table table-hover">
                <tr>
                    <td>Full name</td>
                    <td><?php echo $_SESSION['employee']['fullname'] ?></td>
                </tr>  

                <tr>
                    <td>Birthday</td>
                    <td><?php echo $_SESSION['employee']['birthday'] ?></td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td><?php echo $_SESSION['employee']['email'] ?></td>
                </tr>

                <tr>
                    <td>Phone number</td>
                    <td><?php echo $_SESSION['employee']['phone'] ?></td>
                </tr>
            </table>
		</div>
	</div>
</div>
<script type="text/javascript">
	
</script>
<?php 
	require_once('views/layouts/footer.php');
?>