
<div class="login-1">
  <div class="login-header">LOGIN</div>
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>

  <p><label> Username<span class="mandatory"> * </span></label>
      <?php echo $this->Form->input('username',array('label'=>false));?>  
  </p>

<p><label> Password<span class="mandatory"> * </span></label>
    <?php echo $this->Form->input('password',array('label'=>false));?> 
</p>
<div class="login-button">  
    <?php echo $this->Form->end(__('Login')); ?>
    	  
 <a href="<?php echo base_url.'admin/Users/forgetpwd'?>">Forgot Password?</a></div> 


</div>