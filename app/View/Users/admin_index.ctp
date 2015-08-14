<div class="users index">
    <div class="form-heading">
	<h2>Users</h2>
        
	<a href="<?php echo base_url.'admin/Users/add'?>" class="add_btn">Add</a>
    </div>
    
    <div class="list-view">
	<table width="100%" border="0" cellspacing="1" cellpadding="0">
            <thead>
		<tr>
		   <td align="center" width="30px"><?php echo __('S.No'); ?></td>
		   <td align="center"><?php echo __('Name'); ?></td>
		   <td align="center"><?php echo __('Username'); ?></td>                
                   <td align="center"><?php echo __('E-mail'); ?></td>
		   <td align="center"><?php echo __('Role'); ?></td>
                   <?php /*?><th><?php echo $this->Paginator->sort('password'); ?></th>
		   <th><?php echo $this->Paginator->sort('created'); ?></th>
		   <th><?php echo $this->Paginator->sort('updated'); ?></th><?php */?>
		   <td align="center"><?php echo __('Actions'); ?></td>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($users as $user): ?>
	<tr>
		<td align="center"><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td align="center"><?php echo h($user['User']['name']); ?>&nbsp;</td>
		<td align="center"><?php echo h($user['User']['username']); ?>&nbsp;</td>
                <td align="center"><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td align="center">
			<?php echo h($user['Role']['role']); ?>
		</td>
                <?php /*?><td><?php echo h($user['User']['password']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['updated']); ?>&nbsp;</td><?php */?>
		<td class="actions" align="center">
	        <?php echo $this->Html->link($this->Html->image('/images/view.png'), 
                        array('action' => 'view', $user['User']['id']), array('escape' => false,'title'=>'View')); ?>
                
                <?php echo $this->Html->link($this->Html->image('/images/edit_icon.png'),
                        array('action' => 'edit', $user['User']['id']), array('escape' => false,'title'=>'Edit'));?>  
                
                <?php /*?><?php echo $this->Form->postLink($this->Html->image('/images/del_icon.png'),
                array('action' => 'delete', $user['User']['id']), 
      array('escape' => false,'title'=>'Delete'),__('Are you sure you want to delete # %s?', $user['User']['id']));?><?php */?>    
		
                   
	</tr>
<?php endforeach; ?>
	
		</tbody>
		</table>
			
	  </div>
   
  </div>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

