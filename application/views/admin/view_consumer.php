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


	<div class = "text-center" style = "background-color: white; width: 90%; margin: auto;">
        <div class = "text-center">
            <h6 style = "font-size: 18px; margin-top: 3%;">MANTICAO MUNICIPAL WATERWORKS</h6>
            <h6>Manticao, Misamis Oriental</h6>
            <br />
            <h6 style = "font-size: 18px; font-weight: bold;">SERVICE CONNECTION/RECONNECTION APPLICATION FORM</h6>
        </div>
        
        <table class="table table-bordered">
            <thead >

                <tr>
                    <th colspan="2" style = "text-align: left">Family Name
                        <input type="text" class="form-control" readonly = "" value = "<?php echo $info['Cons_faName']?>" style = "background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: center;">
                    </th>

                    <th colspan="3" style = "text-align: left">First Name
                        <input type="text" class="form-control" readonly = "" value = "<?php echo $info['Cons_fName']?>" style = "background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: center;">
                    </th>

                    <th colspan="3" style = "text-align: left">M.I
                        <input type="text" class="form-control" readonly = "" value = "<?php echo $info['Cons_mName']?>" style = "background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: center;">
                    </th>
                </tr>

                <tr>
                    <th colspan="4" style = "text-align: left">Address
                        <input type="text" class="form-control" readonly = "" value = "<?php echo $info['Cons_zone'].' '.$info['Cons_barangay'].' '.$info['Cons_province']?>" style = "background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: center;">
                    </th>

                    <th colspan="4" style = "text-align: left">Name of Spouse
                    <input type="text" class="form-control" readonly = "" value = "<?php echo $info['Cons_spouse']?>" style = "background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: center;">
                    </th>
                </tr>

                <tr>
                    <th colspan="1" style = "text-align: left; width: 1%;">Date Applied
                        <input type="text" class="form-control" readonly = "" value = "<?php echo $info['Cons_dApplied']?>" style = "background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: center;">
                    </th>

                    <th colspan="2" style = "text-align: left; width: 30%;">Meter No.
                        <input type="text" class="form-control" readonly = "" value = "<?php echo $info['Mtr_id']?>" style = "background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: center;">
                    </th>

                    <th colspan="2" style = "text-align: left; width: 30%;">Meter Status
                        <input type="text" class="form-control" readonly = "" value = "<?php echo $info['Mtr_status']?>" style = "background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: center;">
                    </th>
                    
                    <th colspan="3" style = "text-align: left; width: 30%;">Consumer Application
                        <input type="text" class="form-control" readonly = "" value = "<?php echo $info['Cons_status']?>" style = "background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: center;">
                    </th>
                </tr>

                <tr>
                    <th colspan="8" style = "text-align: left">
                        <div class="col-md-12">
                            <h6>I hereby apply for a water service meter size 
                                <input type="number" class="input-inline" value = "<?php echo $info['Mtr_size']?>" readonly = "" style = "width: 10%; background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: center; border-bottom: 1px solid black"> (mm) located at 
                                <input type="text" class="input-inline" value = "<?php echo $info['Cons_zone'].' '.$info['Cons_barangay'].' '.$info['Cons_province']?>" readonly = "" style = "width: 30%; background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: center; border-bottom: 1px solid black">. I understand that the connection will not be made until it is approved and all charges are paid. I will assume responsibilities for the water meter and all the connection up to its meter. I will conform with the rules and regulations of the Manticao Municipal WaterWorks.</h6>
                        </div>
                    </th>
                </tr>

            </thead>
            
            <tbody>
                <tr style = "text-align: left;">    
                    <td  colspan="4" style = "text-align: left; width: 50%;">
                        <input type="text" class="form-control" readonly = ""  value = "<?php echo $info['Cons_fName'].' '.$info['Cons_mName'].' '.$info['Cons_faName']?>" style = "width: 80%; background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: center; border-bottom: 1px solid black;">
                        <h6 style = "margin-left: 35%;">Applicant</h6>
                    </td>
                    <td  colspan="4" style = "text-align: left">
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Conforme</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" readonly = "" value = "<?php echo $info['Cons_spouse']?>" style = "width: 80%; background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: center; border-bottom: 1px solid black;">
                                <h6 style = "margin-left: 25%;">Name of Spouse</h6>
                            </div>
                    </div>
                                    
                                
                    </td>
                    
                </tr>

                <tr>
                    <td class = "text-center" style = "text-align: left; width: 20%;">Charges</td>
                    <td class = "text-center" style = "text-align: left; width: 15%;">Amount</td>
                    <td class = "text-center" colspan = "3" style = "text-align: left">O.R No.</td>
                    <td class = "text-center" colspan = "3" style = "text-align: left">Date</td>
                </tr>

                <tr>
                    <td style = "text-align: left">Connection Fee</td>
                    <td style = "text-align: left"><input readonly = "" value = "<?php echo $info['Connection_fee']?>" class="form-control" style = "background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: right;"></td>
                    <td colspan = "6" style = "text-align: left">Approve for Installation</td>
                </tr>

                <tr>
                    <td style = "text-align: left">Reconnection Fee</td>
                    <td style = "text-align: left"><input class="form-control" readonly = ""  value = "0.00"  style = "background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: right;"></td>
                    <td rowspan = "6" colspan = "2.5" style = "text-align: left"></td>
                    <td rowspan = "6" colspan = "2.5" style = "text-align: left"> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><h5 class = "text-center"><?php echo $this->session->userdata('Emp_fName');?> <?php echo $this->session->userdata('Emp_mName');?> <?php echo $this->session->userdata('Emp_faName');?></h5><h6 class = "text-center" style = "font-size: 15px;">System Supervisor</h6></td>
                    <td style = "text-align: left">Date Installed</td>
                </tr>

                <tr>
                    <td style = "text-align: left">Membership Fee</td>
                    <td style = "text-align: left"><input readonly = "" value = "<?php echo $info['Membership_fee']?>" class="form-control" style = "background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: right;"></td>
                    <td rowspan = "5" style = "text-align: left"><br /><br /><br /><br /><br /><br /><br /><h5 class = "text-center">Maintenance</h5><h5 class = "text-center">Plumber</h5></td>
                </tr>

                <tr>
                    <td style = "text-align: left">Service Fee</td>
                    <td style = "text-align: left"><input readonly = "" value = "<?php echo $info['Cons_serviceFee']?>" class="form-control" style = "background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: right;"></td>
                </tr>

                <tr>
                    <td style = "text-align: left">Total</td>
                    <td style = "text-align: left"><input readonly = "" value = "<?php echo $info['fee']?>" class="form-control" style = "background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: right;">
                    </td>
                </tr>
                
            
            </tbody>
        </table>
        
        </div>
        <div class = "text-center">
            <input  type = "button" id="btnprint" class = "btn btn-primary btn-sm" onclick="myprint()"  value="Print">
            
            <a href="<?php echo base_url('admin/consumer');?>">	
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