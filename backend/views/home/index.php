<?php 
	require_once('views/layouts/header.php');
?>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      defaultDate: '2019-08-12',
      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
      select: function(arg) {
        var title = prompt('Event Title:');
        if (title) {
          calendar.addEvent({
            title: title,
            start: arg.start,
            end: arg.end,
            allDay: arg.allDay
          })
        }
        calendar.unselect()
      },
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      events: [
      <?php foreach($employees as $employee):  ?>
        {
        	<?php 
        		$date=date_create($employee['birthday']);
        	?>
          title: '<?php echo $employee['fullname'] ?> Birthday',
          start: '<?php echo date_format($date,"2019-m-d"); ?>',
        },
      <?php endforeach; ?>
      ]
    });

    calendar.render();
  });
$(document).ready(function(){
	alert('hi');
})
</script>
	<div class="row row-bg"> <!-- .row-bg -->
					<div class="col-sm-6 col-md-3">
						<div class="statbox widget box box-shadow">
							<div class="widget-content">
								<div class="visual cyan">
									<div class="statbox-sparkline"><canvas width="44" height="19" style="display: inline-block; width: 44px; height: 19px; vertical-align: top;"></canvas></div>
								</div>
								<div class="title">Employees</div>
								<div class="value"><?php echo $countEmployees ?></div>
								<a class="more" href="?controller=employees&action=list">View More <i class="pull-right icon-angle-right"></i></a>
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->

					<div class="col-sm-6 col-md-3">
						<div class="statbox widget box box-shadow">
							<div class="widget-content">
								<div class="visual green">
									<div class="statbox-sparkline"><canvas width="44" height="19" style="display: inline-block; width: 44px; height: 19px; vertical-align: top;"></canvas></div>
								</div>
								<div class="title">Products</div>
								<div class="value"><?php echo $countProducts ?></div>
								<a class="more" href="?controller=products&action=list">View More <i class="pull-right icon-angle-right"></i></a>
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->

					<div class="col-sm-6 col-md-3 hidden-xs">
						<div class="statbox widget box box-shadow">
							<div class="widget-content">
								<div class="visual yellow">
									<i class="icon-dollar"></i>
								</div>
								<div class="title">Total revenue</div>
								<div class="value">$42,512.61</div>
								<a class="more" href="javascript:void(0);">View More <i class="pull-right icon-angle-right"></i></a>
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->

					<div class="col-sm-6 col-md-3 hidden-xs">
						<div class="statbox widget box box-shadow">
							<div class="widget-content">
								<div class="visual red">
									<i class="icon-user"></i>
								</div>
								<div class="title">Visitors</div>
								<div class="value"><?php echo $countCustomers ?></div>
								<a class="more" href="?controller=customers&action=list">View More <i class="pull-right icon-angle-right"></i></a>
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->
				</div>
				<div class="row">
					<div class="col-md-7">
						<div class="widget">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i>Calendar</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
										<span class="btn btn-xs widget-refresh"><i class="icon-refresh"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content">
								<div id='calendar'></div>
							</div>
						</div>
					</div>
					<div class="col-md-5">
						<div class="widget">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i>Notifications</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
										<span class="btn btn-xs widget-refresh" onclick="location.href='?controller=home&action=home'"><i class="icon-refresh"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content">
								<ul class="notication-area">
									<?php if(isset($_SESSION['birthday'])): ?>
										<li>
											<div style="float: left" class="complete-icon">
												<i class="<?php echo $_SESSION['birthday']['icon'] ?>"></i>
											</div>
											<div style="float: left;">
												<p><?php echo $_SESSION['birthday']['contents']; ?></p>
											</div>
											<div style="clear: both;">
										<li>
									<?php endif; ?>
									<?php foreach($notis as $noti): ?>
										<?php 
											date_default_timezone_set("Asia/Bangkok");
											$datetime = date("Y-m-d H:i:s",time());
											$current  = strtotime($datetime);
											$time     = strtotime($noti['created_at']); 
											$interval = $current - $time; 
											if($interval > 0 && $interval < 60){
												$time_text =  $interval . 's';
											}
											elseif($interval >= 60 && $interval < 60 * 60){ // quá 1m
 												$time_text =  round($interval/60,0) . 'm';
											}
											elseif($interval >= 60*60 && $interval < 60 * 60 * 24){ // quá 1h
												$time_text =  round($interval/3600,0) . 'h';
											}
											elseif($interval >= 60*60*24 && $interval < 60 * 60 * 24 * 30){ // quá 1 ngày 
												$time_text =  round($interval/86400,0) . 'd';
											}
											elseif($interval >= 60*60*24*30 && $interval < 60 * 60 * 24 * 30 * 12){ // quá 1 tháng 
												$time_text =  round($interval/2592000,0) . 'mon';
											}
										?>
										<li>
											<div style="float: left" class="complete-icon">
												<i class="<?php echo $noti['icon'] ?>"></i>
											</div>
											<div style="float: left;">
												<p><?php echo $noti['contents']; ?></p>
												<a id="<?php echo $noti['ID'];?>" class="delete_notification">Xóa</a>
											</div>
											<div style="float: right;">
												<i><?php echo $time_text ?> ago</i>
											</div>
											<div style="clear: both;">
										</li>
									<?php endforeach; ?>
								</ul>
							</div> <!-- /.widget-content -->
						</div> <!-- /.widget .box -->
					</div>
				</div>
			<!-- 	<div class="row">
					<div class="col-md-5">
						<h3 class="text-center" style="font-weight: bold;">Brands statistic</h3>
						<div id="canvas-holder" style="width:100%">
							<canvas id="chart-area"></canvas>
						</div>
					</div>
				</div> -->
	<script>
		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
						<?php echo $percent_apple ?>,
						<?php echo $percent_xiaomi ?>,
						<?php echo $percent_samsung ?>,
						<?php echo $percent_other ?>,
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.orange,
						window.chartColors.yellow,
						window.chartColors.green,
					],
					label: 'Dataset 1'
				}],
				labels: [
					'Apple',
					'Xiaomi',
					'Samsung',
					'Other',
				]
			},
			options: {
				responsive: true
			}
		};

			console.log('123');
			$(".delete_notification").click(function() {
				var id  = $(this).attr('id');
				// console.log('')
				console.log(id);
				$.ajax({
					url: '?controller=home&action=deleteNotification',
					type: 'POST',
					data: {'id' : id},
					success: function(html){
						$('.notication-area').html(html);
					},
				})
			});
	
	</script>
<?php 
	require_once('views/layouts/footer.php');
?>