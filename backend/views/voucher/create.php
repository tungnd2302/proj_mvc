<?php require_once('views/layouts/header.php') ?>
<?php 
    require_once('views/layouts/header.php');
?>
<div class="row">
    <h3 class="text-center">Create Voucher</h3>
        <div class="col-md-6 col-md-offset-3">
     <form class="form-horizontal row-border" action="" method="post">
     <?php if(isset($_SESSION['error'])): ?>
        <div class="alert alert-info fade in">
            <?php
                echo $_SESSION['error'];
                unset($_SESSION['error']);
             ?>
        </div>
     <?php endif; ?>
        <div class="form-group">
            <label class="col-md-3 control-label">Content:</label>
            <div class="col-md-9">
                <select name="typeVoucher" class="form-control" id="typeVoucher">
                    <option value="discount_by_charge">Discount by charge</option>
                    <option value="discount_by_percent">Discount by percent</option>
                </select>
            </div>
        </div>

        <div class="form-group" id="discount_by_charge">
            <label class="col-md-3 control-label">Type charge</label>
            <div class="col-md-3">
                <input type="text" name="charge" class="form-control">
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" readonly="true" value="USD" >
            </div>
        </div>

        <div class="form-group" id="discount_by_percent" style="display: none">
            <label class="col-md-3 control-label">Type percent</label>
            <div class="col-md-3">
                <input type="text" name="percent" class="form-control">
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" readonly="true" value="Percent">
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-md-3 control-label">Expire After</label>
            <div class="col-md-9">
                <select name="expire" class="form-control" id="expire">
                    <option value="1">1 day</option>
                    <option value="3">3 days</option>
                    <option value="5">5 days</option>
                    <option value="Other">Other</option>
                </select>
            </div>
        </div>

         <div class="form-group" id="expire_type" style="display: none">
            <label class="col-md-3 control-label">Type expire</label>
            <div class="col-md-3">
                <input type="num" name="type_expire" class="form-control">
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" readonly="true" value="Days">
            </div>
        </div>

        <div class="text-center">
           <button class="btn btn-warning" type="submit" name="create">Create</button>
           <a class="btn btn-primary" href="?controller=voucher&action=list" >Cancel</a>
        </div>

    </form>
    </div>
</div>
<script type="text/javascript">
    $("#typeVoucher").change(function(event) {
        var type = $(this).children("option:selected").val();
        if(type == 'discount_by_percent'){
            $("#discount_by_percent").css({display:'block'});
            $("#discount_by_charge").css({display:'none'});
        }else{
            $("#discount_by_percent").css({display:'none'});
            $("#discount_by_charge").css({display:'block'});
        }
    });

     $("#expire").change(function(event) {
        var val = $(this).children("option:selected").val();
        if(val == 'Other'){
            $("#expire_type").css({display:'block'});
        }else{
            $("#expire_type").css({display:'none'});
            $("#expire").css({display:'block'});
        }
    });
</script>
<?php 
    require_once('views/layouts/footer.php');
?>
