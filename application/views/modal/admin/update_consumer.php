<div class="modal fade" id="update_consumer" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"  style = "background-color: #4d94ff;">
                <h4 class="modal-title" id="myLargeModalLabel" style = " font-family: Times New Roman, Times, serif; margin-left: 30%">UPDATE CONSUMER</h4>
            </div>
            <div class="modal-body">
                <form action = "<?php echo base_url('index.php/admin/consumer/update_consumer');?>" method = "POST">
                
                    <input class="form-control" type="text" required = "" name = "Cons_no" id = "no" autocomplete = "off" hidden>
            
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-4 col-form-label"> First Name</label>
                        <div class="col-sm-12 col-md-8">
                            <input class="form-control" type="text" required = "" name = "ufname" id = "fname" autocomplete = "off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-4 col-form-label">M.I</label>
                        <div class="col-sm-12 col-md-8">
                            <input class="form-control" type="text" required = "" id = "mname" onkeyup = "this.value = this.value.toUpperCase();" onKeyPress = "if(this.value.length == 2) return false;" name = "umname" autocomplete = "off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-4 col-form-label">Last Name</label>
                        <div class="col-sm-12 col-md-8">
                            <input class="form-control" type="text" required = "" id = "faname" name = "ufaname" autocomplete = "off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-4 col-form-label">Zone</label>
                        <div class="col-sm-12 col-md-8">
                            <input class="form-control" type="text" required = "" name = "uzone" id = "nzone" autocomplete = "off" style = "background-color: white">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-4 col-form-label">Barangay</label>
                        <div class="col-sm-12 col-md-8">
                            <input class="form-control" type="text" required = "" name = "ubarangay" id = "nbarangay" autocomplete = "off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-4 col-form-label">Spouse</label>
                        <div class="col-sm-12 col-md-8">
                            <input class="form-control" type="text" required = "" id = "spouse" name = "uspouse" autocomplete = "off">
                        </div>
                    </div>

                    <input class="form-control" type="text" value = "Manticao, Misamis Oriental" name = "uprovince" hidden>
                    <input class="form-control" type="text" id = "dapplied" name = "udapplied" hidden>
                    <input class="form-control" type="text" id = "status" name = "ustatus" hidden>
                    <input class="form-control" type="text" id = "service" name = "uservice" hidden>
                    <input class="form-control" type="text" id = "other" name = "uother" hidden>
                    <input class="form-control" type="text" id = "fee" name = "ufee" hidden>


            </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm" style = "margin-right: 70%">
                        <i class = "fa fa-save"> Update </i>
                    </button>

                    <button type="submit" class="btn btn-secondary btn-sm"  data-dismiss="modal">
                        <i class = "icon-copy fi-x"> Cancel </i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
