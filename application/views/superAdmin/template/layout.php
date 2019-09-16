<!DOCTYPE html>
<html lang="en">

  <?php $this->load->view('superAdmin/template/head'); ?>

  <body>
    <!-- <img src="<?php echo base_url()?>assets/vendors/images/login.jpg" class="bg_img"> -->

    <?php 

      if (!empty($content))
      {
        $this->load->view('superAdmin/'.$content);
      }
      
    ?>
  
   
    <?php $this->load->view('superAdmin/template/script'); ?>
   
  </body>
</html>