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
<body style = "background-color: white"> 

    <div class="bg-white pd-30 box-shadow border-radius-5 xs-pd-20-10 height-100-p" style = "width: 100%; margin: auto">   
    <a href="<?php echo base_url('admin/log');?>">	
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
                        <h4>Consumer Record Of Reading</h4>
                        <div class = "form-group" style = "margin-top: 3%;">
                            <strong>From: <input value = "" style = "text-align: center; border: 1px solid white; border-bottom: 1px solid black" readonly = ""> to: <input value = "" style = "text-align: center; border: 1px solid white; border-bottom: 1px solid black" readonly = ""></strong>
                        </div>
                </div>
            </li>
            <!-- <div class="form-group row">
                <label class="col-sm-2 col-md-2 col-form-label" style = "margin-left: 6%;">Meter Reader:</label>
                <div class="col-sm-9 col-md-9 text-left">
                    <h5 style = "margin-top: 1%;"><?php echo $log_print['bill_meterReader']?></h5>
                </div>
            </div> -->

            <table class="table table-bordered" style = "width: 80%; margin: auto; background-color: white; margin-top: 2%;">
                <thead>
                    <tr>
                        <th class="table-plus datatable-nosort">No.</th>
                        <th>Bill Date</th>
                        <th>Meter no.</th>
                        <th>Consumer Name</th>
                        <th>Meter Used</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 1;
                        $bill_currUsage = 0;
                        foreach($log as $l){?>
                        <tr>
                            <td><?php echo 
                                $i;
                                $i++
                            ?></td>
                            <td><?php echo date('F d Y',strtotime($l['bill_date']))?></td>
                            <td class = "text-center"><?php echo $l['Mtr_id']?></td>
                            <td class = "text-left"><?php echo $l['Cons_name']?></td>                                                                                               
                            <td class = "text-center"><?php echo $l['bill_meterUsed']?> * <?php echo number_format($l['cubic_meter'], -2)?></td>
                            <td class = "text-right">₱<?php echo number_format($l['bill_currUsage'], 2)?></td>
                        </tr>
                    <?php $bill_currUsage += $l['bill_currUsage']; }?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan = "4" class = "text-right">Total:</td>
                        <td></td>
                        <td class = "text-right">₱<?php echo number_format($bill_currUsage,2); ?></td>
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