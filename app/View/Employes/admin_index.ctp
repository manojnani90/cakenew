<div class="users index">
    <div class="form-heading">
	<h2>Employees</h2>
	<a href="<?php echo base_url.'admin/Employes/add'?>" class="add_btn">Add</a>
    </div>
    
    <div class="list-view">
	<table width="100%" border="0" cellspacing="1" cellpadding="0">
            <thead>
		<tr>
			<td align="center" width="30px"><?php echo ('S.No'); ?></td>
                        <td align="center"><?php echo ('Employee Id'); ?></td>
                        <td align="center"><?php echo ('Employee Name'); ?></td>
                        <td align="center"><?php echo ('Company Name'); ?></td>
                        <td align="center"><?php echo ('Card Id'); ?></td>
			<?php /*?><th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('updated'); ?></th><?php */?>
			<td align="center" class="actions"><?php echo __('Actions'); ?></td>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($employes as $employe): ?>
	<tr>
		<td align="center"><?php echo h($employe['Employe']['id']); ?>&nbsp;</td>
		<td align="center"><?php echo h($employe['Employe']['employeid']); ?>&nbsp;</td>
		<td align="center"><?php echo h($employe['Employe']['employe_name']); ?>&nbsp;</td>
		<td align="center">
			<?php echo h($employe['Employe']['company_name']); ?>
		</td>
                <td align="center">
			<?php echo h($employe['Employe']['cardid']); ?>
		</td>
		<?php /*?><td><?php echo h($employe['Employe']['created']); ?>&nbsp;</td>
		<td><?php echo h($employe['Employe']['updated']); ?>&nbsp;</td><?php */?>
		<td class="actions", align="center">
		
		<?php echo $this->Html->link($this->Html->image('/images/view.png'), 
                        array('action' => 'view', $employe['Employe']['id']), array('escape' => false,'title'=>'View')); ?>
                    
                <?php echo $this->Html->link($this->Html->image('/images/edit_icon.png'),
                        array('action' => 'edit', $employe['Employe']['id']), array('escape' => false,'title'=>'Edit'));?>  
                
                 <?php echo $this->Form->postLink($this->Html->image('/images/del_icon.png'),
                array('action' => 'delete', $employe['Employe']['id']), 
                array('escape' => false,'title'=>'Delete'),__('Are you sure you want to delete # %s?', $employe['Employe']['id']));?>    
         	
                    
		</td>
	</tr>
<?php endforeach; ?>
	</tr>
		<tbody>
		</table>
			
	  </div>
  
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php echo $this->Paginator->first('< ' . __('First'), array(), null, array('class' => 'prev disabled'));
		  echo $this->Paginator->prev('< ' . __('Previous'), array(), null, array('class' => 'prev disabled'));
		  echo $this->Paginator->numbers(array('separator' => ''));
		  echo $this->Paginator->next(__('Next') . ' >', array(), null, array('class' => 'next disabled'));
		  echo $this->Paginator->last(__('Last'). ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

