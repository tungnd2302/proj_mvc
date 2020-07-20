/*
 * charts/chart_filled_blue.js
 *
 * Demo JavaScript used on charts-page for "Filled Chart (Blue)".
 */

"use strict";

$(document).ready(function(){
	var thang1 = $("#thang1").html();
	var thang2 = $("#thang2").html();
	var thang3 = $("#thang3").html();
	var thang4 = $("#thang4").html();
	var thang5 = $("#thang5").html();
	var thang6 = $("#thang6").html();
	var thang7 = $("#thang7").html();
	var thang8 = $("#thang8").html();
	var thang9 = $("#thang9").html();
	var thang10 = $("#thang10").html();
	var thang11 = $("#thang11").html();
	var thang12 = $("#thang12").html();
	console.log('thang1 ' + thang1);

	// Sample Data
	var d1 = [[1262304000000, thang1], [1264982400000, thang2], [1267401600000, thang3], [1270080000000, thang4], [1272672000000, thang5], [1275350400000, thang6], [1277942400000, thang7], [1280620800000, thang8], [1283299200000, thang9], [1285891200000, thang10], [1288569600000, thang11], [1291161600000, thang12]];

	var data1 = [
		{ label: "Total clicks", data: d1, color: App.getLayoutColorCode('blue') }
	];

	$.plot("#chart_filled_blue", data1, $.extend(true, {}, Plugins.getFlotDefaults(), {
		xaxis: {
			min: (new Date(2009, 12, 1)).getTime(),
			max: (new Date(2010, 11, 2)).getTime(),
			mode: "time",
			tickSize: [1, "month"],
			monthNames: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
			tickLength: 0
		},
		series: {
			lines: {
				fill: true,
				lineWidth: 1.5
			},
			points: {
				show: true,
				radius: 2.5,
				lineWidth: 1.1
			},
			grow: { active: true, growings:[ { stepMode: "maximum" } ] }
		},
		grid: {
			hoverable: true,
			clickable: true
		},
		tooltip: true,
		tooltipOpts: {
			content: '%s: %y'
		}
	}));


});