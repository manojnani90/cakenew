<div class="employes form">
  <div class="form-heading"><h2>Add Employee</h2></div>  
<?php echo $this->Form->create('Employe'); ?>
   <div class="form-section">
     <div class="form-warp">
         
      <div class="form-row">
	  <label>Employe Id<span class="mandatory"> * </span></label>
	    <?php echo $this->Form->input('employeid',array('label'=>false));?>
       </div>
       
       <div class="form-row">
	  <label>Employe Name<span class="mandatory"> * </span></label>
	    <?php echo $this->Form->input('employe_name',array('label'=>false));?>
       </div>
       
       <div class="form-row">
	  <label>Company Name<span class="mandatory"> * </span></label>
	    <?php echo $this->Form->input('company_name',array('label'=>false));?>
       </div>
       
       <div class="form-row">
	  <label>Card Id<span class="mandatory"> * </span></label>
	    <?php echo $this->Form->input('cardid',array('label'=>false));?>
       </div>  
    <div class="form-buttons">
    <?php echo $this->Form->submit('Submit',array('div' => false));
          echo $this->Html->link('Cancel', array('controller' => 'Employes','action'=> 'index'), 
               array( 'class' => 'button'));?>
    
    </div>   
     </div>
   </div>
</div>

