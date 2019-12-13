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


	<div class = "text-center">
        <li class="d-flex flex-wrap align-items-center">
            <div class="browser-name">
                <img src="http://localhost/WaterBilling/assets/vendors/images/logo.png" alt="" style = "margin-top: 3%; margin-left: 70%; width: 25%;">
            </div>
            <div class="visit">
                <h5 style = "margin-top: 5%;">Manticao Municipal Waterworks</h5>
                    <h6>Manticao Misamis Oriental</h6>
                    <br />
                    <h4>Consumer List</h4>
            </div>
        </li>

        <table class=" table table-bordered" style = "width: 93%; margin: auto; background-color: white; margin-top: 2%;">
            <thead>
                <tr>
                    <th class="table-plus datatable-nosort" style = "width: 5%;">No.</th>
                    <th style = "width: 15%;">Meter No.</th>
                    <th style = "width: 20%;">Consumer Name</th>
                    <th style = "width: 35%;">Address</th>
                    <th style = "width: 15%;">Meter Used</th>
                    <th style = "width: 10%;">Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 1;
                    foreach($Unpaid as $up){?>
                    <tr>
                        <td><?php echo 
                            $i;
                            $i++
                        ?></td>
                        <td><?php echo $up['Mtr_id']?></td>
                        <td><?php echo $up['Cons_name']?></td>
                        <td><?php echo $up['Cons_address']?></td>                                                                                               
                        <td class = "text-center"><?php echo $up['bill_meterUsed']?></td>
                        <td class = "text-right">₱<?php echo $up['bill_currUsage']?></td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
        <br />
        
        <input  type = "button" id="btnprint" class = "btn btn-primary btn-sm" onclick="myprint()"  value="Print">
        
        <a href="<?php echo base_url('cashier/report');?>">	
            <input  type = "button" id="cancel" class = "btn btn-primary btn-sm" value="back">
        </a>
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