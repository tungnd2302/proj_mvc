<script type="text/javascript" src="public/assets/js/jquery.min.js"></script>
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
</li><?php endforeach; ?>
<script type="text/javascript">
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