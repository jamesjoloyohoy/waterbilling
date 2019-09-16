<!DOCTYPE html>
<html lang="en">

  <?php $this->load->view('cashier/template/head'); ?>

  <body class="fixed-left">
    
    <?php 

      if (!empty($content))
      {
        $this->load->view('cashier/'.$content);
      }
      
    ?>
  
   
    <?php $this->load->view('cashier/template/script'); ?>
   
  </body>
</html>