<div class="container" >
	<div class="pd-ltr-20 height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-12 col-sm-6">
						<div class="title">
							<div class="form-group row">
							<h4 class="user-name text-blue"><?php echo $this->session->userdata('Emp_fName');?> <?php echo $this->session->userdata('Emp_mName');?> <?php echo $this->session->userdata('Emp_faName');?></h4>
								<div class="col-sm-12 col-md-6">
									<button class= "btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmation-modal" style = "margin-left: 2%;">
										<i class = "fa fa-sign-out"> Logout</i>
									</button>
								</div>
							</div>
							<div class="dropdown">
								<a class="btn btn-outline-primary btn-sm dropdown-toggle" href="#" role="button" data-toggle="dropdown">
									<i class="fa fa-ellipsis-h"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-left">
									<a class="dropdown-item" href="<?php echo base_url('staff/dashboard')?>"><i class="fa fa-dashboard"></i> Dashboard 1</a>
									<a class="dropdown-item" href="<?php echo base_url('staff/dashboard1')?>"><i class="fa fa-dashboard"></i> Dashboard 2</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="blog-wrap">
					<div class="container pd-0">
						<div class="row">
							<div class="col-md-12 col-sm-12">
									<ul>
										<li>
											<div class="row no-gutters">
												<div class="col-lg-12 col-md-12 col-sm-12">
													<div class="blog-caption">
													
														<br />
														<br />
														<br />
														<br />
														<br />
														<br />
														<br />
														<div class="row">
															<div class="bg-white pd-30 box-shadow border-radius-5 xs-pd-20-10 height-100-p" style = "width: 50%; margin: auto">
																	<div class="col-md-6 col-sm-12" style = "margin-left: 25%;">
																		<div class="form-group">
																			
																			<div class="form-group row">
																			<h5>Search Meter No.</h5>
																				<?php date_default_timezone_set('Asia/Manila');
																					echo form_open('staff/add_reading'); ?>
																					<div class="form-group row">
																						<label class="col-sm-12 col-md-7 col-form-label">
																							<input class="form-control" type="number" name = "Mtr_id" min = "0" autocomplete = "off">
																						</label>
																						<div class="col-sm-12 col-md-2">
																							<button class = "btn btn-dark btn-sm" style = "margin-top: 70%;" type = "button" onclick="getMonth(<?php echo date('d'); ?>);">
																								<i class="fa fa-check" style = "color: white"> Select </i>
																							</button>
																							<button type="submit" id="select" hidden></button>
																						</div>
																					</div>
																				<?php echo form_close(); ?>
																			</div>
																		</div>
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
<?php $this->load->view('modal/logout');?>	
<?php $this->load->view('modal/alert');?>	
