	<div class="pre-loader"></div>
	<div class="header clearfix">
		<div class="header-right" style = "width: 100%; background-color: #33ccff">

			<div class="form-group row">
				<label class="col-sm-12 col-md-3 col-form-label"><h4 style = "text-align: center; margin-top: 5%;"><?php echo $this->session->userdata('Emp_fName');?> <?php echo $this->session->userdata('Emp_mName');?> <?php echo $this->session->userdata('Emp_faName');?></h4></label>
				<div class="col-sm-12 col-md-9" style = "margin-top: 2%;">
					<div class="dropdown">
						<a class="btn btn-outline-primary btn-sm dropdown-toggle" href="#" role="button" data-toggle="dropdown" style = "background-color: white">
							<i class="fa fa-ellipsis-h"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-left">
							<br/>
							<div class = "text-center">
								<button class= "btn btn-dark btn-sm" type = "button" style = "margin-left: 2%; margin-bottom: 5%;">
									<a href="<?php echo base_url('superAdmin/dashboard')?>">
										<i class = "fa fa-dashboard" style = "color: white"> Dashboard</i>
									</a>
								</button>
								<br />

								<button class= "btn btn-primary btn-sm" type = "button" style = "margin-left: 2%; margin-bottom: 5%;">
									<a href="<?php echo base_url('superAdmin/profile')?>">
										<i class = "fa fa-user" style = "color: white"> Profile</i>
									</a>
								</button>

								<button class= "btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmation-modal" style = "margin-left: 2%;">
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

<?php $this->load->view('modal/logout');?>