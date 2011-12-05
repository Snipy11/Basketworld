<div class="seasons form">
<?php echo $this->Form->create('Season');?>
	<fieldset>
		<legend><?php echo __('Add Season'); ?></legend>
	<?php
		echo $this->Form->input('year', array('type' => 'text') );
		echo $this->Form->input('start_date');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>

<div class="related">
	<h3><?php echo __('Related Divisions');?></h3>
	<?php if (!empty($season['Division'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Hierarchy'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Season Id'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($season['Division'] as $division): ?>
		<tr>
			<td><?php echo $division['id'];?></td>
			<td><?php echo $division['hierarchy'];?></td>
			<td><?php echo $division['name'];?></td>
			<td><?php echo $division['country_id'];?></td>
			<td><?php echo $division['season_id'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>

</div>

<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Seasons'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Divisions'), array('controller' => 'divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Division'), array('controller' => 'divisions', 'action' => 'add')); ?> </li>
	</ul>
</div>
