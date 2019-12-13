<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/styles/style.css">
</head>

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
<body> 

    <div class="bg-white pd-30 box-shadow border-radius-5 xs-pd-20-10 height-100-p" style = "width: 100%; margin: auto">   
    <a href="<?php echo base_url('cashier/report');?>">	
        <input  type = "button" id="cancel" class = "btn btn-danger btn-sm" value="back">
    </a>
    <input  type = "button" id="btnprint" class = "btn btn-primary btn-sm" onclick="myprint()"  value="Print">

        <div class = "text-center">
            <li class="d-flex flex-wrap align-items-center">
                <div class="browser-name">
                    <img src="http://localhost/WaterBilling/assets/vendors/images/logo.png" alt="" style = "margin-top: 3%; margin-left: 70%; width: 25%;">
                </div>
                <div class="visit">
                    <h5 style = "margin-top: 5%;">Manticao Municipal Waterworks</h5>
                        <h6>Manticao Misamis Oriental</h6>
                        <br />
                        <h4>Consumer Record Of Payment</h4>
                </div>
            </li>
            <br />
            <br />

            <div class="row" style = "margin-left: 9%;">
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <h6 class="weight-500" style = "text-align: left">Consumer name</h6>
                        <h5 class="weight-550 mb-25" style = "text-align: left;"><?php echo $name['Cons_fName'].' '.$name['Cons_mName'].' '.$name['Cons_faName']?></h5>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6">
                    <div class="form-group">
                        <h6 class="weight-500" style = "text-align: left">Address</h6>
                        <h5 class="weight-550 mb-25" style = "text-align: left"><?php echo $name['Cons_zone'].' '.$name['Cons_barangay'].' '.$name['Cons_province']?></h5>
                    </div>
                </div>
            </div>
            <h6 class="weight-500" style = "margin-right: 74%;">Meter No.</h6>
            <h5 class="weight-550 mb-25" style = "margin-right: 76%;"><?php echo $name['Mtr_id']?></h5>

            <table class=" table table-bordered" style = "width: 80%; margin: auto; background-color: white; margin-top: 2%;">
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
                        $total_amount = 0;
                        foreach($record as $r){?>
                        <tr>
                            <td><?php echo 
                                $i;
                                $i++
                            ?></td>
                            <td><?php echo date('F d Y',strtotime($r['Trans_date']))?></td>
                            <td><?php echo $r['Emp_name']?></td>                                                                                                                                                            
                            <td class = "text-center"><?php echo $r['bill_meterUsed']?></td>
                            <td class = "text-right">₱<?php echo number_format($r['bill_currUsage'],2)?></td>
                        </tr>
                    <?php $total_amount += $r['bill_currUsage']; }?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan = "3" style = "text-align: right">Total</td>
                        <td></td>
                        <td style = "text-align: right;"> ₱<?= number_format($total_amount, 2); ?></td>   
                    </tr>
                </tfoot>
            </table>
        <br />
    </div>

    <script >
        function myprint()
        {
            window.print();
        }

    </script>

    <script src="<?php echo base_url()?>assets/vendors/scripts/script.js"></script>
	
</body>
</html>