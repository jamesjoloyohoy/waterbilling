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
                                                                            <h5 class="weight-550 mb-25"><?php echo $name['Cons_name'];?></h5>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-sm-12">
                                                                        <div class="form-group">
                                                                            <h6 class="weight-500">Address</h6>
                                                                            <h5 class="weight-550 mb-25"><?php echo $name['Cons_address']; ?></h5>
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
                                                                                
                                                                                <table class="table table-bordered" style = "width: 84%; margin: auto">
                                                                                    <thead>
                                                                                        <tr>
                                                                                            <th style = "width: 30%;" class = "text-center">Months Delinquent</th>
                                                                                            <th style = "width: 30%;" class = "text-center">Per Cubic Meter</th>
                                                                                            <th style = "width: 20%;" class = "text-center">Water Bill</th>
                                                                                            <th style = "width: 20%;" class = "text-center">Amount</th>
                                                                                        </tr>
                                                                                    </thead>
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <?php 
                                                                                                $Rate_totalUsage = 0;
                                                                                                $Read_totalBill = 0;
                                                                                                foreach($balance as $h) {
                                                                                                $perCubicMtr = $h['bill_currUsage']/$h['bill_meterUsed'];
                                                                                                $Rate_totalUsage += $h['bill_meterUsed'];
                                                                                                $Read_totalBill += $h['bill_currUsage'];
                                                                                            ?>
                                                                                                    <tr>
                                                                                                        <td class = "text-center"><?php echo $h['read_startDate'].' - '.$h['read_endDate']?></td>
                                                                                                        <td class = "text-center"><?=$perCubicMtr; ?></td>                                                                                       
                                                                                                        <td class = "text-center"><?php echo $h['bill_meterUsed']?></td>
                                                                                                        <td class = "text-right">₱<?php echo number_format($h['bill_currUsage'],2)?></td>
                                                                                                    </tr>
                                                                                                <?php }
                                                                                            ?>
                                                                                          
                                                                                        </tr>
                                                                                    </tbody>
                                                                                    <tfoot>
                                                                                        <?php if($Rate_totalUsage != 0) {?>
                                                                                                <td colspan = "2" style = "text-align: right">Total</td>
                                                                                                <td style = "text-align: center"><?= number_format($Rate_totalUsage, -2); ?></td>
                                                                                                <td style = "text-align: right">₱<?= number_format($Read_totalBill, 2); ?></td>
                                                                                            <?php }
                                                                                                else { ?>
                                                                                                    <td colspan = "4" style = "text-align: center; background-color: #cce6ff">"You have no balance"</td>
                                                                                            <?php } ?>
                                                                                    </tfoot>
                                                                                </table>

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
                                                                                            foreach($Paid as $p){?>
                                                                                            <tr>
                                                                                                <td><?php echo 
                                                                                                    $i;
                                                                                                    $i++
                                                                                                ?></td>
                                                                                                <td><?php echo date('F d Y',strtotime($p['Trans_date']))?></td>
                                                                                                <td><?php echo $p['Emp_name']?></td>                                                                                               
                                                                                                <td class = "text-center"><?php echo $p['bill_meterUsed']?></td>
                                                                                                <td class = "text-right">₱<?php echo number_format($p['bill_currUsage'], 2)?></td>
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
