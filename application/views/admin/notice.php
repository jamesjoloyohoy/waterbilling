<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="<?php echo base_url()?>assets/vendors/styles/style.css">

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
</head>
<body>
    <br />
        <a href="<?php echo base_url('admin/dashboard');?>" style = "margin-left: 5%;">	
            <input  type = "button" id="cancel" class = "btn btn-secondary btn-sm" value="back">
        </a>

        <input type = "submit" id="btnprint" class = "btn btn-primary btn-sm" onclick="myprint()"  value="Print"  style = "margin-right: 76%;">
    <br />
            <div class="invoice-box">
                <div class="invoice-header">
                    <div class="logo text-center">
                        <h6>MANTICAO MUNICIPAL WATERWORKS</h6>
                        <h5>NOTICE OF DISCONNECTION</h5>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-md-2 col-form-label">Name:</label>
                    <div class="col-sm-5 col-md-7" style = "margin-top: 1%;">
                        <strong> <?php echo $consumerInfo['Cons_fName'],' ',$consumerInfo['Cons_mName'],' ',$consumerInfo['Cons_faName']?> (<?php echo $consumerInfo['Mtr_id']?>)</strong>
                    </div>
                </div>

                <div class="form-group row" style = "margin-top: -2%;">
                    <label class="col-sm-2 col-md-2 col-form-label">Address:</label>
                    <div class="col-sm-5 col-md-7" style = "margin-top: 1%;">
                        <strong><?php echo $consumerInfo['Cons_zone'],' ',$consumerInfo['Cons_barangay'],' ',$consumerInfo['Cons_province']?></strong>
                    </div>
                </div>

                <div class="form-group row" style = "margin-top: -2%;">
                    <label class="col-sm-2 col-md-2 col-form-label">Date:</label>
                    <div class="col-sm-5 col-md-7" style = "margin-top: 1%;">
                        <strong id = "date"></strong>
                    </div>
                </div>

                <label style = "margin-left: 4%;">Sir/Madam: </label>
                    <h6 style = "margin-left: 8%;">Much of our desire to continue serving you as consumer of Manticao Water Works(MWW), but we have </h6>
                    <h6 style = "margin-left: 5%;">no other choice except to discontinue your water supply should you fail to settle your overdue account and</h6>
                    <h6 style = "margin-left: 5%;">old account balance of 0.00 within (2) days from receipt of this notice.</h6>
                    <h6 style = "margin-left: 8%;">Futher, a 2% penalty per month shall be charged against your delinquent bills.</h6>


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
                            <?php 
                                $cubic_meter = 0;
                                $amount = 0;
                                foreach ($record as $read) { ?>															
                                <tr>
                                    <td class = "text-center"><?php echo date('M',strtotime($read['read_startDate'])).' - '.date('M',strtotime($read['read_endDate']))?></td>
                                    <td class = "text-right"><?php echo number_format($read['Cubic_meter'], -2)?></td>
                                    <td class = "text-right"><?php echo number_format($read['bill_meterUsed'], -2)?></td>
                                    <td class = "text-right">₱<?php echo $read['bill_currUsage']?></td>

                                </tr> 
                                <?php 
                                    $cubic_meter += $read['bill_meterUsed']; 
                                    $amount += $read['bill_currUsage'];
                                } ?>
                            <tr>
                                <td colspan = "2" class = "text-right">Total</td>
                                <td style = "text-align: right"><?= number_format($cubic_meter, -2); ?></td>
                                <td style = "text-align: right">₱<?= number_format($amount, 2); ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <h6 style = "margin-left: 5%;">Kindly settle your account in the office of the Municipal Treasure Manticao, Misamis Oriental.</h6>
                    <h6 style = "margin-left: 5%;">Please disregard this notice if payment has been made.</h6>
                    <h6 style = "margin-left: 5%;">PAHIMANGNO: LIKAYE NGA DILI IKAW MAPUTLAN KAY ANG RECONNECTION FEE IS P250.00</h6>
                    
                    <br />
                    <br />
                    <div class="form-group row">
                        <label class="col-sm-2 col-md-2 col-form-label">Received by:</label>
                        <div class="col-sm-7 col-md-5">
                            <input readonly value = "<?php echo $consumerInfo['Cons_fName'],' ',$consumerInfo['Cons_mName'],' ',$consumerInfo['Cons_faName']?>" class="form-control" style = "background-color: white; border: 1px solid white; border-bottom: 1px solid black; width: 60%; margin-top: -2%; text-align: center">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-md-2 col-form-label">Date received:</label>
                        <div class="col-sm-5 col-md-7">
                            <strong id = "res" style = "margin-left: 5%;"></strong>
                            <input readonly class="form-control" style = "background-color: white; border: 1px solid white; border-bottom: 1px solid black; width: 40%; margin-top: -8%;">
                        </div>
                    </div>
            </div>
        </div>

<script src="<?php echo base_url()?>assets/vendors/scripts/script.js"></script>
  
  
<script>
    var d = new Date();
    var e = new Date();
    document.getElementById("date").innerHTML = d.toDateString();
    document.getElementById("res").innerHTML = e.toDateString();
</script>

<script >
        function myprint()
        {
            window.print();
        }
    </script>

</body>
</html>