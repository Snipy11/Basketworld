<div class="matches index">
	<h2><?php echo __('Matches');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('home_team_id');?></th>
			<th><?php echo $this->Paginator->sort('visitor_team_id');?></th>
			<th><?php echo $this->Paginator->sort('start_date');?></th>
			<th><?php echo $this->Paginator->sort('home_points');?></th>
			<th><?php echo $this->Paginator->sort('visitor_points');?></th>
			<th><?php echo $this->Paginator->sort('normal_spectators');?></th>
			<th><?php echo $this->Paginator->sort('vip_spectators');?></th>
			<th><?php echo $this->Paginator->sort('finished');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($matches as $match): ?>
	<tr>
		<td><?php echo h($match['Match']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($match['HomeTeam']['name'], array('controller' => 'teams', 'action' => 'view', $match['HomeTeam']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($match['VisitorTeam']['name'], array('controller' => 'teams', 'action' => 'view', $match['VisitorTeam']['id'])); ?>
		</td>
		<td><?php echo h($match['Match']['start_date']); ?>&nbsp;</td>
		<td><?php echo h($match['Match']['home_points']); ?>&nbsp;</td>
		<td><?php echo h($match['Match']['visitor_points']); ?>&nbsp;</td>
		<td><?php echo h($match['Match']['normal_spectators']); ?>&nbsp;</td>
		<td><?php echo h($match['Match']['vip_spectators']); ?>&nbsp;</td>
		<td><?php echo h($match['Match']['finished']); ?>&nbsp;</td>
		<td><?php echo h($match['Match']['type']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $match['Match']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $match['Match']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $match['Match']['id']), null, __('Are you sure you want to delete # %s?', $match['Match']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Match'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Simulate match'), array('action' => 'simulate')); ?> </li>
        <li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Home Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Strategies'), array('controller' => 'strategies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Strategy'), array('controller' => 'strategies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Grades Matches'), array('controller' => 'grades_matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grading'), array('controller' => 'grades_matches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Matches Players'), array('controller' => 'matches_players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Players In Match'), array('controller' => 'matches_players', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Actions Matches'), array('controller' => 'actions_matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Actions In Match'), array('controller' => 'actions_matches', 'action' => 'add')); ?> </li>
	</ul>
</div>
