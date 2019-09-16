<!DOCTYPE html>
<html lang="en">

  <?php $this->load->view('staff/template/head'); ?>

  <body class="fixed-left">
    
    <?php 

      if (!empty($content))
      {
        $this->load->view('staff/'.$content);
      }
      
    ?>
  
   
    <?php $this->load->view('staff/template/script'); ?>
   
  </body>
</html>