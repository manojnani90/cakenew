
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
               <title>
              <?php echo $this->fetch('title');?> -     
               TACT
         
               </title>
	
	  <?php 
                echo $this->Html->meta('icon');
                
                echo $this->Html->css('http://fonts.googleapis.com/css?family=Roboto+Slab:400,700');
                echo $this->Html->css('custom-css');
                echo $this->Html->css('jquery-ui');
                echo $this->Html->css('style');
                
                echo $this->Html->script('http://code.jquery.com/jquery-1.10.1.min.js');
                echo $this->Html->script('custom-input');
                echo $this->Html->script('jquery');
                echo $this->Html->script('jquery.validate');
                
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
    
<script type='text/javascript'>
var overlay = $('<div id="overlay"></div>');
function Delete()
{
	overlay.show();
	overlay.appendTo(document.body);
	$('.confirmation-box').show();
	
	
	
}
$(document).ready(function(){  
    $('#btnOk').click(function(){
		
        $('.confirmation-box').hide();
		overlay.appendTo(document.body).remove();
		return true;
    });
	 $('#btnCancel').click(function(){
	 
        $('.confirmation-box').hide();
		overlay.appendTo(document.body).remove();
		return false;
    });
});
</script>

</head>
<body>
  <div class="header">
    <?php echo $this->element('header'); ?>  
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
