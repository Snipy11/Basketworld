<div class="trainers index">
	<h2><?php echo __('Trainers');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('team_id');?></th>
			<th><?php echo $this->Paginator->sort('first_name');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('age');?></th>
			<th><?php echo $this->Paginator->sort('country_id');?></th>
			<th><?php echo $this->Paginator->sort('level');?></th>
			<th><?php echo $this->Paginator->sort('style');?></th>
			<th><?php echo $this->Paginator->sort('salary');?></th>
			<th><?php echo $this->Paginator->sort('price');?></th>
			<th><?php echo $this->Paginator->sort('available');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($trainers as $trainer): ?>
	<tr>
		<td><?php echo h($trainer['Trainer']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($trainer['Team']['name'], array('controller' => 'teams', 'action' => 'view', $trainer['Team']['id'])); ?>
		</td>
		<td><?php echo h($trainer['Trainer']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($trainer['Trainer']['name']); ?>&nbsp;</td>
		<td><?php echo h($trainer['Trainer']['age']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($trainer['Country']['country'], array('controller' => 'countries', 'action' => 'view', $trainer['Country']['id'])); ?>
		</td>
		<td><?php echo h($trainer['Trainer']['level']); ?>&nbsp;</td>
		<td><?php echo h($trainer['Trainer']['style']); ?>&nbsp;</td>
		<td><?php echo h($trainer['Trainer']['salary']); ?>&nbsp;</td>
		<td><?php echo h($trainer['Trainer']['price']); ?>&nbsp;</td>
		<td><?php echo h($trainer['Trainer']['available']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $trainer['Trainer']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $trainer['Trainer']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $trainer['Trainer']['id']), null, __('Are you sure you want to delete # %s?', $trainer['Trainer']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Trainer'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
