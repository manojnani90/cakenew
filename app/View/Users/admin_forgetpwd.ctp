

<div class="login">
  <div class="login-header">FORGOT PASSWORD</div>
	<?php echo $this->Session->flash('auth'); ?>
	<?php echo $this->Form->create('User', array('action' => 'forgetpwd')); ?>
	<p><label>Email ID<span class="mandatory"> * </span></label>
	<?php echo $this->Form->input('email',array('label'=>false));?></p>
	<input type="submit" class="button" style="padding-left: 7px;" value="Recover" />
	
   <?php echo $this->Form->end();?>
</div>