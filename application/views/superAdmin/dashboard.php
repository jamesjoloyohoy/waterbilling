<div class="container" >
	<div class="pd-ltr-20 height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="blog-wrap">
					<div class="container pd-0">
					<br />
					<br />
					<br />
						<div class="row">
							<div class="col-md-12 col-sm-12">
									<ul>
										<li>
											<div class="row no-gutters">
												<div class="col-lg-12 col-md-12 col-sm-12">
													<div class="blog-caption">
													
													<div class="col-lg-12 col-md-12 col-sm-12 mb-30" >
														<div class="pd-20 bg-white border-radius-4 box-shadow">
															<button class= "btn btn-primary btn-sm" data-toggle="modal" data-target="#addEmp" style = "margin-left: 2%;">
																<i class = "fa fa-plus"> Add Employee</i>
															</button>
															<div class="tab">
																<ul class="nav nav-tabs customtab" role="tablist">
																	<li class="d-flex align-items-center">
																		<a class="nav-link" data-toggle="tab" href="#admin" role="tab" aria-selected="false">ADMIN</a>
																		<div class="visit">
																			<span class="badge badge-pill badge-dark" style = "margin-bottom: 30%;"><?php echo $cadmin['type']?></span>
																		</div>
																	</li>
																	<li class="d-flex align-items-center" style = "margin-left: 5%;">
																		<a class="nav-link" data-toggle="tab" href="#cashier" role="tab" aria-selected="false">CASHIER</a>
																		<div class="visit">
																			<span class="badge badge-pill badge-dark" style = "margin-bottom: 30%;"><?php echo $ccashier['type']?></span>
																		</div>
																	</li>
																	<li class="d-flex align-items-center" style = "margin-left: 5%;">
																		<a class="nav-link" data-toggle="tab" href="#staff" role="tab" aria-selected="true">STAFF</a>
																		<div class="visit">
																			<span class="badge badge-pill badge-dark" style = "margin-bottom: 30%;"><?php echo $cstaff['type']?></span>
																		</div>
																	</li>
																	<li class="d-flex align-items-center" style = "margin-left: 5%;">
																		<a class="nav-link" data-toggle="tab" href="#inactive" role="tab" aria-selected="true">INACTIVE</a>
																		<div class="visit">
																			<span class="badge badge-pill badge-danger" style = "margin-bottom: 30%;"><?php echo $cinactive['type']?></span>
																		</div>
																	</li>
																</ul>
																<div class="tab-content">
																	<div class="tab-pane fade" id="admin" role="tabpanel">
																		<div class="pd-20">
																			
																			<table class="data-table table-bordered stripe hover nowrap">
																				<thead>
																					<tr>
																						<th>ID</th>
																						<th>Name</th>
																						<th>Address</th>
																						<th class="datatable-nosort">Action</th>
																					</tr>
																				</thead>
																				<tbody>
																					<?php
																						foreach($admin as $emp){?>
																							<tr>
																								<td><?php echo $emp->Emp_id?></td>
																								<td><?php echo $emp->Emp_faName?>, <?php echo $emp->Emp_fName?> <?php echo $emp->Emp_mName?> </td>
																								<td><?php echo $emp->Emp_address?></td>
																								<td class = "text-center">
																									<div class="dropdown">
																										<a class="btn btn-outline-primary dropdown-toggle btn-sm" href="#" role="button" data-toggle="dropdown">
																											<i class="fa fa-ellipsis-h"></i>
																										</a>
																										<div class="dropdown-menu">
																											<br />
																											<button onclick = "view_employee('<?php echo $emp->Emp_id?>','<?php echo $emp->Emp_fName?>','<?php echo $emp->Emp_mName?>','<?php echo $emp->Emp_faName?>','<?php echo $emp->Emp_username?>','<?php echo $emp->Emp_address?>','<?php echo $emp->Emp_contact?>','<?php echo $emp->Acc_type?>','<?php echo $emp->Emp_status?>')" class = "btn btn-secondary btn-sm" type="button" data-toggle="modal"  style = "margin-left: 15%; margin-bottom: 3%;">
																												<i class="fa fa-eye"></i> View
																											</button>
																											<br />
																											<button onclick = "update_employee('<?php echo $emp->Emp_no?>','<?php echo $emp->Emp_id?>','<?php echo $emp->Emp_fName?>','<?php echo $emp->Emp_mName?>','<?php echo $emp->Emp_faName?>','<?php echo $emp->Emp_id?>','<?php echo $emp->Emp_address?>','<?php echo $emp->Emp_contact?>','<?php echo $emp->Acc_type?>','<?php echo $emp->Emp_status?>','<?php echo $emp->Emp_id?>')" class = "btn btn-primary btn-sm" type="button" style = "margin-left: 15%;" data-toggle="modal">
																												<i class="fa fa-pencil"></i> Reset
																											</button>
																											<br />
																											<a class = "btn btn-danger btn-sm"  style = "margin-left: 15%; margin-top: 3%;" type = "button" href="<?php echo base_url('superAdmin/dashboard/inactive/'.$emp->Emp_no); ?>">
																												<i class = "fa fa-pencil"> Inactivate</i>
																											</a>
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
																	<div class="tab-pane fade" id="cashier" role="tabpanel">
																		<div class="pd-20">
																			
																			<table class="data-table table-bordered stripe hover nowrap">
																				<thead>
																					<tr>
																						<th>ID</th>
																						<th>Name</th>
																						<th>Address</th>
																						<th class="datatable-nosort">Action</th>
																					</tr>
																				</thead>
																				<tbody>
																					<?php
																						foreach($cashier as $emp){?>
																						<tr>
																								<td><?php echo $emp->Emp_id?></td>
																								<td><?php echo $emp->Emp_faName?>, <?php echo $emp->Emp_fName?> <?php echo $emp->Emp_mName?> </td>
																								<td><?php echo $emp->Emp_address?></td>
																								<td class = "text-center">
																									<div class="dropdown">
																										<a class="btn btn-outline-primary dropdown-toggle btn-sm" href="#" role="button" data-toggle="dropdown">
																											<i class="fa fa-ellipsis-h"></i>
																										</a>
																										<div class="dropdown-menu">
																											<br />
																											
																											<button onclick = "view_employee('<?php echo $emp->Emp_id?>','<?php echo $emp->Emp_fName?>','<?php echo $emp->Emp_mName?>','<?php echo $emp->Emp_faName?>','<?php echo $emp->Emp_username?>','<?php echo $emp->Emp_address?>','<?php echo $emp->Emp_contact?>','<?php echo $emp->Acc_type?>','<?php echo $emp->Emp_status?>')" class = "btn btn-secondary btn-sm" type="button" data-toggle="modal"  style = "margin-left: 15%; margin-bottom: 3%;">
																												<i class="fa fa-eye"></i> View
																											</button>
																											<br />
																											<button onclick = "update_employee('<?php echo $emp->Emp_no?>','<?php echo $emp->Emp_id?>','<?php echo $emp->Emp_fName?>','<?php echo $emp->Emp_mName?>','<?php echo $emp->Emp_faName?>','<?php echo $emp->Emp_id?>','<?php echo $emp->Emp_address?>','<?php echo $emp->Emp_contact?>','<?php echo $emp->Acc_type?>','<?php echo $emp->Emp_status?>','<?php echo $emp->Emp_id?>')" class = "btn btn-primary btn-sm" type="button" style = "margin-left: 15%;" data-toggle="modal">
																												<i class="fa fa-pencil"></i> Reset
																											</button>
																											<br />
																											<a class = "btn btn-danger btn-sm"  style = "margin-left: 15%; margin-top: 3%;" type = "button" href="<?php echo base_url('superAdmin/dashboard/inactive/'.$emp->Emp_no); ?>">
																												<i class = "fa fa-pencil"> Inactivate</i>
																											</a>
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
																	<div class="tab-pane fade" id="staff" role="tabpanel">
																		<div class="pd-20">
																			
																			<table class="data-table table-bordered stripe hover nowrap">
																				<thead>
																					<tr>
																						<th>ID</th>
																						<th>Name</th>
																						<th>Address</th>
																						<th class="datatable-nosort">Action</th>
																					</tr>
																				</thead>
																				<tbody>
																					<?php
																						foreach($staff as $emp){?>
																						<tr>
																								<td><?php echo $emp->Emp_id?></td>
																								<td><?php echo $emp->Emp_faName?>, <?php echo $emp->Emp_fName?> <?php echo $emp->Emp_mName?> </td>
																								<td><?php echo $emp->Emp_address?></td>
																								<td class = "text-center">
																									<div class="dropdown">
																										<a class="btn btn-outline-primary dropdown-toggle btn-sm" href="#" role="button" data-toggle="dropdown">
																											<i class="fa fa-ellipsis-h"></i>
																										</a>
																										<div class="dropdown-menu">
																											<br />
																											
																											<button onclick = "view_employee('<?php echo $emp->Emp_id?>','<?php echo $emp->Emp_fName?>','<?php echo $emp->Emp_mName?>','<?php echo $emp->Emp_faName?>','<?php echo $emp->Emp_username?>','<?php echo $emp->Emp_address?>','<?php echo $emp->Emp_contact?>','<?php echo $emp->Acc_type?>','<?php echo $emp->Emp_status?>')" class = "btn btn-secondary btn-sm" type="button" data-toggle="modal"  style = "margin-left: 15%; margin-bottom: 3%;">
																												<i class="fa fa-eye"></i> View
																											</button>
																											<br />
																											<button onclick = "update_employee('<?php echo $emp->Emp_no?>','<?php echo $emp->Emp_id?>','<?php echo $emp->Emp_fName?>','<?php echo $emp->Emp_mName?>','<?php echo $emp->Emp_faName?>','<?php echo $emp->Emp_id?>','<?php echo $emp->Emp_address?>','<?php echo $emp->Emp_contact?>','<?php echo $emp->Acc_type?>','<?php echo $emp->Emp_status?>','<?php echo $emp->Emp_id?>')" class = "btn btn-primary btn-sm" type="button" style = "margin-left: 15%;" data-toggle="modal">
																												<i class="fa fa-pencil"></i> Reset
																											</button>
																											<br />
																											<a class = "btn btn-danger btn-sm"  style = "margin-left: 15%; margin-top: 3%;" type = "button" href="<?php echo base_url('superAdmin/dashboard/inactive/'.$emp->Emp_no); ?>">
																												<i class = "fa fa-pencil"> Inactivate</i>
																											</a>
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
																	<div class="tab-pane fade" id="inactive" role="tabpanel">
																		<div class="pd-20">
																			
																			<table class="data-table table-bordered stripe hover nowrap">
																				<thead>
																					<tr>
																						<th>ID</th>
																						<th>Name</th>
																						<th>Address</th>
																						<th class="datatable-nosort">Action</th>
																					</tr>
																				</thead>
																				<tbody>
																					<?php
																						foreach($inactive as $i){?>
																							<tr>
																								<td><?php echo $i->Emp_id?></td>
																								<td><?php echo $i->Emp_faName?>, <?php echo $i->Emp_fName?> <?php echo $i->Emp_mName?> </td>
																								<td><?php echo $i->Emp_address?></td>
																								<td class = "text-center">

																									<a class = "btn btn-primary btn-sm" type = "button" href="<?php echo base_url('superAdmin/dashboard/active/'.$i->Emp_no); ?>">
																										<i class = "fa fa-pencil"> Activate</i>
																									</a>

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

														<div class="row">
															<div class="col-lg-5 col-md-12 col-sm-12 mb-30">
																<div class="bg-white pd-30 box-shadow border-radius-5 xs-pd-20-10 height-100-p">
																	<h5>Per Cubic Meter</h5>
																	<button class= "btn btn-primary btn-sm" data-toggle="modal" data-target="#cubic" style = "margin-left: 2%;">
																		<i class = "fa fa-pencil"> Update</i>
																	</button>
																	<br />
																	<br />
																	<table class="table table-striped hover nowrap">
																		<thead>
																			<tr>
																				<th>Per Cubic Meter</th>
																				<th>Date Update</th>
																			</tr>
																		</thead>
																		<tbody>
																			<?php
																				foreach($cubic as $c){?>
																				<tr>
																					<td style = "color: black"><?php echo $c->Cubic_meter?></td>
																					<td style = "color: black"><?php echo $c->Date_updated?></td>
																				</tr>
																			<?php }?>
																		</tbody>
																	</table>
																</div>
															</div>
															<div class="col-lg-7 col-md-12 col-sm-12 mb-30">
																<div class="bg-white pd-30 box-shadow border-radius-5 xs-pd-20-10 height-100-p">
																	<h5>Fee For Connection</h5>
																	<button class= "btn btn-primary btn-sm" data-toggle="modal" data-target="#fee" style = "margin-left: 2%;">
																		<i class = "fa fa-pencil"> Update Fees</i>
																	</button>
																	<br />
																	<br />
																	<table class="table table-striped hover nowrap">
																		<thead>
																			<tr>
																				<th>Connection Fee</th>
																				<th>Reconnection Fee</th>
																				<th>Membership Fee</th>
																				<th>Date Update</th>
																			</tr>
																		</thead>
																		<tbody>
																			<?php
																				foreach($fee as $f){?>
																				<tr>
																					<td style = "color: black"><?php echo $f->Connection_fee?></td>
																					<td style = "color: black"><?php echo $f->Reconnection_fee?></td>
																					<td style = "color: black"><?php echo $f->Membership_fee?></td>
																					<td style = "color: black"><?php echo $f->Date_updated?></td>
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
										</li>
									</ul>
								</div>
							</div>										
						</div>
					</div>

			</div>
		</div>
	</div>
</div>
<?php $this->load->view('modal/superAdmin/add_employee');?>	
<?php $this->load->view('modal/message');?>	
<?php $this->load->view('modal/superAdmin/add_cubic');?>	
<?php $this->load->view('modal/superAdmin/add_fee');?>	
<?php $this->load->view('modal/superAdmin/view_employee');?>	
<?php $this->load->view('modal/superAdmin/update_employee');?>
<?php $this->load->view('modal/logout');?>	
