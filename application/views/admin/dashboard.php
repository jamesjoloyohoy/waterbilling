<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4 style = "color: #ffff00">Dashboard</h4>
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
						<div class="tab">
							<ul class="nav nav-tabs customtab" role="tablist">
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#read" role="tab" aria-selected="true">Not read for this Month</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#disconnect" role="tab" aria-selected="false">Notice of Disconnection</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#connectdis" role="tab" aria-selected="false">Disconnected</a>
								</li>
							</ul>
							<div class="tab-content">
								<div class="tab-pane fade" id="read" role="tabpanel">
									<div class="pd-20">
										
									<table class="data-table table-bordered stripe hover nowrap">
										<thead>
											<tr>
												<th class="table-plus datatable-nosort">No.</th>
												<th>Meter No.</th>
												<th>Name</th>
												<th>Address</th>
											</tr>
										</thead>
										<tbody>
												<?php
													$i = 1;
													foreach($noRead as $nr){?>
													<tr>
														<td><?php echo 
															$i;
															$i++
														?></td>
														<td><?php echo $nr['Mtr_id']?></td>
														<td><?php echo $nr['Cons_name']?></td>
														<td><?php echo $nr['address']?></td>
													</tr>
												<?php }?>
										</tbody>
									</table>
												
									</div>
								</div>
								<div class="tab-pane fade" id="disconnect" role="tabpanel">
									<div class="pd-20">
										
										<table class="data-table table-bordered stripe hover nowrap">
											<thead>
												<tr>
													<th>Meter No.</th>
													<th>Name</th>
													<th>Address</th>
													<th>Meter Used</th>
													<th>Amount</th>
													<th class="datatable-nosort">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
													$i = 1;
													foreach($noticeOfDisconnection as $nof){ 
														if ($nof['bill_numOfRead'] == 3) { ?>
														<tr>
															<td><?php echo $nof['Mtr_id']?></td>
															<td><?php echo $nof['Cons_name']?></td>
															<td><?php echo $nof['Cons_address']?></td>
															<td class = "text-center"><?php echo $nof['bill_meterUsed']?></td>
                                                			<td class = "text-right">₱<?php echo $nof['bill_currUsage']?></td>
															<td class = "text-center">
																<div class="dropdown">
																	<a class="btn btn-outline-primary dropdown-toggle btn-sm" href="#" role="button" data-toggle="dropdown">
																		<i class="fa fa-ellipsis-h"></i>
																	</a>
																	<div class="dropdown-menu">
																		<br />
																		<button class = "btn btn-primary btn-sm" style = "margin-left: 15%;">
																			<a href = "<?php echo base_url("admin/notice/get_notPaid/".$nof['Mtr_no']);?>">
																				<i class = "fa fa-print" style = "color: white"> Print</i>
																			</a>
																		</button>
																		<br />
																		<a class = "btn btn-danger btn-sm" style = "margin-left: 15%; margin-top: 3%;" type = "button" href="<?php echo base_url('admin/dashboard/disconnect/'.$nof['Mtr_no']); ?>">
																			<i class = "fa fa-times"> Disconnection</i>
																		</a>
																		<br />
																		<br />
																	</div> 
															</div>
															</td>
														</tr>
												<?php } }?>
											</tbody>
										</table>

									</div>
								</div>
								<div class="tab-pane fade" id="connectdis" role="tabpanel">
									<div class="pd-20">
										
									<table class="data-table table-bordered stripe hover nowrap">
										<thead>
											<tr>
												<th class="table-plus datatable-nosort">No.</th>
												<th>Meter No.</th>
												<th>Name</th>
												<th>Address</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$i = 1;
												foreach($consumerdis as $cd){?>
													<tr>
														<td><?php echo 
																$i;
																$i++
															?></td>
														<td><?php echo $cd->Mtr_id?></td>
														<td><?php echo $cd->Cons_fName?> <?php echo $cd->Cons_mName?> <?php echo $cd->Cons_faName?></td>
														<td><?php echo $cd->Cons_zone?> <?php echo $cd->Cons_barangay?> <?php echo $cd->Cons_province?></td>
														<td class = "text-center">
															<button class = "btn btn-primary btn-sm" type = "button">
																<a href = "<?php echo base_url('admin/dashboard/connect/'.$cd->Mtr_no); ?>">
																	<i class = "fa fa-check" style = "color: white"> Reconnection</i>
																</a>
															</button>
														</td>
													</tr>
											<?php }?>
										</tbody>
									</table>
												
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<br />

				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-30">
					<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
						<div id="monthly"><input ></div>
					</div>
				</div>
</div>
<?php $this->load->view('modal/alert');?>	


