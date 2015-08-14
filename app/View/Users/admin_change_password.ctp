<?php echo $this->Form->create();?> 
<?php echo $this->Form->input('id');?> 
<?php echo $this->Form->input('password',array('type'=>'password','label'=>'Current Password','value'=>''));?> 
<?php echo $this->Form->input('password',array('label'=>'New password','value'=>''));?> 
<?php echo $this->Form->input('password_confirmation',array('label'=>'Confirm New Password','type'=>'password', 'value'=>''));?> 
<?php echo $this->Form->end('change');?>