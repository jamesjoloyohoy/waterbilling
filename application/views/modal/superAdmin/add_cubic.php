<div class="modal fade" id="cubic" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"  style = "background-color: #4d94ff;">
                <h5 class="modal-title" id="myLargeModalLabel" style = " font-family: Times New Roman, Times, serif; margin-left: 20%">Update Per Cubic Meter</h5>
            </div>
            <div class="modal-body">
                <form action = "<?php echo base_url('superAdmin/dashboard/add_cubic');?>" method = "POST">
                  
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-6 col-form-label"> Per Cubic Meter</label>
                        <div class="col-sm-12 col-md-6">
                            <input class="form-control" type="number" required = "" name = "cubic" autocomplete = "off">
                            <input class="form-control" type="hidden" value = "<?php echo date('F d, Y')?>" name = "date" autocomplete = "off">
                        </div>
                    </div>
                    
            </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm" style = "margin-right: 48%">
                        <i class = "fa fa-pencil"> Update </i>
                    </button>

                    <button type="submit" class="btn btn-secondary btn-sm"  data-dismiss="modal">
                        <i class = "icon-copy fi-x"> Cancel </i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
