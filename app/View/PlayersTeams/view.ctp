<div class="playersTeams view">
<h2><?php  echo __('Players Team');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($playersTeam['PlayersTeam']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Team'); ?></dt>
		<dd>
			<?php echo $this->Html->link($playersTeam['Team']['name'], array('controller' => 'teams', 'action' => 'view', $playersTeam['Team']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Player'); ?></dt>
		<dd>
			<?php echo $this->Html->link($playersTeam['Player']['name'], array('controller' => 'players', 'action' => 'view', $playersTeam['Player']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Players Team'), array('action' => 'edit', $playersTeam['PlayersTeam']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Players Team'), array('action' => 'delete', $playersTeam['PlayersTeam']['id']), null, __('Are you sure you want to delete # %s?', $playersTeam['PlayersTeam']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Players Teams'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Players Team'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Matches Players'), array('controller' => 'matches_players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Matches Player'), array('controller' => 'matches_players', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Matches Players');?></h3>
	<?php if (!empty($playersTeam['MatchesPlayer'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Match Id'); ?></th>
		<th><?php echo __('Players Team Id'); ?></th>
		<th><?php echo __('Position'); ?></th>
		<th><?php echo __('At Home'); ?></th>
		<th><?php echo __('Play Time'); ?></th>
		<th><?php echo __('2pts Attempts'); ?></th>
		<th><?php echo __('2pts Scored'); ?></th>
		<th><?php echo __('3pts Attempts'); ?></th>
		<th><?php echo __('3pts Scored'); ?></th>
		<th><?php echo __('Rebounds Offensive'); ?></th>
		<th><?php echo __('Rebounds Defensive'); ?></th>
		<th><?php echo __('Freethrows Attempts'); ?></th>
		<th><?php echo __('Freethrows Scored'); ?></th>
		<th><?php echo __('Assists'); ?></th>
		<th><?php echo __('Steals'); ?></th>
		<th><?php echo __('Blocks'); ?></th>
		<th><?php echo __('Fouls'); ?></th>
		<th><?php echo __('Injury'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($playersTeam['MatchesPlayer'] as $matchesPlayer): ?>
		<tr>
			<td><?php echo $matchesPlayer['id'];?></td>
			<td><?php echo $matchesPlayer['match_id'];?></td>
			<td><?php echo $matchesPlayer['players_team_id'];?></td>
			<td><?php echo $matchesPlayer['position'];?></td>
			<td><?php echo $matchesPlayer['at_home'];?></td>
			<td><?php echo $matchesPlayer['play_time'];?></td>
			<td><?php echo $matchesPlayer['2pts_attempts'];?></td>
			<td><?php echo $matchesPlayer['2pts_scored'];?></td>
			<td><?php echo $matchesPlayer['3pts_attempts'];?></td>
			<td><?php echo $matchesPlayer['3pts_scored'];?></td>
			<td><?php echo $matchesPlayer['rebounds_offensive'];?></td>
			<td><?php echo $matchesPlayer['rebounds_defensive'];?></td>
			<td><?php echo $matchesPlayer['freethrows_attempts'];?></td>
			<td><?php echo $matchesPlayer['freethrows_scored'];?></td>
			<td><?php echo $matchesPlayer['assists'];?></td>
			<td><?php echo $matchesPlayer['steals'];?></td>
			<td><?php echo $matchesPlayer['blocks'];?></td>
			<td><?php echo $matchesPlayer['fouls'];?></td>
			<td><?php echo $matchesPlayer['injury'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'matches_players', 'action' => 'view', $matchesPlayer['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'matches_players', 'action' => 'edit', $matchesPlayer['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'matches_players', 'action' => 'delete', $matchesPlayer['id']), null, __('Are you sure you want to delete # %s?', $matchesPlayer['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Matches Player'), array('controller' => 'matches_players', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
