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
												foreach($consumer as $c){?>
												<tr>
													<td><?php echo 
														$i;
														$i++
													?></td>
													<td><?php echo $c->Mtr_id?></td>
													<td><?php echo $c->Cons_fName?> <?php echo $c->Cons_mName?> <?php echo $c->Cons_faName?></td>
													<td><?php echo $c->Cons_address?></td>
												</tr>
											<?php } 
													foreach($noRead_consumer as $nrc){?>
												<tr>
													<td><?php echo 
														$i;
														$i++
													?></td>
													<td><?php echo $nrc->Mtr_id?></td>
													<td><?php echo $nrc->Cons_fName?> <?php echo $nrc->Cons_mName?> <?php echo $nrc->Cons_faName?></td>
													<td><?php echo $nrc->Cons_address?></td>
												</tr>
											<?php } ?>
										</tbody>
									</table>
												
									</div>
								</div>
								<div class="tab-pane fade" id="disconnect" role="tabpanel">
									<div class="pd-20">
										
										<table class="data-table table-bordered stripe hover nowrap" style = "margin-left: -3.5%;">
											<thead>
												<tr>
													<th class="table-plus datatable-nosort">No.</th>
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
													foreach($noticeOfDisconnection as $nod){?>
														<tr>
															<td><?php echo 
																$i;
																$i++
															?></td>
															<td><?php echo $nod['Mtr_id']?></td>
															<td><?php echo $nod['Cons_fName']?> <?php echo $nod['Cons_mName']?> <?php echo $nod['Cons_faName']?></td>
															<td><?php echo $nod['Cons_zone']?> <?php echo $nod['Cons_barangay']?> <?php echo $nod['Cons_province']?></td>
															<td><?php echo $nod['Read_currBill']?></td>
															<td><?php echo $nod['Rate_totalUsage']?></td>
															<td class = "text-center">
																<button class = "btn btn-primary btn-sm">
																	<i class = "fa fa-print"> Print</i>
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

