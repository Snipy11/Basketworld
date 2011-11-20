<div class="matchesPlayers index">
	<h2><?php echo __('Matches Players');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('match_id');?></th>
			<th><?php echo $this->Paginator->sort('player_id');?></th>
			<th><?php echo $this->Paginator->sort('position');?></th>
			<th><?php echo $this->Paginator->sort('at_home');?></th>
			<th><?php echo $this->Paginator->sort('play_time');?></th>
			<th><?php echo $this->Paginator->sort('2pts_attempts');?></th>
			<th><?php echo $this->Paginator->sort('2pts_scored');?></th>
			<th><?php echo $this->Paginator->sort('3pts_attempts');?></th>
			<th><?php echo $this->Paginator->sort('3pts_scored');?></th>
			<th><?php echo $this->Paginator->sort('rebounds_offensive');?></th>
			<th><?php echo $this->Paginator->sort('rebounds_defensive');?></th>
			<th><?php echo $this->Paginator->sort('freethrows_attempts');?></th>
			<th><?php echo $this->Paginator->sort('freethrows_scored');?></th>
			<th><?php echo $this->Paginator->sort('assists');?></th>
			<th><?php echo $this->Paginator->sort('steals');?></th>
			<th><?php echo $this->Paginator->sort('blocks');?></th>
			<th><?php echo $this->Paginator->sort('fouls');?></th>
			<th><?php echo $this->Paginator->sort('injury');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($matchesPlayers as $matchesPlayer): ?>
	<tr>
		<td><?php echo h($matchesPlayer['MatchesPlayer']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($matchesPlayer['Match']['id'], array('controller' => 'matches', 'action' => 'view', $matchesPlayer['Match']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($matchesPlayer['Player']['name'], array('controller' => 'players', 'action' => 'view', $matchesPlayer['Player']['id'])); ?>
		</td>
		<td><?php echo h($matchesPlayer['MatchesPlayer']['position']); ?>&nbsp;</td>
		<td><?php echo h($matchesPlayer['MatchesPlayer']['at_home']); ?>&nbsp;</td>
		<td><?php echo h($matchesPlayer['MatchesPlayer']['play_time']); ?>&nbsp;</td>
		<td><?php echo h($matchesPlayer['MatchesPlayer']['2pts_attempts']); ?>&nbsp;</td>
		<td><?php echo h($matchesPlayer['MatchesPlayer']['2pts_scored']); ?>&nbsp;</td>
		<td><?php echo h($matchesPlayer['MatchesPlayer']['3pts_attempts']); ?>&nbsp;</td>
		<td><?php echo h($matchesPlayer['MatchesPlayer']['3pts_scored']); ?>&nbsp;</td>
		<td><?php echo h($matchesPlayer['MatchesPlayer']['rebounds_offensive']); ?>&nbsp;</td>
		<td><?php echo h($matchesPlayer['MatchesPlayer']['rebounds_defensive']); ?>&nbsp;</td>
		<td><?php echo h($matchesPlayer['MatchesPlayer']['freethrows_attempts']); ?>&nbsp;</td>
		<td><?php echo h($matchesPlayer['MatchesPlayer']['freethrows_scored']); ?>&nbsp;</td>
		<td><?php echo h($matchesPlayer['MatchesPlayer']['assists']); ?>&nbsp;</td>
		<td><?php echo h($matchesPlayer['MatchesPlayer']['steals']); ?>&nbsp;</td>
		<td><?php echo h($matchesPlayer['MatchesPlayer']['blocks']); ?>&nbsp;</td>
		<td><?php echo h($matchesPlayer['MatchesPlayer']['fouls']); ?>&nbsp;</td>
		<td><?php echo h($matchesPlayer['MatchesPlayer']['injury']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $matchesPlayer['MatchesPlayer']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $matchesPlayer['MatchesPlayer']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $matchesPlayer['MatchesPlayer']['id']), null, __('Are you sure you want to delete # %s?', $matchesPlayer['MatchesPlayer']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Matches Player'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Matches'), array('controller' => 'matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Match'), array('controller' => 'matches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
	</ul>
</div>
