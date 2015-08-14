<div class="tactview">
<h2><?php echo __('Employee Stage View'); ?></h2>
	<table width="100%" border="0" cellspacing="1" cellpadding="0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($employeStage['EmployeStage']['id']); ?>
		</td>
	</tr>
        <tr>	
		<th><?php echo __('Stage'); ?></th>
		<td>
			<?php echo h($employeStage['EmployeStage']['stage']); ?>
		</td>
	</tr>
        <tr>	
		<th><?php echo __('EmployeId'); ?></th>
		<td>
			<?php echo h($employeStage['EmployeStage']['employe_id']); ?>
		</td>
	</tr>
        <tr>	
		<th><?php echo __('Company Name'); ?></th>
		<td>
			<?php echo h($employeStage['Employe']['company_name']); ?>
		</td>
	</tr>
	<tr>
		<th><?php echo __('Latitude'); ?></th>
		<td>
			<?php echo h($employeStage['EmployeStage']['latitude']); ?>
			
		</td>
	</tr>
	<tr>
		<th><?php echo __('Longitude'); ?></th>
		<td>
			<?php echo h($employeStage['EmployeStage']['longitude']); ?>
		</td>
	</tr>
    <tr>	 
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($employeStage['EmployeStage']['created']); ?>
		</td>
	  </tr>
      <tr>	  
		<th class="last"><?php echo __('Updated'); ?></th>
		<td class="last">
			<?php echo h($employeStage['EmployeStage']['updated']); ?>
	    </td>
	</tr>	
  </table>
</div>

