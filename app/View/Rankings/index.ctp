<div class="rankings index">
	<h2><?php echo __('Classement');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('division_id');?></th>
			<th><?php echo $this->Paginator->sort('team_id');?></th>
			<th><?php echo $this->Paginator->sort('points');?></th>
			<th><?php echo $this->Paginator->sort('played');?></th>
			<th><?php echo $this->Paginator->sort('victories');?></th>
			<th><?php echo $this->Paginator->sort('defeats');?></th>
			<th><?php echo $this->Paginator->sort('points_scored');?></th>
			<th><?php echo $this->Paginator->sort('points_against');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($rankings as $ranking): ?>
	<tr>
		<td><?php echo h($ranking['Ranking']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($ranking['Division']['name'], array('controller' => 'divisions', 'action' => 'view', $ranking['Division']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($ranking['Team']['name'], array('controller' => 'teams', 'action' => 'view', $ranking['Team']['id'])); ?>
		</td>
		<td><?php echo h($ranking['Ranking']['points']); ?>&nbsp;</td>
		<td><?php echo h($ranking['Ranking']['played']); ?>&nbsp;</td>
		<td><?php echo h($ranking['Ranking']['victories']); ?>&nbsp;</td>
		<td><?php echo h($ranking['Ranking']['defeats']); ?>&nbsp;</td>
		<td><?php echo h($ranking['Ranking']['points_scored']); ?>&nbsp;</td>
		<td><?php echo h($ranking['Ranking']['points_against']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $ranking['Ranking']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $ranking['Ranking']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ranking['Ranking']['id']), null, __('Are you sure you want to delete # %s?', $ranking['Ranking']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Ranking'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Divisions'), array('controller' => 'divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Division'), array('controller' => 'divisions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
