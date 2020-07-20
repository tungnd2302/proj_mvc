<?php 
	require_once('views/layouts/header.php');
?>
	<div class="col-md-12">
        <?php if(isset($_SESSION['success'])): ?>
        <div class="alert alert-info fade in">
            <?php
                echo $_SESSION['success'];
                unset($_SESSION['success']);
             ?>
        </div>
        <?php endif; ?>
         <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-info fade in">
            <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
             ?>
        </div>
        <?php endif; ?>
    <div class="widget box">
        <div class="widget-header">
            <h4>
            	<i class="icon-reorder"></i> Table Customers 
            </h4>
            <div class="toolbar no-padding">
                <div class="btn-group">
                    <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                </div>
            </div>
        </div>
        <div class="widget-content no-padding">
            <table class="table table-responsive">
                    <thead>
                        <tr role="row">
                            <th data-class="expand">Name</th>
                            <th data-hide="phone">Birthday</th>
                            <th data-hide="phone">Address</th>
                            <th data-hide="phone">Email</th>
                            <th data-hide="phone">Points</th>
                            <th data-hide="phone">Last_purchase</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    	<?php foreach($customers as $customer): ?>
                        <tr>
                            <td class=" "><?php echo $customer['name'] ?></td>
                            <td class=" "><?php echo $customer['birthday'] ?></td>
                            <td class=" "><?php echo $customer['address'] ?></td>
                            <td class=" "><?php echo $customer['email'] ?></td>
                            <td class=" "><?php echo $customer['points'] ?></td>
                            <td class=" "><?php echo $customer['last_purchase'] ?></td>
                            <td colspan="3">
                                <?php 
                                    $deleteLink="?controller=customers&action=delete&id=".$customer['ID'];
                                    $sendLink  ="?controller=voucher&action=mail&id=".$customer['ID'];
                                ?>
								<a href="<?php echo $deleteLink ?>" class="bs-tooltip" title="Delete">
									<i class="icon-trash"></i>
								</a>
                                <a href="<?php echo $sendLink ?>" class="bs-tooltip" title="Sent voucher">
                                    <i class="icon-envelope"></i>
                                </a>
                            </td>
                        </tr>
                    	<?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php 
	require_once('views/layouts/footer.php');
?>