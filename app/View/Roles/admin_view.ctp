<div class="tactview">
<h2><?php echo __('Role View'); ?></h2>
<table width="100%" border="0" cellspacing="1" cellpadding="0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($role['Role']['id']); ?>
		
		</td>
    </tr>
     <tr>	
		<th><?php echo __('Role'); ?></th>
		<td>
			<?php echo h($role['Role']['role']); ?>
		</td>
	 </tr>
      <tr>	 
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($role['Role']['created']); ?>
		</td>
	  </tr>
      <tr>	  
		<th class="last"><?php echo __('Updated'); ?></th>
		<td class="last">
			<?php echo h($role['Role']['updated']); ?>
	    </td>
	</tr>
  </table>
  		 <div class="form-buttons" style="float: left;margin-top: 12px;margin-left: 442px;">
       <?php echo $this->Html->link('Back', array('controller' => 'Roles','action'=> 'index'), 
               array( 'class' => 'button'));?>
     </div>	
</div>

