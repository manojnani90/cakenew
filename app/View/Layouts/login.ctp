
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
	   <?php echo $this->fetch('title'); ?> -
            TACT    
	</title>
	<?php
		echo $this->Html->meta('icon');
                
                echo $this->Html->css('http://fonts.googleapis.com/css?family=Roboto+Slab:400,700');
		echo $this->Html->css('custom-css');
                echo $this->Html->css('jquery-ui');
                echo $this->Html->css('style');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
  <div class="header">
  	<div class="logo">
  		<a href="<?php echo base_url.'admin/Users/login'?>"><img src="<?php echo base_url.'images/logo.png'?>" alt=""></a>
	</div>
	
</div>
  <div id="cointainer">
      <?php echo $this->Session->flash(); ?>
      <?php echo $this->fetch('content'); ?>
   
  </div>


<div class="login-footer">

     <?php echo $this->element('footer'); ?>
  
</div>

</body>
</html>
