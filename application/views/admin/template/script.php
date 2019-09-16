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
<script src="<?php echo base_url()?>assets/src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
<script src="<?php echo base_url()?>assets/src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
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
			"lengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
			"language": {
				"info": "_START_-_END_ of _TOTAL_ entries",
				searchPlaceholder: "Search"
			},
		});
	});
</script>


<script>

var temp = <?php echo json_encode($year);?>;

Highcharts.chart('monthly', {
			chart: {
				type: 'column',
				events: {
					load: function () {
						var chart = this
						var data = []
						var tempYr = temp[0].year;
						var dataTemp = {name: tempYr, data:[]};
						data.push(dataTemp)
						var i = 0;
						temp.forEach(function(tmp){
							
							if(tempYr != tmp.year)
							{
								chart.addSeries(data[i])
								i++;
								data.push({name: tmp.year, data:[]})
								data[i].data.push(parseInt(tmp.amt))
								tempYr = tmp.year;
								
								
							}
							else{
								
								data[i].data.push(parseInt(tmp.amt))
								
							}
							
						})
						chart.addSeries(data[i])
						
					}
				}
			},
			title: {
				text: 'Monthly Income'
			},
			subtitle: {
				text: ''
			},
			xAxis: {
				categories: [
				'Jan',
				'Feb',
				'Mar',
				'Apr',
				'May',
				'Jun',
				'Jul',
				'Aug',
				'Sep',
				'Oct',
				'Nov',
				'Dec'
				],
				crosshair: true
			},
			yAxis: {
				min: 0,
				title: {
					text: 'Total Income'
				}
			},
			tooltip: {
				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
				'<td style="padding:0"><b>{point.y:.2f} php</b></td></tr>',
				footerFormat: '</table>',
				shared: true,
				useHTML: true
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0
				}
			},
			series: [
			]
		});
</script>

<script>
	function update_consumer(no, fname, mname, faname, zone, barangay, spouse, dapplied, status, service, other, fee)
	{
		$("#no").val(no);
		$("#fname").val(fname);
		$("#mname").val(mname);
		$("#faname").val(faname);
		$("#nzone").val(zone);
		$("#nbarangay").val(barangay);
		$("#spouse").val(spouse);
		$("#dapplied").val(dapplied);
		$("#status").val(status);
		$("#service").val(service);
		$("#other").val(other);
		$("#fee").val(fee);
		$("#update_consumer").modal('show');
	}
</script>