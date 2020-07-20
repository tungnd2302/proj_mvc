<?php 
	require_once('views/layouts/header.php');
?>
<form action="" method="post">
<div class="widget" style="padding: 10px;">
    <div class="widget-header">
        <h4>Đổi mật khẩu người dùng</h4>
    </div>
     <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-info fade in">
            <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
             ?>
        </div>
        <?php endif; ?>
    <div class="widget-content">
        <div class="row">
            <div class="col-md-4 col-lg-2">
                <strong class="subtitle padding-top-10px">Mức</strong>
                <p class="text-muted">Administrator</p>
            </div>

            <div class="col-md-8 col-lg-10">
                <div class="form-group">
                    <label class="control-label padding-top-10px">Fullname:</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $employee['fullname'] ?>" disabled="disabled">
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-4 col-lg-2">
            </div>
            <div class="col-md-8 col-lg-10">
                <div class="form-group">
                    <label class="control-label padding-top-10px">UserName:</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $employee['username'] ?>" disabled="disabled">
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-4 col-lg-2">
            </div>
            <div class="col-md-8 col-lg-10">
                <div class="form-group">
                    <label class="control-label padding-top-10px">New password:</label>
                    <input type="password" name="new_password" class="form-control">
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-md-4 col-lg-2">
            </div>
            <div class="col-md-8 col-lg-10">
                <div class="form-group">
                    <label class="control-label padding-top-10px">Repeat new password:</label>
                    <input type="password" name="new_password_repeat" class="form-control">
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
    <div class="form-actions" align="center">
        <p class="btn-toolbar btn-toolbar-demo">
            <button class="btn btn-primary" style="width:100px;" type="submit" name="reset">Reset</button>
            <a href="?controller=employees&action=list">
                <button class="btn btn-primary" type="button" style="width:100px;">Cancel</button>
            </a>
        </p>
    </div>
</div>
    </div>
    <!-- /.widget-content -->
</div>
</form>
<?php 
	require_once('views/layouts/footer.php');
?>