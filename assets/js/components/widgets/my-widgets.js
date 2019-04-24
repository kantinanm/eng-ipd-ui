(function ($) {

    'use strict';
	
	// ------------------------------------------------------- //
	// Widget 01 (Happy Customers)
	// ------------------------------------------------------ //
	$('.circle').circleProgress({
		value: 0.87,
		size: 150,
		startAngle: -Math.PI / 2,
		thickness: 14,
		lineCap: 'round',
		emptyFill: '#f0eff4',
		fill: {
			gradient: ['#f9a58d', '#e76c90']
		}
	}).on('circle-animation-progress', function (event, progress) {
		$(this).find('.percent').html(Math.round(87 * progress) + '<i>%</i>');
	});

	// ------------------------------------------------------- //
	// Widget 01 (Today Sales)
	// ------------------------------------------------------ //
	var ctx = document.getElementById('today-chart').getContext("2d");

	var myChart = new Chart(ctx, {
		type: 'line',
		data: {
			labels: ["13:00", "14:05", "14:20", "14:32", "15:47", "16:30"],
			datasets: [{
				label: "Sales",
				borderColor: '#08a6c3',
				pointRadius: 0,
				pointHitRadius: 5,
				pointHoverRadius: 3,
				pointHoverBorderColor: "#08a6c3",
				pointHoverBackgroundColor: "#08a6c3",
				pointHoverBorderWidth: 3,
				fill: true,
				backgroundColor: '#fff',
				borderWidth: 3,
				data: [10, 12, 8, 14, 8, 10]
			}]
		},
		options: {
			tooltips: {
				backgroundColor: 'rgba(47, 49, 66, 0.8)',
				titleFontSize: 13,
				titleFontColor: '#fff',
				caretSize: 0,
				cornerRadius: 4,
				xPadding: 8,
				displayColors: false,
				yPadding: 8,
			},
			layout: {
				padding: {
					left: 0,
					right: 0,
					top: 5,
					bottom: 5
				}
			},
			legend: {
				display: false
			},
			scales: {
				yAxes: [{
					ticks: {
						display: false,
						beginAtZero: false,
						maxTicksLimit: 3,
					},
					gridLines: {
						drawBorder: false,
						display: false
					}
				}],
				xAxes: [{
					gridLines: {
						drawBorder: false,
						display: false
					},
					ticks: {
						display: false
					}
				}]
			}
		}
	});


   
	
    // ------------------------------------------------------- //
    // Widget 21 (Hit Rate)
    // ------------------------------------------------------ //
    $('.hit-rate').circleProgress({
        value: 0.62,
        size: 140,
        startAngle: -Math.PI / 2,
        thickness: 6,
        lineCap: 'round',
        emptyFill: '#f0eff4',
        fill: {
            gradient: ['#c44a4a', '#fe195e']
        }
    }).on('circle-animation-progress', function (event, progress) {
        $(this).find('.percent').html(Math.round(62 * progress) + '<i>%</i>');
    });	
	
    // ------------------------------------------------------- //
    // Widget 22 (Happy Customers)
    // ------------------------------------------------------ //
    $('.happy-customers').circleProgress({
        value: 0.85,
        size: 140,
        startAngle: -Math.PI / 2,
        thickness: 6,
        lineCap: 'round',
        emptyFill: 'rgba(255, 255, 255, 0.15)',
        fill: {
            gradient: ['#fff', '#fff']
        }
    }).on('circle-animation-progress', function (event, progress) {
        $(this).find('.percent').html(Math.round(85 * progress) + '<i>%</i>');
    });	
	

	
})(jQuery);