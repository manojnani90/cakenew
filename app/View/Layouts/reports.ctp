
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
                
		echo $this->Html->script('http://code.jquery.com/jquery-1.9.1.js');
                echo $this->Html->script('http://code.jquery.com/ui/1.10.3/jquery-ui.js');
		echo $this->Html->script('custom-input');
                /*echo $this->Html->script('ajax');
		echo $this->Html->script('http://google-maps-utility-library-v3.googlecode.com/svn/tags/markerwithlabel/1.1.4/src/markerwithlabel.js');
                echo $this->Html->script('https://www.google.com/jsapi');
		echo $this->Html->script('https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false');
		
                echo $this->Html->script('jquery');
                echo $this->Html->script('jquery.validate');
                
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');*/
	?>
    
<script type="text/javascript">
	$(function() {
		$( "#dpStartDate" ).datepicker({
		  maxDate:'0',
		  dateFormat: 'dd-mm-yy',
		  defaultDate: new Date(),
		  showOn: "button",
		  buttonImage: "<?php echo base_url.'images/calendar-icon.png';?>",
		  buttonImageOnly: true,
		  onSelect: function(selected) {
          $("#dpEndDate").datepicker("option","minDate", selected)
        }
		});
		
		$( "#dpEndDate" ).datepicker({
		  maxDate:'0',
		  dateFormat: 'dd-mm-yy',
		  showOn: "button",
		  buttonImage: "<?php echo base_url.'images/calendar-icon.png';?>",
		  buttonImageOnly: true,
		  onSelect: function(selected) {
           $("#dpStartDate").datepicker("option","maxDate", selected)
        }
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
<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
