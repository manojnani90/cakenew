<div class="employeStages form">
   <div class="form-heading"><h2>Edit EmployeeStage</h2></div>   
<?php echo $this->Form->create('EmployeStage'); ?>
	<?php echo $this->Form->input('id');?>
<div class="form-section">
     <div class="form-warp">
         
         <div class="form-row">
	  <label>Stage<span class="mandatory"> * </span></label>
	    <?php echo $this->Form->input('stage',array('label'=>false));?>
         </div>
         
         <div class="form-row">
	  <label>Employe Id<span class="mandatory"> * </span></label>
	    <?php echo $this->Form->input('employe_id',array('label'=>false));?>
         </div>
         
         <div class="form-row">
	  <label>Latitude<span class="mandatory"> * </span></label>
	    <?php echo $this->Form->input('latitude',array('label'=>false));?>
         </div>
         <div class="form-row">
          <label>Longitude<span class="mandatory"> * </span></label>
	    <?php echo $this->Form->input('longitude',array('label'=>false));?>
         </div>
         <div class="form-buttons">
            <?php echo $this->Form->submit('Submit',array('div' => false));
                  echo $this->Html->link('Cancel', array('controller' => 'EmployeStages','action'=> 'index'), 
               array( 'class' => 'button'));?>
         </div>
      </div>
    </div>   
</div>

