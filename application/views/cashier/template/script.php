<script src="<?php echo base_url()?>assets/vendors/scripts/script.js"></script>
<script src="<?php echo base_url()?>assets/src/plugins/dropzone/src/dropzone.js"></script>
<script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/dataTables.bootstrap4.js"></script>
<script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/dataTables.responsive.js"></script>
<script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/responsive.bootstrap4.js"></script>
<script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/button/dataTables.buttons.js"></script>
<script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/button/buttons.bootstrap4.js"></script>
<script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/button/buttons.print.js"></script>
<script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/button/buttons.html5.js"></script>
<script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/button/buttons.flash.js"></script>
<script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/button/pdfmake.min.js"></script>
<script src="<?php echo base_url()?>assets/src/plugins/datatables/media/js/button/vfs_fonts.js"></script>
<!-- <script src="<?php echo base_url()?>assets/src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
<script src="<?php echo base_url()?>assets/src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script> -->
	<script>
		$('document').ready(function(){
			$('.data-table').DataTable({
				scrollCollapse: true,
				autoWidth: false,
				responsive: true,
				columnDefs: [{
					targets: "datatable-nosort",
					orderable: false,
				}],
				"lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]],
				"language": {
					"info": "_START_-_END_ of _TOTAL_ entries",
					searchPlaceholder: "Search"
				},
			});
		});
	</script>

<script>
	function press()
	{
		var total = document.getElementById('total');
		var cash = document.getElementById('cash');

		if(parseFloat(cash.value) < parseFloat(total.value))
		{
			$('#alert').text("Insufficient Amount!");
			$('#message').modal('show');
			setTimeout(function(){
				$('#message').modal('hide');
			}, 1500);
			$('#cash').val("");
			$('#changes').val("");
		}
		else
		{
			var change = cash.value - total.value;

			$('#changes').val(change.toFixed(2));
		}		
	}
</script>

<script type="text/javascript">
	$(function(){
		$('#update_profile').click(function(){
			$('#fname').removeAttr('readonly');
			$('#mname').removeAttr('readonly');
			$('#faname').removeAttr('readonly');
			$('#username').removeAttr('readonly');
			$('#address').removeAttr('readonly');
			$('#contact').removeAttr('readonly');
			$('#password').removeAttr('readonly');
			
			$('#update_profile').hide();
			$('#submit_profile').show();
		});
	})
</script>

<script>
	$('#updateprofile').on('submit', function(e)
	{
		e.preventDefault();
		$.ajax(
		{
			url: '<?php echo base_url('cashier/profile/update');?>',
			data: $(this).serialize(),
			method: 'post',
			dataType: 'json',
			success: function(data)
			{
				$('#alert').text("Succesfull update!");
				$('#message').modal('show');
				setTimeout(function(){
					$('#message').modal('hide');
				}, 5000);
				window.location.href="http://localhost/waterBilling/";
			},
			error: function()
			{
				alert('Profile not update');
			}
		})
	})

</script>

<script>
	$('#transaction').on('submit', function(e)
	{
		e.preventDefault();
		$.ajax(
		{
			url: '<?php echo base_url('cashier/receipt/add_transaction');?>',
			data: $(this).serialize(),
			method: 'post',
			dataType: 'json',
			success: function(data)
			{
				window.print();
				alert("Success");
				window.location.href="dashboard";
			},
			error: function()
			{
				alert('Error');
			}
		})
	})

</script>

<script>
	$(function() {
		$('#getMtrNo').on('keypress',function(e) {
			if(e.which == 13) {
				$('#enterBtn').click();
				return false;
			}
		});
	})
	
</script>

<script>
	$('document').ready(function(){
		<?php if($this->session->flashdata('error')): ?>
			$('#alert').modal('show');
			setTimeout(function(){
				$('#alert').modal('hide');
			}, 1500);
		<?php endif; ?>	
	});
</script>