<?php 
	require_once('views/layouts/header.php');
?>
<div class="row">
    <h3 class="text-center">Create products</h3>
    	<div class="col-md-12">
	 <form class="form-horizontal row-border" action="" method="post" enctype="multipart/form-data">
	 <?php if(isset($_SESSION['error'])): ?>
	    <div class="alert alert-info fade in">
	    	<?php
	    	 	echo $_SESSION['error'];
	    	 	unset($_SESSION['error']);
	    	 ?>
	    </div>
	 <?php endif; ?>
	    <div class="form-group">
	        <label class="col-md-1 control-label">Name:</label>
	        <div class="col-md-11">
	            <input type="text" name="name" class="form-control" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>">
	        </div>
	    </div>

	    <div class="form-group">
	        <label class="col-md-1 control-label">Category</label>
	        <div class="col-md-11">
	            <select name="category_id" class="form-control">
	            	<?php foreach($categories_list as $category): ?>
	            		<option value="<?php echo $category['ID'] ?>"><?php echo $category['name'] ?></option>
	            	<?php endforeach; ?>
	            </select>
	        </div>
	    </div>

	    <div class="form-group">
	        <label class="col-md-1 control-label">Brand</label>
	        <div class="col-md-11">
	            <select name="brand_id" class="form-control">
	            	<?php foreach($brands_list as $brand): ?>
	            		<option value="<?php echo $brand['ID'] ?>"><?php echo $brand['name'] ?></option>
	            	<?php endforeach; ?>
	            </select>
	        </div>
	    </div>

	    <div class="form-group">
	        <label class="col-md-1 control-label">Image:</label>
	        <div class="col-md-11">
	            <input type='file' onchange="readURL(this);"  name="file" />
				 <img id="blah" style="height: 100px; border-radius: 0px; margin: 0px;" /><br/>
	        </div>
	    </div>

	    <div class="form-group">
	        <label class="col-md-1 control-label">Stock</label>
	        <div class="col-md-11">
	            <input type="number" name="stock" class="form-control" value="<?php echo isset($_POST['stock']) ? $_POST['stock'] : '' ?>">
	        </div>
	    </div>

	    <div class="form-group">
	        <label class="col-md-1 control-label">Price</label>
	        <div class="col-md-11">
	            <input type="text" name="price" class="form-control" value="<?php echo isset($_POST['price']) ? $_POST['price'] : '' ?>">
	        </div>
	    </div>

	    <div class="form-group">
	        <label class="col-md-1 control-label">Description</label>
	        <div class="col-md-11">
	            <textarea name="description" id="category-description" class="form-control"><?php echo isset($_POST['price']) ? $_POST['price'] : '' ?></textarea>
	        </div>
	    </div>

	    <div class="form-group">
	        <label class="col-md-1 control-label">Status:</label>
	        <div class="col-md-11">
	            <select name="status" class="form-control">
	            	<option value="active">Active</option>
	            	<option value="inactive">Inactive</option>
	            </select>
	        </div>
	    </div>

	    <div class="form-group">
	        <label class="col-md-1 control-label">Create_by:</label>
	        <div class="col-md-11">
	            <input type="text" name="created_by" value="<?php echo $_SESSION['employee']['fullname'] ?>" class="form-control"  readonly="true">
	        </div>
	    </div>

	    <div class="text-center">
	       <button class="btn btn-warning" type="submit" name="create">Create</button>
	       <a class="btn btn-primary" href="?controller=products&action=list" >Cancel</a>
	    </div>

	</form>
    </div>
</div>
<?php 
	require_once('views/layouts/footer.php');
?>