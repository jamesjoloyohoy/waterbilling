<div class="modal fade bs-example-modal-lg" id="consumer" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style = "background-color: #4d94ff;">
                <h4 class="modal-title" id="myLargeModalLabel" style = " font-family: Times New Roman, Times, serif; margin-left: 38%;">ADD CONSUMER</h4>
            </div>
            <div class="modal-body">
                <form id = "addconsumer" method = "POST">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">

                            <div class="form-group">
                                <label>First Name</label>
                                <input class="form-control" type="text" required = "" name = "fname" autocomplete = "off">
                            </div>

                            <div class="form-group">
                                <label>M.I</label>
                                <input class="form-control"  onkeyup = "this.value = this.value.toUpperCase();" onKeyPress = "if(this.value.length == 2) return false;" type="text" required = "" name = "mname" autocomplete = "off">
                            </div>

                             <div class="form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" required = "" name = "faname" autocomplete = "off">
                            </div>

                            <div class="form-group">
                                <label>Zone</label>
                                <input class="form-control" type="text" required = "" name = "zone" autocomplete = "off">
                            </div>

                            <div class="form-group">
                                <label>Barangay</label>
                                <input class="form-control" type="text" required = "" name = "barangay" autocomplete = "off">
                            </div>

                            <input class="form-control" type="hidden" value = "Manticao, Misamis Oriental" name = "province">
                            

                        </div>
                        <div class="col-md-6 col-sm-12">

                            <div class="form-group">
                                <label>Name of Spouse</label>
                                <input class="form-control" type="text" placeholder = "Surname, Firstname M.I" required = "" name = "spouse" autocomplete = "off">
                            </div>

                            <input type="hidden" class="form-control" value = "<?php echo date('F d, Y')?>" name = "dapplied" autocomplete = "off">

                            <input type="hidden" class="form-control" value = "Residential" name = "status" autocomplete = "off">
                                
                            <div class="form-group">
                                <label>Meter No.</label>
                                <input class="form-control" type="number" required = "" min = "0" name = "id" id = "climit" autocomplete = "off" style = "background-color: white;">
                            </div>

                            <div class="form-group">
                                <label>Meter size</label>
                                <input class="form-control" type="number" required = "" min = "0" step=".01" name = "size" autocomplete = "off">                                
                            </div>

                            <input class="form-control" type="hidden" value = "Connect" name = "mstatus" >

                            <input class="form-control" type="hidden" value = "1" name = "fee_no">

                            <div class="form-group">
                                <label>Service Fee</label>
                                <input class="form-control" type="number" min = "0" required = "" name = "serviceFee" step=".01" autocomplete = "off">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm" style = "margin-right: 83%">
                    <i class = "fa fa-plus"> Add </i>
                </button>

                <button type="submit" class="btn btn-secondary btn-sm"  data-dismiss="modal">
                    <i class = "icon-copy fi-x"> Cancel </i>
                </button>
            </div>
        </div>
    </div>
</div>