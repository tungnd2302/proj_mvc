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
            	<i class="icon-reorder"></i> Table Brand 
            	<a href="?controller=brands&action=create" class="bs-tooltip" title="Add">
            		<i class="icon-plus-sign"></i>
            	</a>
            </h4>
            <div class="toolbar no-padding">
                <div class="btn-group">
                    <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                </div>
            </div>
        </div>
        <div class="widget-content no-padding">
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                <table class="table table-striped table-bordered table-hover table-checkable table-responsive datatable dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                    <thead>
                        <tr role="row">
                            <th class="checkbox-column sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="">
                                <div class="checker"><span><input type="checkbox" class="uniform"></span></div>
                            </th>
                            <th data-class="expand" class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="First Name: activate to sort column ascending">Name</th>
                            <th data-hide="phone" class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Username: activate to sort column ascending">Created at</th>
                            <th data-hide="phone,tablet" class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Created by</th>
                             <th>Action</th>
                        </tr>
                    </thead>

                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    	<?php foreach($brands as $brand): ?>
                        <tr>
                            <td class="checkbox-column  sorting_1">
                                <div class="checker"><span><input type="checkbox" class="uniform"></span></div>
                            </td>
                            <td class=" "><?php echo $brand['name'] ?></td>
                            <td class=" "><?php echo $brand['created_at'] ?></td>
                            <td class=" "><?php echo $brand['created_by'] ?></td>
                            <td colspan="3">
                                <?php 
                                    $deleteLink="?controller=brands&action=delete&id=".$brand['ID'];
                                    $updateLink="?controller=brands&action=update&id=".$brand['ID'];
                                    $lockLink="?controller=brands&action=status&status=active&id=".$brand['ID'];
                                    $unlockLink="?controller=brands&action=status&status=inactive&id=".$brand['ID'];
                                ?>
								<?php if($brand['status'] == 'active'): ?>
                                <a href="<?php echo $unlockLink ?>" class="bs-tooltip" title="Inactive">
                                    <i class="icon-unlock"></i>
                                </a>
                                <?php else: ?>
                                <a href="<?php echo $lockLink ?>" class="bs-tooltip" title="Active">
                                    <i class="icon-lock"></i>
                                </a>
                                <?php endif; ?>
								<a href="<?php echo $updateLink ?>" class="bs-tooltip" title="Update">
									<i class="icon-pencil"></i>
								</a>
								<a href="<?php echo $deleteLink ?>" class="bs-tooltip" title="Delete">
									<i class="icon-trash"></i>
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