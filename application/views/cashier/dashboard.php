<div class="container" >
	<div class="pd-ltr-20 height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-12 col-sm-6">
						<div class="title">
							<div class="form-group row">
							<h4 class="user-name text-blue"><?php echo $this->session->userdata('Emp_fName');?> <?php echo $this->session->userdata('Emp_mName');?> <?php echo $this->session->userdata('Emp_faName');?></h4>
								<div class="dropdown" style = "margin-left: 3%;">
									<a class="btn btn-outline-primary btn-sm dropdown-toggle" href="#" role="button" data-toggle="dropdown">
										<i class="fa fa-ellipsis-h"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-left">
										<br/>
										<div class = "text-center">
											<button class = "btn btn-primary btn-sm" type = "button" style = "margin-left: -9%; margin-bottom: 3%;">
                                                <a href = "<?php echo base_url('cashier/profile');?>">
                                                    <i class = "fa fa-user" style = "color: white"> Profile</i>
                                                </a>
                                            </button>
											<br />
											<button class = "btn btn-dark btn-sm" type = "button" style = "margin-left: -9%; margin-bottom: 3%;">
												<a href="<?php echo base_url('cashier/report')?>">
													<i class = "fa fa-pencil" style = "color: white"> Report</i>
												</a>
											</button>
											<br />
											<button class= "btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmation-modal" style = "margin-left: -6%;">
												<i class = "fa fa-sign-out"> Logout</i>
											</button>
										</div>
										<br/>
									</div>
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
														<div class="row">
															<div class="bg-white pd-30 box-shadow border-radius-5 xs-pd-20-10 height-100-p" style = "width: 50%; margin: auto">
																	<div class="col-md-6 col-sm-12" style = "margin-left: 25%;">
																		<div class="form-group">
																			<h5 style = "margin-left: -6%;">Search Meter No.</h5>
																			<div class="form-group row">
																				
																				<?php echo form_open('cashier/receipt') ?>

																					<div class="form-group row">
																						<label class="col-sm-12 col-md-7 col-form-label">
																							<input class="form-control" type="number" required = "" name = "Mtr_id" min = "0" autocomplete = "off">
																						</label>
																						<div class="col-sm-12 col-md-2">
																							<button class = "btn btn-dark btn-sm" type = "submit" style = "margin-top: 70%;">
																								<i class="fa fa-check"> Select </i>
																							</button>
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
