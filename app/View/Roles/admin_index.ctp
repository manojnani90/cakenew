<div class="users index">
    <div class="form-heading">
	<h2>Roles</h2>
	<?php /*?><a href="<?php echo base_url.'admin/Roles/add'?>" class="add_btn">Add</a><?php */?>
    </div>
    
    <div class="list-view">
	<table width="100%" border="0" cellspacing="1" cellpadding="0">
            <thead>
                <tr>
		   <td align="center" width="30px"><?php echo ('S.No'); ?></td>
		   <td align="center"><?php echo ('Role'); ?></td>
		   <?php /*?><td align="center"><?php echo $this->Paginator->sort('created'); ?></td>
		   <td align="center"><?php echo $this->Paginator->sort('updated'); ?></td><?php */?>
		   <?php /*?><td align="center"class="actions"><?php echo __('Actions'); ?></td><?php */?>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($roles as $role): ?>
	<tr>
		<td align="center"><?php echo h($role['Role']['id']); ?>&nbsp;</td>
		<td align="center"><?php echo h($role['Role']['role']); ?>&nbsp;</td>
		<?php /*?><td><?php echo h($role['Role']['created']); ?>&nbsp;</td>
		<td><?php echo h($role['Role']['updated']); ?>&nbsp;</td><?php */?>
		<?php /*?><td align="center" class="actions">
	          
                  <?php echo $this->Html->link($this->Html->image('/images/view.png'), 
                        array('action' => 'view', $role['Role']['id']), array('escape' => false,'title'=>'View')); ?>
                    
		  <?php echo $this->Html->link($this->Html->image('/images/edit_icon.png'),
                        array('action' => 'edit', $role['Role']['id']), array('escape' => false,'title'=>'Edit'));?>  
                
                  <?php echo $this->Form->postLink($this->Html->image('/images/del_icon.png'),
                array('action' => 'delete', $role['Role']['id']), 
                array('escape' => false,'title'=>'Delete'), __('Are you sure you want to delete # %s?', $role['Role']['id']));?><?php */?> 
                    
                 	
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
		</table>
			
	  </div>
    </div>
	<?php /*?><p>
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
	</div><?php */?>
</div>

