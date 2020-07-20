<?php require_once('views/layouts/header.php') ?>
  <div class="widget box">
        <div class="widget-header">
            <h4>
            	<i class="icon-reorder"></i> Table Vouchers 
            	<a href="?controller=voucher&action=create" class="bs-tooltip" title="Add">
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
            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline" role="grid">
                <table class="table table-striped table-bordered table-hover table-checkable table-responsive datatable dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
                    <thead>
                        <tr role="row">
                             <th>#</th>
                             <th>Type</th>
                             <th>Content</th>
                             <th>Code</th>
                             <th>Out of date</th>
                             <th>Status</th>
                             <th>Action</th>
                        </tr>
                    </thead>

                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    	<?php foreach($vouchers as $voucher): ?>
                        <tr>
                            <td class=" "><?php echo $voucher['ID'] ?></td>
                            <td class=" "><?php echo $voucher['type'] ?></td>
                            <td class=" "><?php echo $voucher['Content'] ?></td>
                            <td class=" "><?php echo $voucher['description'] ?></td>
                            <td class=" "><?php echo $voucher['Outdate'] ?></td>
                            <td class=" "><button class="btn btn-xs btn-primary"><?php echo $voucher['status'] ?></button></td>
                            <td colspan="3">
                                <?php 
                                    $deleteLink="?controller=voucher&action=delete&id=".$voucher['ID'];
                                    $sendLink  ="?controller=voucher&action=mail&id=".$voucher['ID'];
                                ?>
								<a href="<?php echo $deleteLink ?>" class="bs-tooltip" title="Delete">
									<i class="icon-trash"></i>
								</a>
                                <a href="<?php echo $sendLink ?>" class="bs-tooltip" title="Sent">
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
<?php require_once('views/layouts/footer.php') ?>