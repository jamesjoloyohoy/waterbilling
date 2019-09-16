<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="min-height-200px">
			<div class="page-header">
				<div class="row">
					<div class="col-md-6 col-sm-12">
						<div class="title">
							<h4 style = "color: #ffff00">Consumer</h4>
						</div>
						<nav aria-label="breadcrumb" role="navigation">
							<ol class="breadcrumb">
							</ol>
						</nav>
					</div>
				</div>
			</div>

			<div class="col-lg-12 col-md-12 col-sm-12 mb-30" >
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

                                <table class="data-table table-bordered stripe hover nowrap" style = "margin-left: -5%;">
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

