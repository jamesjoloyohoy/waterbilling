<div class="container" >
	<div class="pd-ltr-20 height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
            <button class = "btn btn-secondary btn-sm">
                <a href="<?php echo base_url('login')?>">
                    <i class="fa fa-sign-out" aria-hidden="true" style = "color: white"> Back</i> 
                <a>
            </button>
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
                                                            
                                                                <h5 style ="margin-left: 18%;">Search Consumer name</h5>

                                                                <form class="row" action = "<?php echo base_url('consumer/history/searchConsumer');?>" method = "POST">
                                                                    <div class="form-group row" style = "margin-left: 17%;">
                                                                        <label class="col-sm-12 col-md-10 col-form-label">
                                                                            <input class="form-control" type="search" placeholder = "Enter Full Name" name = "search_fullname" autocomplete = "off" required>
                                                                        </label>
                                                                        <div class="col-sm-12 col-md-2">
                                                                            <button class = "btn btn-dark btn-sm" type = "submit" style = "margin-top: 45%;">
                                                                                <i class = "fa fa-check"> Select</i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </form>
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
<?php $this->load->view('modal/alert');?>
