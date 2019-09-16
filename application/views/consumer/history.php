<div class="container" >
	<div class="pd-ltr-20 height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
            <button class = "btn btn-danger btn-sm">
                <a href="<?php echo base_url('consumer/dashboard')?>">
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
														<div class="row">
															<div class="bg-white pd-30 box-shadow border-radius-5 xs-pd-20-10 height-100-p" style = "width: 100%; margin: auto">   
                                                                <div class="row">
                                                                    <div class="col-md-6 col-sm-12">
                                                                        <div class="form-group">
                                                                            <h6 class="weight-500">Consumer name</h6>
                                                                            <h5 class="weight-550 mb-25"><?php echo $name['Cons_fName'].' '.$name['Cons_mName'].' '.$name['Cons_faName']?></h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12">
                                                                        <div class="form-group">
                                                                            <h6 class="weight-500">Address</h6>
                                                                            <h5 class="weight-550 mb-25"><?php echo $name['Cons_zone'].' '.$name['Cons_barangay'].' '.$name['Cons_province']?></h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <h6 class="weight-500">Meter No.</h6>
                                                                <h5 class="weight-550 mb-25"><?php echo $name['Mtr_id']?></h5>
                                                                        
                                                                <div class="tab">
                                                                    <ul class="nav nav-tabs customtab" role="tablist">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link " data-toggle="tab" href="" role="tab" aria-selected="false"></a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link " data-toggle="tab" href="#balance" role="tab" aria-selected="false">Balance</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" data-toggle="tab" href="#history" role="tab" aria-selected="false">History</a>
                                                                        </li>
                                                                    </ul>
                                                                    <div class="tab-content">
                                                                        <div class="tab-pane fade" id="balance" role="tabpanel">
                                                                            <div class="pd-20">
                                                                                <h1>Sample</h1>
                                                                            </div>
                                                                        </div>
                                                                        <div class="tab-pane fade" id="history" role="tabpanel">
                                                                            <div class="pd-20">
                                                                            
                                                                                <table class="data-table table-bordered stripe hover nowrap">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th class="table-plus datatable-nosort">No.</th>
                                                                                            <th>Date</th>
                                                                                            <th>Employee Name</th>
                                                                                            <th>Meter Used</th>
                                                                                            <th>Amount</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <?php
                                                                                            $i = 1;
                                                                                            foreach($history as $h){?>
                                                                                           <tr>
                                                                                                <td><?php echo 
                                                                                                    $i;
                                                                                                    $i++
                                                                                                ?></td>
                                                                                                <td><?php echo date('F d Y',strtotime($h['Trans_date']))?></td>
                                                                                                <td ><?php echo $h['Emp_fName'].' '.$h['Emp_mName'].' '.$h['Cons_faName']?></td>
                                                                                                <td><?php echo $h['Trans_amount']/$h['Cubic_meter']?></td>
                                                                                                <td class = "text-right">₱<?php echo $h['Trans_amount']?></td>
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
