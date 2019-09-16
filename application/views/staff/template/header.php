	<div class="pre-loader"></div>
	<div class="header clearfix">
		<div class="header-right">
			<div class="brand-logo">
				<a href="<?php echo base_url('staff/dashboard')?>">
					<img src="http://localhost/WaterBilling/assets/vendors/images/mww.png" alt="" class="bg_img" style="display: none; width: 100%">
				</a>
			</div>
			<div class="menu-icon">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</div>
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon"><i class="fa fa-user-o"></i></span>
						<span class="user-name"><?php echo $this->session->userdata('Emp_fName');?> <?php echo $this->session->userdata('Emp_mName');?>. <?php echo $this->session->userdata('Emp_faName');?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a class="dropdown-item" href="<?php echo base_url('staff/profile')?>"><i class="fa fa-user" aria-hidden="true"></i> Profile</a>
						<a class="dropdown-item" href="#" data-toggle="modal" data-target="#confirmation-modal"><i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php $this->load->view('modal/logout');?>