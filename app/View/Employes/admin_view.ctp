<div class="tactview">
<h2><?php echo __('Employee View'); ?></h2>
<table width="100%" border="0" cellspacing="1" cellpadding="0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($employe['Employe']['id']); ?>
		</td>
	</tr>
	<tr>
		<th><?php echo __('Employeid'); ?></th>
		<td>
			<?php echo h($employe['Employe']['employeid']); ?>
		</td>
	</tr>
	<tr>
		<th><?php echo __('Employe Name'); ?></th>
		<td>
			<?php echo h($employe['Employe']['employe_name']); ?>
		</td>
	</tr>
	<tr>
		<th><?php echo __('Company'); ?></th>
		<td>
			<?php echo h($employe['Employe']['company_name']); ?>
		</td>
	</tr>
        <tr>
		<th><?php echo __('Card Id'); ?></th>
		<td>
			<?php echo h($employe['Employe']['cardid']); ?>
		</td>
	</tr>
	<?php /*?><tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($employe['Employe']['created']); ?>
		</td>
	</tr>
	<tr>
		<th class="last"><?php echo __('Updated'); ?></th>
		<td class="last">
			<?php echo h($employe['Employe']['updated']); ?>
		</td>
	</tr><?php */?>
  </table>
     
	 <div class="form-buttons" style="float: left;margin-top: 12px;margin-left: 442px;">
       <?php echo $this->Html->link('Back', array('controller' => 'Employes','action'=> 'index'), 
               array( 'class' => 'button'));?>
     </div>
 	
</div>

