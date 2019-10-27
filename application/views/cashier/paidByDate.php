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

            <table class=" table table-bordered" style = "width: 98%; margin: auto; background-color: white; margin-top: 2%;">
                <thead>
                    <tr>
                        <th style = "width: 5%;">No.</th>
                        <th>Date</th>
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
                        $total_amount = 0;
                        foreach($reading_paid as $r){?>
                        <tr>
                            <td><?php echo 
                                $i;
                                $i++
                            ?></td>
                            <td><?php echo date('F d Y',strtotime($r['trans_date']))?></td>
                            <td><?php echo $r['Mtr_id']?></td>                            
                            <td class = "text-left"><?php echo $r['Cons_name']?></td>                            
                            <td class = "text-left"><?php echo $r['Address']?></td>                          
                            <td><?php echo $r['Trans_amount']/$r['Cubic_meter']?></td>                            
                            <td class = "text-right">₱<?php echo number_format($r['Trans_amount'], 2)?></td>
                        </tr>
                    <?php $total_amount += $r['Trans_amount']; }?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan = "5" style = "text-align: right">Total</td>
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