<div class="players index">
	<h2><?php echo __('Players');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('country_id');?></th>
			<th><?php echo $this->Paginator->sort('first_name');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('age');?></th>
			<th><?php echo $this->Paginator->sort('height');?></th>
			<th><?php echo $this->Paginator->sort('salary');?></th>
			<th><?php echo $this->Paginator->sort('spirit');?></th>
			<th><?php echo $this->Paginator->sort('injury');?></th>
			<th><?php echo $this->Paginator->sort('speciality');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($players as $player): ?>
	<tr>
		<td><?php echo h($player['Player']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($player['Country']['country'], array('controller' => 'countries', 'action' => 'view', $player['Country']['id'])); ?>
		</td>
		<td><?php echo h($player['Player']['first_name']); ?>&nbsp;</td>
		<td><?php echo h($player['Player']['name']); ?>&nbsp;</td>
		<td><?php echo h($player['Player']['age']); ?>&nbsp;</td>
		<td><?php echo h($player['Player']['height']); ?>&nbsp;</td>
		<td><?php echo h($player['Player']['salary']); ?>&nbsp;</td>
		<td><?php echo h(Player::spirits($player['Player']['spirit'])); ?>&nbsp;</td>
		<td><?php echo h($player['Player']['injury']); ?>&nbsp;</td>
		<td><?php echo h(Player::specialities($player['Player']['speciality'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $player['Player']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $player['Player']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $player['Player']['id']), null, __('Are you sure you want to delete # %s?', $player['Player']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Player'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transferts'), array('controller' => 'transferts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transfert'), array('controller' => 'transferts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Actions Matches'), array('controller' => 'actions_matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player Actionee'), array('controller' => 'actions_matches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players Teams'), array('controller' => 'players_teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player In Team'), array('controller' => 'players_teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
