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
                            <th data-hide="phone">Product name</th>
                            <th data-hide="phone">Quantity</th>
                            <th data-hide="phone">Price</th>
                            <th data-hide="phone">Pay</th>
                        </tr>
                    </thead>
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    	<?php foreach($bills as $bill): ?>
                        <tr>
                            <td class=" "><?php echo $bill['bill_ID'] ?></td>
                            <td class=" "><?php echo $bill['product_name'];    ?>
                             </td>
                            <td class=" "><?php echo $bill['quantity'] ?></td>
                            <td class=" ">$<?php echo $bill['price'] ?></td>
                            <td class=" ">$<?php echo $bill['pay'] ?></td>
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