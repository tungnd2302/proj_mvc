<?php 
	require_once('views/layouts/header.php');
?>
	<div class="modal-body">
            <div class="img-header" style="float: left;width: 30%;text-align: center;">
                <img src="public/uploadsFrontend/products/<?php echo $product_detail['avatar'] ?>" style="height: 100px; width: 100px;">
                <p style="margin-top: 10px;"><?php echo $product_detail['name'] ?></p>
                <p style="margin-top: 10px; color: red"><?php echo $product_detail['price'] ?> $</p>
            </div>
            <div class="product_info" style="float: left;width: 70%">
                <table width="100%" class="table table-hover">
                    <tr>
                        <td>Status</td>
                        <td><?php echo $product_detail['status'] ?></td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td><?php echo $product_detail['category_name'] ?></td>
                    </tr>
                    <tr>
                        <td>Brand</td>
                        <td><?php echo $product_detail['brand_name'] ?></td>
                    </tr>
                    <tr>
                        <td>Stock</td>
                        <td><?php echo $product_detail['stock'] ?></td>
                    </tr>
                </table>              
            </div>
            <div style="clear: both;"></div>
            <div class="row">
                <h3 style="margin: 0px;">Description</h3>
                <p><?php echo $product_detail['description'] ?></p>
            </div>
      </div>
    </div>
    <div class="text-center">
    	<a href="?controller=products&action=list" class="btn btn-warning" style="margin: 0px auto">Home</a>
    </div>
<?php 
	require_once('views/layouts/footer.php');
?>