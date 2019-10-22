    </div>
  </div>

</div>
    <!-- End Custom template -->
    </div>
    <!--   Core JS Files   -->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/assets/js/core/popper.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    

    <!-- Moment JS -->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/plugin/moment/moment.min.js"></script>

    <!-- Chart JS -->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
    
    <!-- Bootstrap Toggle -->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
    
    <!-- Datatables -->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/plugin/datatables/datatables.min.js"></script>
    
    <!-- Google Maps Plugin -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1On32WMJzaErjXZhvYcEvYDQ_5PvlMCw"></script>
    <script src="<?php echo base_url() ?>assets/admin/assets/js/plugin/gmaps/gmaps.js"></script>

    <!-- Google Maps Plugin -->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/plugin/gmaps/gmaps.js"></script>

    <!-- Sweet Alert -->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Azzara JS -->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/ready.min.js"></script>

    <!-- jQuery Scrollbar -->
	<script src="<?php echo base_url() ?>assets/admin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	
	<script src="<?php echo base_url() ?>assets/admin/addloader.js"></script>
    
    <script>        
        $(document).ready(function(){
            $('#basic-datatables').DataTable();
            
			var mapMarkers = new GMaps({
				div: '#map-markers',
				lat: -6.9826892,
				lng: 110.4085418,
			});

			mapMarkers.addMarker({
				lat: -6.9826892,
				lng: 110.4085418,
				title: 'Lima',
				details: {
					database_id: 42,
					author: 'HPNeo'
				},
				click: function(e){
					if(console.log)
						console.log(e);
					alert('You clicked in this marker');
				}
            });

        });
    </script>
    <script>
        $(document).ready(function(){
            $('#del').click(function(e) {
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    buttons:{
                        cancel: {
                            visible: true,
                            text : 'No, cancel!',
                            className: 'btn btn-danger'
                        },        			
                        confirm: {
                            text : 'Yes, delete it!',
                            className : 'btn btn-success'
                        }
                    }
                }).then((willDelete) => {
                    if (willDelete) {
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                            buttons : {
                                confirm : {
                                    className: 'btn btn-success'
                                }
                            }
                        });
                    } else {
                        swal.close();
                    }
                });
            });
        });
	</script>
	<script>
		<?php
			foreach($best as $top){
				$jdl[]=$top->judul_buku;
				$rtot[]=$top->tot;
			}		
		?>

		var pieChart = document.getElementById('pieChart').getContext('2d');
		var myPieChart = new Chart(pieChart, {
			type: 'pie',
			data: {
				datasets: [{
					// data: [510, 325, 135,535, 515,3325, 125,315, 125],
					data: <?php echo json_encode($rtot); ?>,
					backgroundColor :[
						"#eb3434",
						"#eb8934",
						"#ebd634",
						"#b7eb34",
						"#3deb34",
						"#03dbfc",
						"#349feb",
						"#8934eb",
						"#eb34b7"
					],
					borderWidth: 0
				}],
				// labels: ['New Visitors', 'Subscribers', 'Active Users'] 
				labels: <?php echo json_encode($jdl); ?>, 
			},
			options : {
				responsive: true, 
				maintainAspectRatio: false,
				legend: {
					position : 'bottom',
					labels : {
						fontColor: 'rgb(154, 154, 154)',
						fontSize: 11,
						usePointStyle : true,
						padding: 20
					}
				},
				pieceLabel: {
					render: 'percentage',
					fontColor: 'white',
					fontSize: 14,
				},
				tooltips: false,
				layout: {
					padding: {
						left: 20,
						right: 20,
						top: 20,
						bottom: 20
					}
				}
			}
		});
	</script>
    <script>
		<?php
			foreach($kec as $value){
				$resulta[]=$value->alamat;
				$dtot[]=$value->tot;
			}
		?>
		
		var barChart = document.getElementById('barChart').getContext('2d');
		var myBarChart = new Chart(barChart, {
			type: 'bar',
			data: {
				// labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				labels: <?php echo json_encode($resulta); ?>, 
				datasets : [{
					label: "Anggota",
					backgroundColor: 'rgb(23, 125, 255)',
					borderColor: 'rgb(23, 125, 255)',
					// data: [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4],
					data: <?php echo json_encode($dtot); ?>,
				}],
			},
			options: {
				responsive: true, 
				maintainAspectRatio: false,
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				},
			}
		});	
	</script>

	<script type="text/javascript">

	google.charts.load('current', {packages:['corechart', 'bar']});
	google.charts.setOnLoadCallback();

	function load_monthwise_data(kec, title)
	{
		var temp_title = title + ' ' + kec;
		$.ajax({
			url:"<?php echo base_url(); ?>dynamic_chart/fetch_data",
			method:"POST",
			data:{alamat:kec},
			dataType:"JSON",
			success:function(data)
			{
				drawMonthwiseChart(data, temp_title);
			}
		})
	}

	function drawMonthwiseChart(chart_data, chart_main_title)
	{
		var jsonData = chart_data;
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Month');
		data.addColumn('number', 'Profit');

		$.each(jsonData, function(i, jsonData){
			var month = jsonData.month;
			var profit = parseFloat($.trim(jsonData.profit));
			data.addRows([[month, profit]]);
		});

		var options = {
			title:chart_main_title,
			hAxis: {
				title: "Months"
			},
			vAxis: {
				title: 'Profit'
			},
			chartArea:{width:'80%',height:'85%'}
		}

		var chart = new google.visualization.ColumnChart(document.getElementById('chart_area'));

		chart.draw(data, options);
	}

	</script>

	<script>
		
	$(document).ready(function(){
		$('#year').change(function(){
			var year = $(this).val();
			if(year != '')
			{
				load_monthwise_data(year, 'Month Wise Profit Data For');
			}
		});
	});

	</script>

</body>
</html>
