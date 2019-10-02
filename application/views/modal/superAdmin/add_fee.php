<div class="modal fade" id="fee" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header"  style = "background-color: #4d94ff;">
                <h5 class="modal-title" id="myLargeModalLabel" style = " font-family: Times New Roman, Times, serif; margin-left: 33%">Update Fees</h5>
            </div>
            <div class="modal-body">
                <form id = "addfee" method = "POST">
                  
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-6 col-form-label"> Connection Fee</label>
                        <div class="col-sm-12 col-md-6">
                            <input class="form-control" type="number" required = "" name = "connection" id = "cfee" autocomplete = "off">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-6 col-form-label"> Reconnection Fee</label>
                        <div class="col-sm-12 col-md-6">
                            <input class="form-control" type="number" required = "" name = "reconnection" id = "rfee" autocomplete = "off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-12 col-md-6 col-form-label"> Membership Fee</label>
                        <div class="col-sm-12 col-md-6">
                            <input class="form-control" type="number" required = "" name = "membership" id = "mfee" autocomplete = "off">
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
