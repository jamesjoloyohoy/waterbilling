<div class="modal fade" id="alert" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop = "static">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center font-18">
                <h1 id="message"><?php echo $this->session->flashdata('error')?></h1>
            </div>
        </div>
    </div>
</div>