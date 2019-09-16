<!DOCTYPE html>
<html lang="en">

  <?php $this->load->view('consumer/template/head'); ?>

  <body class="fixed-left">
    
    <?php 

      if (!empty($content))
      {
        $this->load->view('consumer/'.$content);
      }
      
    ?>
  
   
    <?php $this->load->view('consumer/template/script'); ?>
   
  </body>
</html>