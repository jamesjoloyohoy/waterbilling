<div class="modal fade" id="confirmation-modal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop = "static" >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
	        <!-- <img src="<?php echo base_url('assets/vendors/images/sam.jpg')?>" alt="" class="bg_img"> -->
            <div class="modal-body text-center font-18">
                <h4 class="padding-top-30 mb-30 weight-500" style = "color: blue">Are you sure you want to Logout?</h4>
                
                <form action = "<?php echo base_url()?>index.php/login/logout" method = "POST" >
                    <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary border-radius-100 btn-block confirmation-btn" ><i class="fa fa-check"></i></button>
                            YES
                        </div>
                        <div class="col-6">
                            <button type="button" class="btn btn-danger border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                            NO
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>