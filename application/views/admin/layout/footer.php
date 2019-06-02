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

    <!-- jQuery Scrollbar -->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

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
</body>
</html>
