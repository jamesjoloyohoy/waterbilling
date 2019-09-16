<div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"  style = "margin-top: -1%;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"  style = "background-color: #4d94ff;">
                <h4 class="modal-title" id="myLargeModalLabel" style = " font-family: Times New Roman, Times, serif; margin-left: 30%">RESET EMPLOYEE</h4>
            </div>
            <div class="modal-body">
                <form action = "<?php echo base_url()?>index.php/superAdmin/dashboard/update_employee" method = "POST">
                
                        <input class="form-control" type="hidden" id = "no" name = "no">
                        <input class="form-control" type="hidden" id = "id" name = "uid" style = "background-color: white;" autocomplete = "off">

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-4 col-form-label">First Name</label>
                            <div class="col-sm-12 col-md-8">
                                <input class="form-control" type="text" readonly = "" id = "fName" name = "ufName" style = "background-color: white;" autocomplete = "off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-4 col-form-label">M.I</label>
                            <div class="col-sm-12 col-md-8">
                                <input class="form-control" type="text" readonly = "" id = "mName" name = "umName" style = "background-color: white;" autocomplete = "off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-4 col-form-label">Family Name</label>
                            <div class="col-sm-12 col-md-8">
                                <input class="form-control" type="text" readonly = "" id = "faName" name = "ufaName" style = "background-color: white;" autocomplete = "off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-4 col-form-label">User Name</label>
                            <div class="col-sm-12 col-md-8">
                                <input class="form-control" type="text" id = "username" readonly = "" name = "uusername" style = "background-color: white;" autocomplete = "off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-4 col-form-label">Address</label>
                            <div class="col-sm-12 col-md-8">
                                <input class="form-control" type="text" readonly = "" id ="address" name = "uaddress" style = "background-color: white;" autocomplete = "off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-4 col-form-label">Contact #</label>
                            <div class="col-sm-12 col-md-8">
                                <input class="form-control" type="number" readonly = "" id = "contact" name = "ucontact" style = "background-color: white;" autocomplete = "off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-4 col-form-label">Account Type</label>
                            <div class="col-sm-12 col-md-8">
                                <input class="form-control" type="text" readonly = "" id = "type" name = "uacc_type" style = "background-color: white;" autocomplete = "off">
                            </div>
                        </div>

                        <input class="form-control" type="hidden" id = "status" value = "Active" name = "ustatus" autocomplete = "off">

                        <input class="form-control" type="hidden" id = "password" name = "upassword" autocomplete = "off">
                      
                       
                </div>
                <div class="modal-footer">
                    <button class = "btn btn-primary btn-sm" type="submit" style = "margin-right: 68%;">
                        <i class="fa fa-save"></i> Reset
                    </button>

                    <button class = "btn btn-secondary btn-sm" type="button" data-dismiss="modal">
                        <i class="icon-copy fi-x"></i>  Cancel
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>