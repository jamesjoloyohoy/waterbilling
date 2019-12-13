<!DOCTYPE html>
<html>
<head>
	<title>WaterBilling</title>

	<link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/styles/style.css">

</head>
<body>
	<br />
	<br />
		<button type = "button" class = "btn btn-md pull-right" style = "background-color:  #fe2101; margin-right: 5%;">
			<a href="<?php echo base_url('consumer/dashboard')?>">
				<i class="fa fa-sign-in" aria-hidden="true" style = "color: white;"> Consumer</i>
			</a>
		</button>

	<img src="<?php echo base_url()?>assets/vendors/images/8.jpg" alt="" class="bg_img">
		<div class="pd-10">
			<div class="login-box bg-white box-shadow pd-30 border-radius-5" style = "margin-top: 7%; box-shadow: 0 0 20px 5px #000;" >
				<img src="<?php echo base_url()?>assets/vendors/images/8.jpg" alt="" class="bg_img" style>
					<h2 class="text-center mb-30" style = "text-shadow: 2px 2px 2px black, 2px 2px 25px blue, 0 0 5px darkblue; color: white; font-family: Times New Roman, Times, serif;font-size: 40px;">Sign In</h2>
					
					
					<?php echo form_open("Login/check_login"); ?>
						<div class="input-group custom input-group-lg">
							<input type="text" class="form-control" placeholder="Username" name="Emp_username" autocomplete = "off" required = "">
							<div class="input-group-append custom">
								<span class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></span>
							</div>
						</div>
						<div class="input-group custom input-group-lg">
							<input type="password" class="form-control" placeholder="**********" name="Emp_password" autocomplete = "off" required = "">
							<div class="input-group-append custom">
								<span class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></span>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="input-group">
									<button class="btn btn-lg btn-block" type="submit" style = "background-color: #00ccff">
										<i class="fa fa-sign-in" aria-hidden="true"> Login</i>
									</button>

									
								</div>
							</div>
						</div>
						<?php echo form_close(); ?>
						
				</div>
			</div> 
		</div>
	</div>
	<script src="<?php echo base_url()?>assets/vendors/scripts/script.js"></script>
</body>
</html>