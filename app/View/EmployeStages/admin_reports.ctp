<div class="users index">
<?php echo $this->element('reports'); ?>
    
    <div class="list-view">
	<table width="100%" border="0" cellspacing="1" cellpadding="0">
            <thead>
	<tr>
	     
             <td align="center"><?php echo ('Employee Id'); ?></td>
             <td align="center"><?php echo ('Employee Name'); ?></td>
             <td align="center"><?php echo ('Company Name'); ?></td>
             <td align="center"><?php echo ('Card Id'); ?></td>
             <td align="center" width="30"><?php echo ('Bus Stop'); ?></td>            
	     <td align="center"><?php echo ('Latitude'); ?></td>
	     <td align="center"><?php echo ('Longitude'); ?></td>
             <td align="center"><?php echo ('Date'); ?></td>
	     <td align="center"><?php echo ('Status'); ?></td>
             <?php /*?><th><?php echo $this->Paginator->sort('created'); ?></th>
	     <th><?php echo $this->Paginator->sort('updated'); ?></th><?php */?>
	     
	</tr>
	</thead>
	<tbody>
            
	<?php foreach ($employeStages as $employeStage): ?>
	<tr>
		
                <td align="center"><?php echo h($employeStage['EmployeStage']['employeid']); ?></td>
                <td align="center"><?php echo h($employeStage['Employe']['employe_name']); ?></td>
                <td align="center" width="60"><?php echo h($employeStage['Employe']['company_name']); ?>&nbsp;</td>
                <td align="center"><?php echo h($employeStage['Employe']['cardid']); ?>&nbsp;</td>
                <td align="center" width="40"><?php echo h($employeStage['EmployeStage']['stage']); ?>&nbsp;</td>               
		<td align="center"><?php echo h($employeStage['EmployeStage']['latitude']); ?>&nbsp;</td>
		<td align="center"><?php echo h($employeStage['EmployeStage']['longitude']); ?>&nbsp;</td>
                <td align="center"><?php echo date("d-m-Y H:i:s", strtotime($employeStage['EmployeStage']['date'])); ?>&nbsp;</td>
		<td align="center"><?php echo h($employeStage['EmployeStage']['status']); ?>&nbsp;</td>
                <?php /*?><td><?php echo h($employeStage['EmployeStage']['created']); ?>&nbsp;</td>
		<td><?php echo h($employeStage['EmployeStage']['updated']); ?>&nbsp;</td><?php */?>
		
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
	?>	
        </p>
	<div class="paging">
	<?php   echo $this->Paginator->first('< ' . __('First'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->prev('< ' . __('Previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('Next') . ' >', array(), null, array('class' => 'next disabled'));
                echo $this->Paginator->last(__('Last'). ' >', array(), null, array('class' => 'next disabled'));
        ?>
	</div>

</div>
