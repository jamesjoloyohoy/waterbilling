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

	function update_employee(no, id, fName, mName, faName, username, address, contact, type, status, password)
	{
		$("#no").val(no);
		$("#id").val(id);
		$("#fName").val(fName);
		$("#mName").val(mName);
		$("#faName").val(faName);
		$("#username").val(username);
		$("#address").val(address);
		$("#contact").val(contact);
		$("#type").val(type);
		$("#status").val(status);
		$("#password").val(password);
		$("#Medium-modal").modal('show');
	}
</script>