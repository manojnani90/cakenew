<div class="companies form">
   <div class="form-heading"><h2>Edit Company</h2></div> 
<?php echo $this->Form->create('Company'); ?>
	<?php echo $this->Form->input('id');?>
<div class="form-section">
     <div class="form-warp">
       
       <div class="form-row">
	  <label>Company Name<span class="mandatory"> * </span></label>
	    <?php echo $this->Form->input('company_name',array('label'=>false));?>
       </div>
       <div class="form-buttons">  
            <?php echo $this->Form->submit('Submit',array('div' => false));
                  echo $this->Html->link('Cancel', array('controller' => 'Companies','action'=> 'index'), 
               array( 'class' => 'button'));?>
       </div>    
      </div>
    </div>            
</div>