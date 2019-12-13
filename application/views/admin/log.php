<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
    
            <div class="col-xl-12 col-lg-8 col-md-8 col-sm-12 mb-30">
                <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">

                    <form action="<?php echo base_url('admin/log_print/');?>">

                        <label class="col-sm-12 col-md-4 col-form-label">Month</label>
                        <div class="form-group row" >
                            <div class="col-sm-7 col-md-7 col-form-label">
                                <div class="input-daterange input-group">
                                    <input type="text" name="from_date" class="form-control-sm month-picker" placeholder = "Search Month..." autocomplete = "off" style = "background-color:white; border-top: 1px solid white; border-left: 1px solid white; border-right: 1px solid white; text-align: center; border-bottom: 1px solid black" >
                                    
                                </div>
                            </div>
                        </div>
               
                        
                            <label class="col-sm-12 col-md-4 col-form-label">Meter Reader Name:</label>
                                    
                            <div class="form-group row">
                                
                                <input type = "search" list = "consumer" name = "Search" placeholder = "Search..." class = "form-control-sm" autocomplete = "off" style = "width: 25%; margin-left: 3%;">
                                    <datalist id = "consumer">
                                        <option></option>
                                        <?php foreach($name as $n){?>
                                            <option value = "<?php echo $n->bill_meterReader?>"></option>
                                        <?php }?>
                                    </datalist>

                                <div class="col-sm-12 col-md-8">
                                    <button type="submit" class = "btn btn-secondary btn-sm" style = "margin-left: 3%;">
                                        <i class = "fa fa-print"> Print</i>
                                    </button>
                                </div>
                            </div>
                    </form>

                    <table class="data-table table-bordered stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">No.</th>
                                <th>Bill Date</th>
                                <th>Meter no.</th>
                                <th>Consumer Name</th>
                                <th>Meter Reader</th>
                                <th>Meter Used</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 1;
                                foreach($log as $l){?>
                                <tr>
                                    <td><?php echo 
                                        $i;
                                        $i++
                                    ?></td>
                                    <td><?php echo date('F d Y',strtotime($l['bill_date']))?></td>
                                    <td class = "text-center"><?php echo $l['Mtr_id']?></td>
                                    <td><?php echo $l['Cons_name']?></td>
                                    <td><?php echo $l['bill_meterReader']?></td>                                                                                               
                                    <td class = "text-center"><?php echo $l['bill_meterUsed']?> * <?php echo number_format($l['cubic_meter'], -2)?></td>
                                    <td class = "text-right">₱<?php echo number_format($l['bill_currUsage'], 2)?></td>
                                </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
         
