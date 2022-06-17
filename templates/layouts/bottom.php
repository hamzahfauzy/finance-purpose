<footer class="footer">
        <div class="container-fluid">
            <nav class="pull-left">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="https://htd-official.com">
                            Hamzah Tech Development
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright ml-auto">
                Copyright &copy; 2021, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://www.htd-official.com">HTD</a>
            </div>				
        </div>
    </footer>
</div>
<!-- End Custom template -->
</div>
	<!--   Core JS Files   -->
	<script src="<?=asset('assets/js/core/jquery.3.2.1.min.js')?>"></script>
	<script src="<?=asset('assets/js/core/popper.min.js')?>"></script>
	<script src="<?=asset('assets/js/core/bootstrap.min.js')?>"></script>

	<!-- jQuery UI -->
	<script src="<?=asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')?>"></script>
	<script src="<?=asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')?>"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?=asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')?>"></script>


	<!-- Chart JS -->
	<script src="<?=asset('assets/js/plugin/chart.js/chart.min.js')?>"></script>

	<!-- jQuery Sparkline -->
	<script src="<?=asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')?>"></script>

	<!-- Chart Circle -->
	<script src="<?=asset('assets/js/plugin/chart-circle/circles.min.js')?>"></script>

	<!-- Datatables -->
	<script src="<?=asset('assets/js/plugin/datatables/datatables.min.js')?>"></script>

	<!-- Bootstrap Notify -->
	<script src="<?=asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')?>"></script>

	<!-- jQuery Vector Maps -->
	<script src="<?=asset('assets/js/plugin/jqvmap/jquery.vmap.min.js')?>"></script>
	<script src="<?=asset('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')?>"></script>

	<!-- Sweet Alert -->
	<script src="<?=asset('assets/js/plugin/sweetalert/sweetalert.min.js')?>"></script>

	<!-- Atlantis JS -->
	<script src="<?=asset('assets/js/atlantis.min.js')?>"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="<?=asset('assets/js/setting-demo.js')?>"></script>
	<script src="<?=asset('assets/js/demo.js')?>"></script>
	<script>
		$('.datatable').dataTable();
		<?php if(get_route() == 'default/index'): ?>
		Circles.create({
			id:'circles-1',
			radius:45,
			value:<?=$statistikPengajuan['total']?>,
			maxValue:<?=$statistikPengajuan['total']?>,
			width:7,
			text: "<?=$statistikPengajuan['total']?>",
			colors:['#f1f1f1', '#1572e8'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-2',
			radius:45,
			value:<?=$statistikPengajuan['pending']?>,
			maxValue:<?=$statistikPengajuan['total']?>,
			width:7,
			text: "<?=$statistikPengajuan['pending']?>",
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-3',
			radius:45,
			value:<?=$statistikPengajuan['diterima']?>,
			maxValue:<?=$statistikPengajuan['total']?>,
			width:7,
			text: "<?=$statistikPengajuan['diterima']?>",
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})
		
		Circles.create({
			id:'circles-4',
			radius:45,
			value:<?=$statistikPengajuan['ditolak']?>,
			maxValue:<?=$statistikPengajuan['total']?>,
			width:7,
			text: "<?=$statistikPengajuan['ditolak']?>",
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		var ctx = document.getElementById('statisticsChart').getContext('2d');

		var statisticsChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets: [ {
					label: "Subscribers",
					borderColor: '#f3545d',
					pointBackgroundColor: 'rgba(243, 84, 93, 0.6)',
					pointRadius: 0,
					backgroundColor: 'rgba(243, 84, 93, 0.4)',
					legendColor: '#f3545d',
					fill: true,
					borderWidth: 2,
					data: [154, 184, 175, 203, 210, 231, 240, 278, 252, 312, 320, 374]
				}, {
					label: "New Visitors",
					borderColor: '#fdaf4b',
					pointBackgroundColor: 'rgba(253, 175, 75, 0.6)',
					pointRadius: 0,
					backgroundColor: 'rgba(253, 175, 75, 0.4)',
					legendColor: '#fdaf4b',
					fill: true,
					borderWidth: 2,
					data: [256, 230, 245, 287, 240, 250, 230, 295, 331, 431, 456, 521]
				}, {
					label: "Active Users",
					borderColor: '#177dff',
					pointBackgroundColor: 'rgba(23, 125, 255, 0.6)',
					pointRadius: 0,
					backgroundColor: 'rgba(23, 125, 255, 0.4)',
					legendColor: '#177dff',
					fill: true,
					borderWidth: 2,
					data: [542, 480, 430, 550, 530, 453, 380, 434, 568, 610, 700, 900]
				}]
			},
			options : {
				responsive: true, 
				maintainAspectRatio: false,
				legend: {
					display: false
				},
				tooltips: {
					bodySpacing: 4,
					mode:"nearest",
					intersect: 0,
					position:"nearest",
					xPadding:10,
					yPadding:10,
					caretPadding:10
				},
				layout:{
					padding:{left:5,right:5,top:15,bottom:15}
				},
				scales: {
					yAxes: [{
						ticks: {
							fontStyle: "500",
							beginAtZero: false,
							maxTicksLimit: 5,
							padding: 10
						},
						gridLines: {
							drawTicks: false,
							display: false
						}
					}],
					xAxes: [{
						gridLines: {
							zeroLineColor: "transparent"
						},
						ticks: {
							padding: 10,
							fontStyle: "500"
						}
					}]
				}, 
				legendCallback: function(chart) { 
					var text = []; 
					text.push('<ul class="' + chart.id + '-legend html-legend">'); 
					for (var i = 0; i < chart.data.datasets.length; i++) { 
						text.push('<li><span style="background-color:' + chart.data.datasets[i].legendColor + '"></span>'); 
						if (chart.data.datasets[i].label) { 
							text.push(chart.data.datasets[i].label); 
						} 
						text.push('</li>'); 
					} 
					text.push('</ul>'); 
					return text.join(''); 
				}  
			}
		});

		var myLegendContainer = document.getElementById("myChartLegend");

		// generate HTML legend
		myLegendContainer.innerHTML = statisticsChart.generateLegend();

		// bind onClick event to all LI-tags of the legend
		var legendItems = myLegendContainer.getElementsByTagName('li');
		for (var i = 0; i < legendItems.length; i += 1) {
			legendItems[i].addEventListener("click", legendClickCallback, false);
		}

		<?php endif ?>
	</script>
</body>
</html>