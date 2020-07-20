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
            	<i class="icon-reorder"></i> Table bill 
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
                            <th data-class="expand">#</th>
                            <th data-hide="phone">Customer_ID</th>
                            <th data-hide="phone">Customer_name</th>
                            <th data-hide="phone">Customer_phone</th>
                            <th data-hide="phone">Customer_address</th>
                            <th data-hide="phone">Created at</th>
                            <th data-hide="phone">Price</th>
                            <th data-hide="phone">After Discount</th>
                            <th data-hide="phone">Code</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    	<?php foreach($bills as $bill): ?>
                        <tr>
                            <td class=" "><?php echo $bill['bill_ID'] ?></td>
                            <td class=" ">
                                <?php 
                                    echo (!empty($bill['customer_ID'])) ? $bill['customer_ID']  : 'Unknow' 
                                ?>
                             </td>
                            <td class=" "><?php echo $bill['customer_name'] ?></td>
                            <td class=" "><?php echo $bill['customer_phone'] ?></td>
                            <td class=" "><?php echo $bill['customer_address'] ?></td>
                            <td class=" "><?php echo $bill['created_at'] ?></td>
                            <td class=" "><?php echo $bill['price'] ?></td>
                            <td class=""><?php echo  $bill['price'] - $bill['discount'] ?></td>
                            <td class=""><?php echo  $bill['Code'] ?></td>
                            <td colspan="2">
                                <?php 
                                    $deleteLink="?controller=bill&action=delete&id=".$bill['bill_ID'];
                                    $viewsLink="?controller=bill&action=detail&id=".$bill['bill_ID'];
                                ?>
                                <a href="<?php echo $viewsLink ?>" class="bs-tooltip" title="Views">
                                    <i class="icon-eye-open"></i>
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