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

<script>
	$('#addEmployee').on('submit', function(e)
	{
		e.preventDefault();
		$.ajax(
		{
			url: '<?php echo base_url('superAdmin/dashboard/add_new_employee')?>',
			data: $(this).serialize(),
			method: 'post',
			dataType: 'json',
			success: function(data)
			{
				$('#addEmployee')[0].reset();
				$('#addEmp').modal('hide');
				$('#alert').text("Succesfull Add!");
				$('#message').modal('show');
				setTimeout(function(){
					$('#message').modal('hide');
				}, 1500);
				window.location.href="dashboard";
			},
			error: function()
			{
				alert('Employee not add');
			}
		})
	})

</script>

<script>
	$('#resetEmployee').on('submit', function(e)
	{
		e.preventDefault();
		$.ajax(
		{
			url: '<?php echo base_url('superAdmin/dashboard/update_employee')?>',
			data: $(this).serialize(),
			method: 'post',
			dataType: 'json',
			success: function(data)
			{
				$('#resetEmployee')[0].reset();
				$('#resetEmp').modal('hide');
				$('#alert').text("Succesfull reset!");
				$('#message').modal('show');
				setTimeout(function(){
					$('#message').modal('hide');
				}, 1500);
				window.location.href="dashboard";
			},
			error: function()
			{
				alert('Employee not reset');
			}
		})
	})

</script>
	
<script>
	$('#addcubic').on('submit', function(e)
	{
		e.preventDefault();
		$.ajax(
		{
			url: '<?php echo base_url('superAdmin/dashboard/add_cubic');?>',
			data: $(this).serialize(),
			method: 'post',
			dataType: 'json',
			success: function(data)
			{
				$('#addcubic')[0].reset();
				$('#cubic').modal('hide');
				$('#alert').text("Succesfull update!");
				$('#message').modal('show');
				setTimeout(function(){
					$('#message').modal('hide');
				}, 1500);
				window.location.href="dashboard";
			},
			error: function()
			{
				alert('Cubic meter not update');
			}
		})
	})
</script>

<script>
	$('#addfee').on('submit', function(e)
	{
		e.preventDefault();
		$.ajax(
		{
			url: '<?php echo base_url('superAdmin/dashboard/add_fee');?>',
			data: $(this).serialize(),
			method: 'post',
			dataType: 'json',
			success: function(data)
			{
				$('#addfee')[0].reset();
				$('#fee').modal('hide');
				$('#alert').text("Succesfull update!");
				$('#message').modal('show');
				setTimeout(function(){
					$('#message').modal('hide');
				}, 1500);
				window.location.href="dashboard";
			},
			error: function()
			{
				alert('Fees not update');
			}
		})
	})
</script>

<script>
	function view_employee(z, a, b, c, d, e, f, g, h, i)
	{
		$("#z").val(z);
		$("#a").val(a);
		$("#b").val(b);
		$("#c").val(c);
		$("#d").val(d);
		$("#e").val(e);
		$("#f").val(f);
		$("#g").val(g);
		$("#h").val(h);
		$("#i").val(i);
		$("#view").modal('show');
	}

	function update_employee(no, id, fNames, mNames, faName, username, address, contact, type, status, password)
	{
		$("#no").val(no);
		$("#id").val(id);
		$("#fNames").val(fNames);
		$("#mNames").val(mNames);
		$("#faName").val(faName);
		$("#username").val(username);
		$("#address").val(address);
		$("#contact").val(contact);
		$("#type").val(type);
		$("#status").val(status);
		$("#password").val(password);
		$("#resetEmp").modal('show');
	}

</script>

<script>
	var fName = document.getElementById('fName');
		fName.onkeydown = function(e) 
        {
            if((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105))
            {
                return false;
            }
        }

	var mName = document.getElementById('mName');
		mName.onkeydown = function(e) 
        {
            if((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105))
            {
                return false;
            }
        }

	var cno = document.getElementById('cno');
		cno.onkeydown = function(e) 
        {
            if((e.keyCode == 69) || (e.keyCode == 189) || (e.keyCode == 109))
            {
                return false;
            }
        }

	var cubic = document.getElementById('cubic');
		cubic.onkeydown = function(e) 
        {
            if((e.keyCode == 69) || (e.keyCode == 189) || (e.keyCode == 109))
            {
                return false;
            }
        }

	var cfee = document.getElementById('cfee');
		cfee.onkeydown = function(e) 
        {
            if((e.keyCode == 69) || (e.keyCode == 189) || (e.keyCode == 109))
            {
                return false;
            }
        }

	var rfee = document.getElementById('rfee');
		rfee.onkeydown = function(e) 
        {
            if((e.keyCode == 69) || (e.keyCode == 189) || (e.keyCode == 109))
            {
                return false;
            }
        }

	var mfee = document.getElementById('mfee');
		mfee.onkeydown = function(e) 
        {
            if((e.keyCode == 69) || (e.keyCode == 189) || (e.keyCode == 109))
            {
                return false;
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