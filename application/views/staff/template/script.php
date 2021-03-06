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

<!-- add_reading -->
<script>
	var d = new Date();
	d.setMonth(d.getMonth() - 1);
	var days = ["January","February","March","April","May","June","July","August","September","October","November","December"];
	document.getElementById("da").value = days[d.getMonth()];
</script>

<script>
	var d = new Date();
	var e = new Date();
	d.setDate(d.getDate() + 20);
	document.getElementById("date").value = d.toDateString();
	document.getElementById("deli").value = e.toDateString();
	document.getElementById("rece").value = e.toDateString();
</script>

<script>
	function press()
	{
		var pres = document.getElementById('pres');
		var prev = document.getElementById('prev');
		var cubic = document.getElementById('cubic');
		var prbil = document.getElementById('prbil').value;
		var pbil = document.getElementById('pbil');

		var dif = pres.value-prev.value;
		var mul = dif * cubic.value;


		if(parseFloat(pres.value) <= parseFloat(prev.value))
		{
			$('#alert').text("Present reading cannot less than or equal to Previous reading!");
			$('#message').modal('show');
			setTimeout(function(){
				$('#message').modal('hide');
			}, 1500);
			$('#pres').val("");
			$('#sub').val("");
			$('#prbil').val("");

			var totals = parseInt(mul) + parseInt(pbil.value);

			$('#final').val("");

		}

		else
		{
			$('#sub').val(dif);

			$('#prbil').val(mul);

			var totals = parseInt(mul) + parseInt(pbil.value);

			$('#final').val(totals);
		}

	}
</script>

<!-- add_reading -->

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

<!-- <dashboard> -->

<script>
	$(function() {
		$('#addReadingInput').on('keypress',function(e) {
			if(e.which == 13) {
				$('#enterClickBtn').click();
				return false;
			}
		});
	})
	
</script>
<script>
	function getMonth(month) {
			console.log(month);
			if (month<20 || month>25) {
				$('#message').text("wala pay 20/lapas na 25");
				$('#alert').modal('show');
				setTimeout(function(){
					$('#alert').modal('hide');
				}, 1500);
				return false;
			} else {
				$('#select').click();
			}
		};
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
<!-- <dashboard> -->

<script>
	$('#updateprofile').on('submit', function(e)
	{
		e.preventDefault();
		$.ajax(
		{
			url: '<?php echo base_url('staff/profile/update');?>',
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

<script >
	function myprint()
	{
		window.print();
		alert("Success");
	}
</script>