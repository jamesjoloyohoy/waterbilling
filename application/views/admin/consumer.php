<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4 style = "color: #ffff00">Consumer</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
							</ol>
						</nav>
					</div>
				</div>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 mb-30">
				<div class="pd-20 bg-white border-radius-4 box-shadow">
					<button class= "btn btn-primary btn-sm" data-toggle="modal" data-target="#consumer" style = "margin-left: 2%;">
						<i class = "fa fa-plus"> Add Consumer</i>
					</button>
					<br />
					<br />
					<div class="tab">
						<form class="row" action = "<?php echo base_url('admin/zone');?>" method = "POST">
							<div class="col-md-3 col-sm-12">
								<div class="form-group">
									<label>Zone</label>
									<br />
									<input type = "search" list = "zone" name = "searchZone" class="form-control-sm" placeholder = "Search..." autocomplete = "off">
									<datalist id = "zone">
										<option></option>
										<?php  foreach($zone as $z){?>
										<option value = "<?php echo $z->Cons_zone?>"></option>
										<?php }?>
									</datalist>
								</div>
							</div>
							<div class="col-md-3 col-sm-12">
								<div class="form-group">
									<label>Barangay</label>
									<input type = "search" list = "barangay" name = "searchBrgy" class="form-control-sm" placeholder = "Search..." autocomplete = "off">
									<datalist id = "barangay">
										<option></option>
										<?php  foreach($barangay as $b){?>
										<option value = "<?php echo $b->Cons_barangay?>"></option>
										<?php }?>
									</datalist>
								</div>
							</div>
							<div class="col-md-2 col-sm-12">
								<button type="submit" class = "btn btn-secondary btn-sm" style = "margin-top: 26%;">
									<i class = "fa fa-print"> Print</i>
								</button>
							</div>
						</form>

						<table class="data-table table-bordered stripe hover nowrap">
							<thead>
								<tr>
									<th>No.</th>
									<th>Meter No.</th>
									<th>Name</th>
									<th>Address</th>
									<th class="datatable-nosort">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i = 1;
									foreach($consumer as $c){?>
										<tr>
											<td><?php echo 
													$i;
													$i++
												?></td>
											<td><?php echo $c->Mtr_id?></td>
											<td><?php echo $c->Cons_fName?> <?php echo $c->Cons_mName?> <?php echo $c->Cons_faName?></td>
											<td><?php echo $c->Cons_zone?> <?php echo $c->Cons_barangay?> <?php echo $c->Cons_province?></td>
											<td class = "text-center">
												<div class="dropdown">
													<a class="btn btn-outline-primary dropdown-toggle btn-sm" href="#" role="button" data-toggle="dropdown">
														<i class="fa fa-ellipsis-h"></i>
													</a>
													<div class="dropdown-menu">
														<br />
														<button class = "btn btn-primary btn-sm" style = "margin-left: 15%; margin-bottom: 3%;">
															<a href = "<?php echo base_url('admin/consumer/get_consumerInfo/'.$c->Mtr_no);?>">
																<i class = "fa fa-eye" style = "color: white"> View</i>
															</a>
														</button>
														<br />
														<button onclick = "update_consumer('<?php echo $c->Cons_no?>','<?php echo $c->Cons_fName?>','<?php echo $c->Cons_mName?>','<?php echo $c->Cons_faName?>','<?php echo $c->Cons_zone?>','<?php echo $c->Cons_barangay?>','<?php echo $c->Cons_spouse?>','<?php echo $c->Cons_dApplied?>','<?php echo $c->Cons_status?>','<?php echo $c->Cons_serviceFee?>','<?php echo $c->fee_Fee_no?>')" class = "btn btn-secondary btn-sm" type="button" data-toggle="modal"  style = "margin-left: 15%;">
															<i class="fa fa-pencil"></i> Update
														</button>
														<br />
														<br />
													</div> 
												</div>
											</td>
										</tr>
								<?php }?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
<?php $this->load->view('modal/admin/update_consumer');?>	
<?php $this->load->view('modal/admin/add_consumer');?>	
<?php $this->load->view('modal/message');?>	

