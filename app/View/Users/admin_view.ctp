<div class="tactview">
<h2><?php echo __('User View'); ?></h2>

<table width="100%" border="0" cellspacing="1" cellpadding="0">
              <tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($user['User']['id']); ?>
			
		</td>
            </tr>          

            <tr>
		<th><?php echo __('Name'); ?></th>
		<td>
			<?php echo h($user['User']['name']); ?>
			
		</td>
            </tr>
            
            <tr>
		<th><?php echo __('Username'); ?></th>
		<td>
			<?php echo h($user['User']['username']); ?>
			
		</td>
            </tr>
            
            <tr>
		<th><?php echo __('E-mail'); ?></th>
		<td>
			<?php echo h($user['User']['email']); ?>
			
		</td>
            </tr>
            
            <tr>    
		<th class="last"><?php echo __('Role'); ?></th>
		<td class="last">
			<?php echo h($user['Role']['role']); ?>
			
		</td>
            </tr> 
               
                <?php /*?><tr>
		<th><?php echo __('Password'); ?></th>
		<td>
			<?php echo h($user['User']['password']); ?>
			
		</td>
                </tr>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated'); ?></dt>
		<dd>
			<?php echo h($user['User']['updated']); ?>
			&nbsp;
		</dd><?Php */?>
		
</table>
		<div class="form-buttons" style="float: left;margin-top: 12px;margin-left: 442px;">
       <?php echo $this->Html->link('Back', array('controller' => 'Users','action'=> 'index'), 
               array( 'class' => 'button'));?>
        </div>
	  
</div>

