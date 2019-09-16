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
                <br />
				<div class="blog-wrap">
					<div class="container pd-0">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                        <ul>
                                            <li>
                                                <div class="row no-gutters">
                                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                                        <div class="blog-caption">
                                                        
                                                            
                                                            <div class="col-lg-12 col-md-12 col-sm-12 mb-30">
                                                                <div class="pd-20 bg-white border-radius-4 box-shadow">
                                                                    <table class="data-table table-bordered stripe hover nowrap">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>No.</th>
                                                                                <th>Meter No.</th>
                                                                                <th>Name</th>
                                                                                <th>Address</th>
                                                                                <th class="datatable-nosort">Action</th>
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
                                                                                    <td class = "text-center">
                                                                                        <button class = "btn btn-sm btn-primary"> 
                                                                                            <i class = "fa fa-check"> Select</i>
                                                                                        </button>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php } foreach($noRead_consumer as $nrc){?>
                                                                                <tr>
                                                                                    <td><?php echo 
                                                                                        $i;
                                                                                        $i++
                                                                                    ?></td>
                                                                                    <td><?php echo $nrc->Mtr_id?></td>
                                                                                    <td><?php echo $nrc->Cons_fName?> <?php echo $nrc->Cons_mName?> <?php echo $nrc->Cons_faName?></td>
                                                                                    <td><?php echo $nrc->Cons_address?></td>
                                                                                    <td class = "text-center">
                                                                                        <button class = "btn btn-sm btn-primary"> 
                                                                                            <i class = "fa fa-check"> Select</i>
                                                                                        </button>
                                                                                    </td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                        </tbody>
                                                                    </table>
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
</div>
<?php $this->load->view('modal/logout');?>	
