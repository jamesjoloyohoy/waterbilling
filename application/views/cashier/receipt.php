<style>
    
    @media print
    {
        input#btnprint
        {
            display: none;
        }

        input#cancel
        {
            display: none;
        }
    }

</style>
<?php 
	$cubic_meter=0;
	$amount=0;
?>
<div class="container" >
	<div class="pd-ltr-20 height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="blog-wrap">
					<div class="container pd-0" >
						<div class="row" >
							<div class="col-md-12 col-sm-12" style = "background-color: white">
									<ul>
										<li>
											<div class="row no-gutters" >
												<div class="col-lg-12 col-md-12 col-sm-12" >
													<div class="blog-caption">
													<form class="form form-horizontal" id = "transaction" method = "POST">
														<table style = "border: 1px solid black; width: 70%; margin-left: 15%; margin-top: 2%; margin-bottom: 2%;">
															<thead >
																<tr>
																	<td style = "width: 60%;"><h3 class = "text-center"  style = "margin-top: 5%;">Manticao Water Works</h3></td>
																	<td style = "width: 40%;"></td>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td><h5 class = "text-center">Manticao, Misamis Oriental</h5></td>
																	<td></td>
																</tr>
																<tr>
																	<td>	
																		<div class="invoice-desc pb-30" style = "width: 80%; margin-left: 3%; margin: auto">
																			<div class="invoice-desc-footer">
																				<div class="invoice-desc-body">
																					<ul>
																						<!-- <li class="clearfix" style = "border: 1px solid black">
																							<div class="invoice-sub" >
																								<h6>Previous Bill: </h6>
																							</div> -->
																							<div class="invoice-subtotal">
																								<!-- <h6><?php echo $max['Trans_amount']??0?></h6> -->
																								<?php foreach ($record as $r) { 
																									$cubic_meter += $r['bill_meterUsed'];
																									$amount += $r['bill_currUsage'];
																								?>
																								<?php } ?>
																								
																								<?php foreach ($record as $r) { ?>
																									<input value = "<?php echo $r['bill_no']; ?>" type = "hidden" name = "bill_no[]">
																								<?php } ?>
																							</div>
																						<!-- </li> -->
																					</ul>
																				</div>
																			</div>
																		</div>
																	</td>
																	<td>
																		<h2 class = "text-center" style = "width: 90%; margin-left: 5%; background-color: black; color: white; padding: 10px;">WATER BILL</h2>
																	</td>
																</tr>

																<tr>
																	<td>	
																		<div class="invoice-desc pb-30" style = "width: 80%; margin-left: 10%; margin-top: -8%">
																			<div class="invoice-desc-footer">
																				<div class="invoice-desc-body">
																					<ul>
																					<div class="invoice-desc-head clearfix">
																						<div class="invoice-sub">Month</div>
																						<div class="invoice-rate" style = "width: 40%;">Cubic Meter</div>
																						<div class="invoice-subtotal">Amount</div>
																					</div>
																						<li class="clearfix" style = "border: 1px solid black">
																							<div class="invoice-sub">
																								<?php foreach ($record as $r) { ?>
																									<h6><?php echo date('M',strtotime($r['read_startDate'])).' - '.date('M',strtotime($r['read_endDate']))?></h6>
																								<?php } ?>
																							</div>
																							<div class="invoice-rate" style = "text-align: right">
																								<?php foreach ($record as $r) { ?>
																									<h6><?php echo $r['bill_meterUsed']?></h6>
																								<?php } ?>
																							</div>
																							<div class="invoice-subtotal" style = "text-align: right">
																								<?php foreach ($record as $r) { ?>
																									<h6><?php echo $r['bill_currUsage']; ?></h6>
																								<?php } ?>
																							</div>
																						</li>
																					</ul>
																				</div>
																			</div>
																		</div>
																	</td>
																	<td>
																		<div class="invoice-desc pb-30" style = "border: 1px solid black; width: 90%; margin: auto">
																			<div class="invoice-desc-footer">
																				<ul>
																					<li class="clearfix">
																						<div class="invoice-sub" style = "width: 60%;">
																							<h6 class = "text-center" style = "margin-top: 10%;">Date</h6>
																							<input value = "<?php echo date('F d Y')?>" style = "border: 1px solid white; text-align: center; width: 100%;" readonly = "">
																						</div>
																						<div class="invoice-subtotal" style = "width: 40%;">
																							<h6 class = "text-center" style = "margin-top: 16%;">Meter #</h6>
																							<input value = "<?php echo $consumerInfo['Mtr_id']?>" style = "border: 1px solid white; text-align: center; width: 100%;" readonly = "">
																						</div>
																					</li>
																				</ul>
																			</div>
																		</div>
																	</td>
																</tr>

																<tr>
																	<td>	
																		<div class="invoice-desc pb-30" style = "width: 80%; margin-left: 10%;">
																			<div class="invoice-desc-footer">
																				<div class="invoice-desc-body">
																					<ul>
																						<li class="clearfix" style = "margin-top: -10%; border-bottom: 1px solid white">
																							<div class="invoice-sub">
																								<h6>Total</h6>
																							</div>
																							<div class="invoice-rate" style = "text-align: right">
																								<h6><?php echo $cubic_meter; ?></h6>
																							</div>
																							<div class="invoice-subtotal" style = "text-align: right">
																								<input readonly = "" id = "total" value = "<?php echo $amount?>" style = "width: 150%; border: 1px solid white">
																							</div>
																						</li>
																					</ul>
																				</div>
																			</div>
																		</div>
																	</td>
																	<td class = "text-center">
																		<h6><strong>Amount Due</strong></h6>
																		<h5><strong><?php echo number_format($amount, 2)?></strong></h5>
																	</td>
																</tr>

																<tr>
																	<td>	
																		<div class="invoice-desc pb-30" style = "width: 80%; margin-left: 10%;">
																			<div class="invoice-desc-footer">
																				<div class="invoice-desc-body">
																					<ul>
																						<li class="clearfix" style = "margin-top: -25%; border-bottom: 1px solid black">
																							<div class="invoice-sub">
																								<h6>Cash</h6>
																							</div>
																							<div class="invoice-rate">
																								<h6></h6>
																							</div>
																							<div class="invoice-subtotal" style = "margin-right: 5.5%;">
																								<input style = "width: 200%; text-align: center; border: 1px solid white; background-color: #f2f2f2;" onchange="press()" type = "number" min = "0" id = "cash" required = "">
																								<input value = "<?php echo $amount?>" type = "hidden" name = "amount">
																							</div>
																						</li>
																					</ul>
																				</div>
																			</div>
																		</div>
																	</td>
																	<td>
																		<h5><strong><?php echo $consumerInfo['Cons_fName'].' '.$consumerInfo['Cons_mName'].' '.$consumerInfo['Cons_faName']?></strong></h5>
																		<h6 style = "font-size: 12px;"><strong><?php echo $consumerInfo['Cons_zone'].' '.$consumerInfo['Cons_barangay'].' '.$consumerInfo['Cons_province']?></strong></h6>
																	</td>
																</tr>

																<tr>
																	<td>	
																		<div class="invoice-desc pb-30" style = "width: 80%; margin-left: 10%;">
																			<div class="invoice-desc-footer">
																				<div class="invoice-desc-body">
																					<ul>
																						<li class="clearfix" style = "margin-top: -33%; border-bottom: 1px solid white">
																							<div class="invoice-sub">
																								<h6>Change</h6>
																							</div>
																							<div class="invoice-rate">
																								<h6></h6>
																							</div>
																							<div class="invoice-subtotal">
																								<input style = "width: 140%; border: 1px solid white" readonly = "" id = "changes">
																							</div>
																						</li>
																					</ul>
																				</div>
																			</div>
																		</div>
																	</td>
																	<td><h1 style = "margin-top: -100%;"></h1></td>
																</tr>
																<tr>
																	<td>	
																		<input type = "hidden" name = "emp_no" class = "form-control" value = "<?php echo $this->session->userdata('Emp_no');?>">
																		<input class = "form-control" value = "<?php echo $this->session->userdata('Emp_fName');?> <?php echo $this->session->userdata('Emp_mName');?> <?php echo $this->session->userdata('Emp_faName');?>" style = "text-align: center; width: 50%; margin: auto; border: 1px solid white; border-bottom: 1px solid black; margin-top: -25%;">
																		<h6 class = "text-center">Cashier</h6>
																	</td>
																	<td><h1 style = "margin-top: -10%;"></h1></td>
																</tr>
															</tbody>
														</table>
												
														<a href="<?php echo base_url("cashier/dashboard");?>">	
															<input  type = "button" id="cancel" class = "btn btn-dark btn-sm" value="Back" style = "margin-left: 15%;">
														</a>
														

														<?php if($amount != 0)
														{
															
															echo '	<input type = "submit" id="btnprint" class = "btn btn-primary btn-sm pull-right" onclick="press()"  value="Pay"  style = "margin-right: 15%;">';

														} ?>
														<br />
														<br />

														</form>
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
