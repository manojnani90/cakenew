<div class="users form">
  <div class="form-heading"><h2>Add User</h2></div>  
<?php echo $this->Form->create('User'); ?>
  <div class="form-section">
     <div class="form-warp">
         
       <div class="form-row">
	  <label>Full Name<span class="mandatory"> * </span></label>
	    <?php echo $this->Form->input('name',array('label'=>false));?>
       </div>  
       
        <div class="form-row">
	  <label>User Name<span class="mandatory"> * </span></label>
	    <?php echo $this->Form->input('username',array('label'=>false));?>
        </div> 
        
        <div class="form-row">
	  <label>Password<span class="mandatory"> * </span></label>
	    <?php echo $this->Form->input('password',array('label'=>false));?>
        </div>
        
        <div class="form-row">
	  <label>E-mail<span class="mandatory"> * </span></label>
	    <?php echo $this->Form->input('email',array('label'=>false));?>
        </div>
         
        <div class="form-row">
	   <label>Role<span class="mandatory"> * </span></label>
            <?php echo $this->Form->input('role_id',array('label'=>false));?>
	</div> 
	<div class="form-buttons">
        <?php echo $this->Form->submit('Submit',array('div' => false));
        
       echo $this->Html->link('Cancel', array('controller' => 'Users','action'=> 'index'), 
               array( 'class' => 'button'));?>
        </div>
     </div>
  </div>   
</div>
