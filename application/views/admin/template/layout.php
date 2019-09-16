<!DOCTYPE html>
<html lang="en">

  <?php $this->load->view('admin/template/head'); ?>

  <body class="fixed-left">
    <!-- <img src="<?php echo base_url()?>assets/vendors/images/login.jpg" class="bg_img"> -->

    <?php $this->load->view('admin/template/header'); ?>
    <?php $this->load->view('admin/template/sidebar'); ?>
    
    
    <?php 

      if (!empty($content))
      {
        $this->load->view('admin/'.$content);
      }
      
    ?>

    <?php $this->load->view('admin/template/footer'); ?>
  
   
    <?php $this->load->view('admin/template/script'); ?>
   
  </body>
</html>