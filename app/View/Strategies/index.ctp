<div class="strategies index">
	<h2><?php echo __('Strategies');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('team_id');?></th>
			<th><?php echo $this->Paginator->sort('match_id');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('condition');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($strategies as $strategy): ?>
	<tr>
		<td><?php echo h($strategy['Strategy']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($strategy['Team']['name'], array('controller' => 'teams', 'action' => 'view', $strategy['Team']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($strategy['Match']['id'], array('controller' => 'matches', 'action' => 'view', $strategy['Match']['id'])); ?>
		</td>
		<td><?php echo h($strategy['Strategy']['type']); ?>&nbsp;</td>
		<td><?php echo h($strategy['Strategy']['condition']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $strategy['Strategy']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $strategy['Strategy']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $strategy['Strategy']['id']), null, __('Are you sure you want to delete # %s?', $strategy['Strategy']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Strategy'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Matches'), array('controller' => 'matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Match'), array('controller' => 'matches', 'action' => 'add')); ?> </li>
	</ul>
</div>
