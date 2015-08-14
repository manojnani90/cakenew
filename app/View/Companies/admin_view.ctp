<div class="tactview">
<h2><?php echo __('Company View'); ?></h2>
<table width="100%" border="0" cellspacing="1" cellpadding="0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($company['Company']['id']); ?>
		</td>
	</tr>
	<tr>
		<th><?php echo __('Company Name'); ?></th>
		<td>
			<?php echo h($company['Company']['company_name']); ?>
		</td>
	</tr>
	<tr>
		<th><?php echo __('Created'); ?></th>
		<td>
			<?php echo h($company['Company']['created']); ?>
		</td>
	</tr>
	<tr>
		<th class="last"><?php echo __('Updated'); ?></th>
		<td class="last">
			<?php echo h($company['Company']['updated']); ?>
		</td>
	</tr>
</table>	
</div>

