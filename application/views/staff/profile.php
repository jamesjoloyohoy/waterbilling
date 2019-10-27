<style>
    #submit_profile{
        display:none;
    }
</style>
<div class="container" >
	<div class="pd-ltr-20 height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-12 col-sm-6">
						<div class="title">
							<div class="form-group row">
							   <button class = "btn btn-dark btn-sm">
                                    <a href="<?php echo base_url('staff/dashboard')?>">
                                        <i class = "fa fa-sign-out" style = "color: white"> Back</i>
                                    </a>
                               </button>
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
													
													<div class="col-lg-12 col-md-12 col-sm-12 mb-30" >
                                                        <div class="pd-20 bg-white border-radius-4 box-shadow">
                                                        
                                                        <form id = "updateprofile" method = "POST">
                                                            <div class="form-group row">
                                                                <label class="col-sm-12 col-md-3 col-form-label">First Name</label>
                                                                    <div class="col-sm-12 col-md-8">
                                                                        <input class="form-control" name = "no" type="hidden" value = "<?php echo $this->session->userdata('Emp_no');?>">
                                                                        <input class="form-control" name = "uid" type="hidden" value = "<?php echo $this->session->userdata('Emp_id');?>">
                                                                        <input class="form-control" id="fname" name = "ufName" type="text" readonly = "" value = "<?php echo $this->session->userdata('Emp_fName');?>" style = "background-color: white" autocomplete = "off" required = "">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-12 col-md-3 col-form-label">M.I</label>
                                                                    <div class="col-sm-12 col-md-8">
                                                                        <input class="form-control" id="mname" name = "umName" type="text" readonly = ""  value = "<?php echo $this->session->userdata('Emp_mName');?>" style = "background-color: white" autocomplete = "off" required = "">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group row">
                                                                    <label class="col-sm-12 col-md-3 col-form-label">Surname</label>
                                                                    <div class="col-sm-12 col-md-8">
                                                                        <input class="form-control" id="faname" type="text" name = "ufaName" readonly = ""  value = "<?php echo $this->session->userdata('Emp_faName');?>" style = "background-color: white" autocomplete = "off" required = "">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-12 col-md-3 col-form-label">User Name</label>
                                                                    <div class="col-sm-12 col-md-8">
                                                                        <input class="form-control" id="username" type="text" name = "uusername" readonly = ""  value = "<?php echo $this->session->userdata('Emp_username');?>" style = "background-color: white" autocomplete = "off" required = "" >
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-12 col-md-3 col-form-label">Address</label>
                                                                    <div class="col-sm-12 col-md-8">
                                                                        <input class="form-control" id="address" type="text" readonly = "" name = "uaddress" value = "<?php echo $this->session->userdata('Emp_address');?>" style = "background-color: white" autocomplete = "off" required = "">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="col-sm-12 col-md-3 col-form-label">Contact #.</label>
                                                                    <div class="col-sm-12 col-md-8">
                                                                        <input class="form-control" id="contact" type="number" readonly = "" name = "ucontact" value = "<?php echo $this->session->userdata('Emp_contact');?>" style = "background-color: white" autocomplete = "off" required = "">
                                                                    </div>
                                                                </div>
                                                        
                                                                <input class="form-control" type="hidden" name = "uacc_type" value = "<?php echo $this->session->userdata('Acc_type');?>">
                                                                <input class="form-control" type="hidden" name = "ustatus" value = "<?php echo $this->session->userdata('Emp_status');?>">
                                                                
                                                                <div class="form-group row">
                                                                    <label class="col-sm-12 col-md-3 col-form-label">Password</label>
                                                                    <div class="col-sm-12 col-md-8">
                                                                        <input class="form-control" id="password" type="text" name = "upassword" readonly = "" value = "<?php echo $this->session->userdata('Emp_password');?>" style = "background-color: white" autocomplete = "off" required = "">
                                                                    </div>
                                                                </div>
                                                                <button class = "btn btn-primary btn-sm" type = "button" id="update_profile" style = "margin-left: 84%;"> 
                                                                        <i class = "fa fa-pencil"> Update </i>
                                                                    </button>

                                                                    <button class = "btn btn-secondary btn-sm" type = "submit" id="submit_profile" style = "margin-left: 84%;"> Save</button>
                                                                </div>
                                                                
                                                            </form>

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
<?php $this->load->view('modal/message');?>

