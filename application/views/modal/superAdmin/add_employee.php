<div class="modal fade" id="Mymodal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"  style = "background-color: #4d94ff;">
                <h4 class="modal-title" id="myLargeModalLabel" style = " font-family: Times New Roman, Times, serif; margin-left: 30%">ADD EMPLOYEE</h4>
            </div>
            <div class="modal-body">
                <form action = "<?php echo base_url('superAdmin/dashboard/add_new_employee');?>" method = "POST">
                  
                    <input class="form-control" type="text" readonly = "" value = "<?php echo $Emp_id?>" name = "id" autocomplete = "off" hidden>
            
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-4 col-form-label"> First Name</label>
                        <div class="col-sm-12 col-md-8">
                            <input class="form-control" type="text" required = "" name = "fName" autocomplete = "off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-4 col-form-label">M.I</label>
                        <div class="col-sm-12 col-md-8">
                            <input class="form-control" type="text" required = "" onkeyup = "this.value = this.value.toUpperCase();" onKeyPress = "if(this.value.length == 2) return false;" name = "mName" autocomplete = "off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-4 col-form-label">Surname</label>
                        <div class="col-sm-12 col-md-8">
                            <input class="form-control" type="text" required = "" name = "faName" autocomplete = "off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-4 col-form-label">Username</label>
                        <div class="col-sm-12 col-md-8">
                            <input class="form-control" type="text" readonly = "" name = "username" value = "user<?php echo $Emp_no?>" autocomplete = "off" style = "background-color: white">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-4 col-form-label">Address</label>
                        <div class="col-sm-12 col-md-8">
                            <input class="form-control" type="text" required = "" name = "address" autocomplete = "off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-4 col-form-label">Contact #.</label>
                        <div class="col-sm-12 col-md-8">
                            <input class="form-control" type="number" required = "" min = "0" onKeyPress = "if(this.value.length == 11) return false;" name = "contact" autocomplete = "off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-4 col-form-label">Account Type</label>
                        <div class="col-sm-12 col-md-8">
                            <select class="custom-select col-12" required = "" name = "type">
                                <option></option>
                                <option>Admin</option>
                                <option>Cashier</option>
                                <option>Staff</option>
                            </select>
                        </div>
                    </div>
                            
                    <input class="form-control" type="text" value = "Active" name = "status" hidden>
                    
                    <input class="form-control" type="text" value = "user<?php echo $Emp_no?>" name = "password" hidden>


            </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm" style = "margin-right: 70%">
                        <i class = "fa fa-plus"> Add </i>
                    </button>

                    <button type="submit" class="btn btn-secondary btn-sm"  data-dismiss="modal">
                        <i class = "icon-copy fi-x"> Cancel </i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
