<div class="users index">
    <div class="form-heading">
	<h2>Companies</h2>
	<a href="<?php echo base_url.'admin/Companies/add'?>" class="add_btn">Add</a>
    </div>
    
    <div class="list-view">
	<table width="100%" border="0" cellspacing="1" cellpadding="0">
            <thead>
                <tr>
                    <td align="center" width="30px"><?php echo ('S.No'); ?></td>
		    <td align="center"><?php echo ('Company Name'); ?></td>
                    <?php /*?><td align="center"><?php echo $this->Paginator->sort('created'); ?></td>
                    <td align="center"><?php echo $this->Paginator->sort('updated'); ?></td><?Php */?>
		   <td class="actions" align="center"><?php echo __('Actions'); ?></td>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($companies as $company): ?>
	<tr>
		<td align="center"><?php echo h($company['Company']['id']); ?>&nbsp;</td>
		<td align="center"><?php echo h($company['Company']['company_name']); ?>&nbsp;</td>
		<?php /*?><td align="center"><?php echo h($company['Company']['created']); ?>&nbsp;</td>
		<td align="center"><?php echo h($company['Company']['updated']); ?>&nbsp;</td><?php */?>
		<td class="actions" align="center">
		 
		 
                 <?php echo $this->Html->link($this->Html->image('/images/view.png'), 
                        array('action' => 'view', $company['Company']['id']), array('escape' => false,'title'=>'View')); ?>
                    
                 <?php echo $this->Html->link($this->Html->image('/images/edit_icon.png'),
                        array('action' => 'edit', $company['Company']['id']), array('escape' => false,'title'=>'Edit'));?>  
                
                 <?php echo $this->Html->link($this->Html->image('/images/del_icon.png'),
                array('action' => 'delete', $company['Company']['id']),
                array('escape' => false,'title'=>'Delete'), __('Are you sure you want to delete # %s?', $company['Company']['id']));?>
              
         
		</td>
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
	?>	
        </p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>

