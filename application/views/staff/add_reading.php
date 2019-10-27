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
<div class="container" >
	<div class="pd-ltr-20 height-100-p xs-pd-20-10">
		<div class="min-height-200px">
        
        <form class="form form-horizontal" id = "addReading" method = "POST" style = "width: 50%; border: 2px solid grey; margin: auto; margin-top: 1%; margin-bottom: 3%; background-color: white">
            
            <div class = "text-center" style = "margin-top: 3%;">
                <h5 style = " font-family: Times New Roman, Times, serif; margin-top: 0; color: black;">Manticao Municipal WaterWorks</h5>
                <h5 style = " font-family: Times New Roman, Times, serif; margin-top: 0; color: black;">Manticao, Misamis Oriental</h5>
                <h6 style = " font-family: Times New Roman, Times, serif; margin-top: 0; color: black; font-size: 15px;">STATEMENT OF ACCOUNT</h6>
                
                <div class="form-group row">
                    <label class="col-sm-4 col-md-3 col-form-label" style = "margin-left: 25%; margin-top: 1%;">For the Month of: </label>
                    <div class="col-sm-4"> 
                        <input name = "bdate" readonly = "" value = "<?php echo date('F d')?>" style = "background-color:white; border: 1px solid white; border-bottom: 1px solid black; width: 60%; text-align: center; margin-right: 35%; margin-top: 5%;">
                    </div>
                </div>
            <br />
            <br />

            <div class="form-group row">
                <label class="col-sm-5 col-md-5 col-form-label" style = "margin-top: -8%;">Covering period from: </label>
                <div class="col-sm-7 col-md-6 col-form-label">
                <div class="input-daterange input-group" style = "margin-top: -20%; margin-left: -5%;">
                    
                    <input name = "sdate" id = "da" readonly = "" style = "background-color:white; border: 1px solid white; border-bottom: 1px solid black; width: 40%; text-align: center;">

                    <span class="input-group-addon bg-secondary text-white b-0" style = "width: 7%; margin-top: 3%;">to</span>
                    
                    <input name = "edate" value = "<?php echo date('F')?>" readonly = "" style = "background-color:white; border: 1px solid white; border-bottom: 1px solid black; width: 40%; text-align: center;">

                    </div>
                </div>
            </div>

                <table class="table table-bordered" style = "width: 99%; margin: auto; margin-top: -5%;">
                    <thead>
                        <tr>
                            <th colspan="2">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-md-3 col-form-label">Consumer: </label>
                                    <div class="col-sm-5 col-md-7">
                                        <input class="form-control" type="text" value = "<?php echo $consumer['Cons_fName'].' '.$consumer['Cons_mName'].' '.$consumer['Cons_faName']?>" style = "border: 1px solid white; background-color: white;" readonly = "">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-md-3 col-form-label" style = "margin-left: -.5%;">Meter no.: </label>
                                    <div class="col-sm-5 col-md-7">
                                        <input class="form-control" type="text" value = "<?php echo $consumer['Mtr_id']?>" style = "border: 1px solid white; background-color: white;" readonly = "">
                                        <input class="form-control" value = "<?php echo $consumer['Mtr_no']?>" name = "no" type = "text" hidden>
                                        <input class="form-control" value = "<?php echo $consumers['Read_numOfRead'] + 1?>" name = "numofread" type = "text" hidden>
                                    </div>
                                </div>

                                <div class="form-group row">
                                <label class="col-sm-3 col-md-3 col-form-label">Location: </label>
                                <div class="col-sm-9 col-md-9">
                                    <input class="form-control" type="text" value = "<?php echo $consumer['Cons_zone'].' '.$consumer['Cons_barangay'].' '.$consumer['Cons_province']?>" style = "border: 1px solid white; background-color: white;" readonly = "">
                                </div>
                            </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style = "width: 50%; text-align: left">Present Reading:
                                <input type="number" class="form-control" id = "pres" onchange="press()" min = "0" step=".01" name = "cbill" required = "" style = "background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: center">
                            </td>

                            <td rowspan="6" style = "text-align: left">
                                Please pay this bill at the Municipal Treasiure's Office within 20 days upon receipt to avoid the 2% penalty per month. 
                                <br /> 
                                <br /> 
                                <br />
                                <br />
                                <br /> 
                                <br /> 
                                <br />
                                <br /> 
                                <br />
                                <br />
                                <br />
                                <br />
                            </td>
                        </tr>

                        <tr>
                            <td style = "text-align: left">Previous Reading: 
                                <input type="number" class="form-control" id = "prev" value = "<?php echo number_format($consumers['Read_currBill'], -2)??0 ?>" readonly = "" name = "pbill" style = "background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: center">
                                <input class="form-control" id = "cubic" value = "<?php echo $cubic['Cubic_meter']?>" type = "hidden">
                                <input class="form-control" value = "<?php echo $cubic['Cubic_no']?>" name = "cubic" type = "hidden">
                            </td>
                        </tr>

                        <tr>
                            <td style = "text-align: left">Cubic Meters Used: 
                                <input type="number" class="form-control"  min = "0" id="sub" name = "meterUsed" readonly = "" style = "background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: center">
                            </td>
                        </tr>

                        <tr>
                            <td style = "text-align: left">Present Bill: 
                                <input type="number" readonly = "" class="form-control" id = "prbil" name = "cusage" required = "" style = "background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: center">
                            </td>
                        </tr>

                        <tr>
                            <td style = "text-align: left">Previous Bill: 
                                <input type="number" readonly = "" class="form-control" id = "pbil" value = "<?php echo ($consumers['Read_currBill']*$cubic['Cubic_meter']); ?>" min = "0" step=".01" name = "pusage"  required = "" style = "background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: center">
                            </td>
                        </tr>

                        <tr>
                            <td style = "text-align: left">Total Amount Due: 
                                <input type="number" readonly = "" id = "final" class="form-control" id = "subtotal" name = "tusage" required = "" style = "background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: center">
                            </td>
                        </tr>

                        <tr>
                            <td style = "text-align: left">Date Delivered:         
                                <input type="text" class="form-control" id = "deli" name = "rdate" readonly = "" style = "background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: center;" >
                            </td>

                            <td style = "text-align: left">Received By: 
                                <input type="text" class="form-control" value = "<?php echo $consumer['Cons_fName'].' '.$consumer['Cons_mName'].' '.$consumer['Cons_faName']?>" readonly = "" style = "background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: center">
                            </td>
                        </tr>


                        <tr>
                            <td style = "text-align: left">Due Date: 
                            <input type="text" class="form-control" id = "date" name = "ddate" readonly = "" style = "background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: center;" value=" "  >
                            </td>
    
                            <td style = "text-align: left">Meter Reader:
                                <input type="text" class="form-control" name = "read" readonly = "" value = "<?php echo $this->session->userdata('Emp_fName');?> <?php echo $this->session->userdata('Emp_mName');?> <?php echo $this->session->userdata('Emp_faName');?>" style = "background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: center">
                            </td>
                        </tr>

                    </tbody>

                    <tfoot>
                        <tr>
                            <th colspan="2" style = "text-align: left;">Note: Likaye nga dili ikaw maputlan. Ang Re-Connection Fee ₱250.00</th>
                        </tr>
                    </tfoot>
                </table>

                <br />
            <div class="modal-footer">

                <input type = "submit" id="btnprint" class = "btn btn-primary btn-sm" onclick="press()"  value="Add Reading"  style = "margin-right: 72%;">

                <a href="<?php echo base_url('staff/dashboard');?>">	
                    <input  type = "button" id="cancel" class = "btn btn-danger btn-sm" value="back">
                </a>

            </div>
        </form>
		</div>
	</div>
</div>	
<?php $this->load->view('modal/message');?>
