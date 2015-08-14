<div class="users index">
    <div class="form-heading">
	<h2>Employee Stages</h2>
	
    </div>
    
    <div class="list-view">
	<table width="100%" border="0" cellspacing="1" cellpadding="0">
            <thead>
	<tr>
	     <td align="center" width="30px"><?php echo ('S.No'); ?></td>
             <td align="center"><?php echo ('Bus Stop'); ?></td>
             <td align="center"><?php echo ('Employee Id'); ?></td>
             
	     <td align="center"><?php echo ('Latitude'); ?></td>
	     <td align="center"><?php echo ('Longitude'); ?></td>
             <td align="center"><?php echo ('Date'); ?></td>
	     <td align="center"><?php echo ('Status'); ?></td>
             <?php /*?><th><?php echo $this->Paginator->sort('created'); ?></th>
	     <th><?php echo $this->Paginator->sort('updated'); ?></th><?php */?>
	     <?php /*?><td align="center" class="actions"><?php echo __('Actions'); ?></td><?php */?>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($employeStages as $employeStage): ?>
	<tr>    
                <td align="center"><?php echo h($employeStage['EmployeStage']['id']); ?>&nbsp;</td>
		<td align="center"><?php echo h($employeStage['EmployeStage']['stage']); ?>&nbsp;</td>
                
                <td align="center">
			<?php echo h($employeStage['EmployeStage']['employeid']); ?>
		</td>
               
		<td align="center"><?php echo h($employeStage['EmployeStage']['latitude']); ?>&nbsp;</td>
		<td align="center"><?php echo h($employeStage['EmployeStage']['longitude']); ?>&nbsp;</td>
		
       <td align="center"><?php echo date("d-m-Y H:i:s", strtotime($employeStage['EmployeStage']['date'])); ?>&nbsp;</td>
		<td align="center"><?php echo h($employeStage['EmployeStage']['status']); ?>&nbsp;</td>
                <?php /*?><td><?php echo h($employeStage['EmployeStage']['created']); ?>&nbsp;</td>
		<td><?php echo h($employeStage['EmployeStage']['updated']); ?>&nbsp;</td><?php */?>
		<?php /*?><td class="actions" align="center">
	         
		 		<?php echo $this->Html->link($this->Html->image('/images/view.png'), 
                        array('action' => 'view', $employeStage['EmployeStage']['id']), array('escape' => false,'title'=>'View')); ?>
                    
                 <?php echo $this->Html->link($this->Html->image('/images/edit_icon.png'),
                        array('action' => 'edit', $employeStage['EmployeStage']['id']), array('escape' => false,'title'=>'Edit'));?>  
                
                 <?php echo $this->Form->postLink($this->Html->image('/images/del_icon.png'),
                array('action' => 'delete', $employeStage['EmployeStage']['id']), 
                array('escape' => false,'title'=>'Delete'), __('Are you sure you want to delete # %s?', $employeStage['EmployeStage']['id']));?><?php */?>   
                         
		</td>
	</tr>
<?php endforeach; ?>
	
		</tbody>
		</table>
			
	  </div>
   
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php   echo $this->Paginator->first(__('First', true), array('class' => 'disabled'));
		echo $this->Paginator->prev('< ' . __('Previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Next') . ' >', array(), null, array('class' => 'next disabled'));
                echo $this->Paginator->last(__('Last', true), array('class' => 'disabled'));
	?>
	</div>
</div>

