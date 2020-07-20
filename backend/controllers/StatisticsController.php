<?php 
require_once('controllers/Controller.php');
require_once('models/statistics.php');
class StatisticsController extends Controller{
		public function list(){
			$statisticsModel = new statistics();
			$revenue = $statisticsModel->list();
			
			$totalYearModel = new statistics();
			$totalYear = $totalYearModel->totalYear();


			$quarterModel = new statistics();
			$totalQuarter = $quarterModel->totalQuarter();

			$monthTotal = new statistics();
			$totalMonth = $monthTotal->totalMonth();

			$todayTotal = new statistics();
			$totaltoday = $todayTotal->totalDay();


			require_once('views/statistics/list.php');

			
		}
	}

?>