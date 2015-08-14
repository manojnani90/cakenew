<div class="roles form">
  <div class="form-heading"><h2>Add Roll</h2></div>  
<?php echo $this->Form->create('Role'); ?>
  <div class="form-section">
     <div class="form-warp">
	
      <div class="form-row">
	  <label>Role<span class="mandatory"> * </span></label>
	    <?php echo $this->Form->input('role',array('label'=>false));?>
       </div>
       <div class="form-buttons">  
          <?php echo $this->Form->submit('Submit',array('div' => false));
                echo $this->Html->link('Cancel', array('controller' => 'Roles','action'=> 'index'), 
               array( 'class' => 'button'));?>
       </div>    
     </div>
  </div>   
</div>

