<?php require_once('views/layouts/header.php') ?>
	<!--=== Blue Chart ===-->
				<div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Total product sale (<span class="blue">+29%</span>)</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content">
								<div id="chart_filled_blue" class="chart"></div>
							</div>
							<div class="divider"></div>
							<div class="widget-content">
								<ul class="stats"> <!-- .no-dividers -->
									<li>
										<strong>$<?php echo $totalYear ?></strong>
										<small>This year</small>
									</li>
									<li class="light hidden-xs">
										<strong>$<?php echo $totalQuarter ?></strong>
										<small>This quarter</small>
									</li>
									<li>
										<strong>$<?php echo $totalMonth ?></strong>
										<small>This month</small>
									</li>
									<li class="light hidden-xs">
										<strong>$<?php echo $totaltoday ?></strong>
										<small>Today</small>
									</li>
								</ul>
							</div>
						</div>
					</div> <!-- /.col-md-12 -->
				</div> <!-- /.row -->
<div style="visibility: hidden;">
	<i id="thang1"><?php echo $revenue['thang1'] ?></i>
	<i id="thang2"><?php echo $revenue['thang2'] ?></i>
	<i id="thang3"><?php echo $revenue['thang3'] ?></i>
	<i id="thang4"><?php echo $revenue['thang4'] ?></i>
	<i id="thang5"><?php echo $revenue['thang5'] ?></i>
	<i id="thang6"><?php echo $revenue['thang6'] ?></i>
	<i id="thang7"><?php echo $revenue['thang7'] ?></i>
	<i id="thang8"><?php echo $revenue['thang8'] ?></i>
	<i id="thang9"><?php echo $revenue['thang9'] ?></i>
	<i id="thang10"><?php echo $revenue['thang10'] ?></i>
	<i id="thang11"><?php echo $revenue['thang11'] ?></i>
	<i id="thang12"><?php echo $revenue['thang12'] ?></i>
</div>
				<!-- /Blue Chart -->
<?php require_once('views/layouts/footer.php') ?>