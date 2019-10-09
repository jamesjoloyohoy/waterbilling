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
											<button class = "btn btn-dark btn-sm" type = "button" style = "margin-left: 8%; margin-bottom: 3%;">
												<a href="<?php echo base_url('cashier/dashboard')?>">
													<i class = "fa fa-dashboard" style = "color: white"> Dashboard</i>
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
                                                                <div class="tab">
                                                                    <ul class="nav nav-tabs customtab" role="tablist">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" data-toggle="tab" href="#notpaid" role="tab" aria-selected="true">Not Paid</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" data-toggle="tab" href="#paid" role="tab" aria-selected="false">Paid</a>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="tab-content">
                                                                        <div class="tab-pane fade" id="notpaid" role="tabpanel">
                                                                            <div class="pd-20">
                                                                                
                                                                                <table class="data-table table-bordered stripe hover nowrap">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th class="table-plus datatable-nosort">No.</th>
                                                                                            <th>Meter No.</th>
                                                                                            <th>Consumer Name</th>
                                                                                            <th>Address</th>
                                                                                            <th>Meter Used</th>
                                                                                            <th>Amount</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <?php
                                                                                            $i = 1;
                                                                                            foreach ($toCompare as $key) {
                                                                                                foreach($notPaid as $cons) { 
                                                                                                    if ($key['Mtr_id'] === $cons['Mtr_id']) {
                                                                                                        if ($key['Read_no'] < $cons['max_Read_no']) { ?>
                                                                                                            <tr>
                                                                                                                <td><?php echo 
                                                                                                                    $i;
                                                                                                                    $i++
                                                                                                                ?></td>
                                                                                                                <td><?php echo $cons['Mtr_id']?></td>
                                                                                                                <td><?php echo $cons['Cons_fName']?> <?php echo $cons['Cons_mName']?> <?php echo $cons['Cons_faName']?></td>
                                                                                                                <td><?php echo $cons['Cons_address']?></td>
                                                                                                                <td><?php echo $cons['Read_currBill']?></td>
                                                                                                                <td><?php echo $cons['Rate_totalUsage']?></td>
                                                                                                            </tr>
                                                                                                        <?php }
                                                                                                    }
                                                                                                }
                                                                                            } ?>
                                                                                            <?php foreach ($noTrans as $nt) { 
                                                                                                if ($nt['Trans_no'] === null) { ?>
                                                                                                <tr>
                                                                                                    <td><?php echo 
                                                                                                        $i;
                                                                                                        $i++
                                                                                                    ?></td>
                                                                                                    <td><?php echo $nt['Mtr_id']?></td>
                                                                                                    <td><?php echo $nt['Cons_fName']?> <?php echo $nt['Cons_mName']?> <?php echo $nt['Cons_faName']?></td>
                                                                                                    <td><?php echo $nt['Cons_address']?></td>
                                                                                                    <td><?php echo $nt['Read_currBill']?></td>
                                                                                                    <td><?php echo $nt['Rate_totalUsage']?></td>
                                                                                                </tr>
                                                                                            <?php } } ?>
                                                                                    </tbody>
                                                                                </table>

                                                                            </div>
                                                                        </div>
                                                                        <div class="tab-pane fade" id="paid" role="tabpanel">
                                                                            <div class="pd-20">

                                                                                <table class="data-table table-bordered stripe hover nowrap">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th class="table-plus datatable-nosort">No.</th>
                                                                                            <th>Date</th>
                                                                                            <th>Meter no.</th>
                                                                                            <th>Consumer Name</th>
                                                                                            <th>Cashier Name</th>
                                                                                            <th>Meter Used</th>
                                                                                            <th>Amount</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <?php
                                                                                            $i = 1;
                                                                                            foreach($Paid as $p){?>
                                                                                            <tr>
                                                                                                <td><?php echo 
                                                                                                    $i;
                                                                                                    $i++
                                                                                                ?></td>
                                                                                                <td><?php echo date('F d Y',strtotime($p['Trans_date']))?></td>
                                                                                                <td><?php echo $p['Mtr_id']?></td>
                                                                                                <td><?php echo $p['Cons_fName']?> <?php echo $p['Cons_mName']?> <?php echo $p['Cons_faName']?></td>
                                                                                                <td><?php echo $p['Emp_fName']?> <?php echo $p['Emp_mName']?> <?php echo $p['Emp_faName']?></td>                                                                                               
                                                                                                <td><?php echo $p['Trans_amount']/$p['Cubic_meter']?></td>
                                                                                                <td class = "text-right">₱<?php echo $p['Trans_amount']?></td>
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
