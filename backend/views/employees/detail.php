<?php 
	require_once('views/layouts/header.php');
?>
	<div class="modal-body">
            <div class="img-header" style="float: left;width: 30%;text-align: center;">
                <img src="public/uploads/<?php echo $employee_detail['avatar'] ?>" class="img-circle" style="height: 100px; width: 100px;">
                <p style="margin-top: 10px;"><?php echo $employee_detail['fullname'] ?></p>
                <p style="margin-top: 10px;"><?php echo $employee_detail['role'] ?></p>
            </div>
            <div class="employee_info" style="float: left;width: 70%">
                <table width="100%" class="table table-hover">
                    <tr>
                        <td>Username</td>
                        <td><?php echo $employee_detail['username'] ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?php echo $employee_detail['email'] ?></td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td><?php echo $employee_detail['phone'] ?></td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><?php echo $employee_detail['address'] ?></td>
                    </tr>
                    <tr>
                        <td>Birthday</td>
                        <td><?php echo $employee_detail['birthday'] ?></td>
                    </tr>
                </table>              
            </div>
            <div style="clear: both;"></div>
      </div>
    </div>
    <div class="text-center">
    	<a href="?controller=employees&action=list" class="btn btn-warning" style="margin: 0px auto">Home</a>
    </div>
<?php 
	require_once('views/layouts/footer.php');
?>