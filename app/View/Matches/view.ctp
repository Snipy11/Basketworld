<div class="matches view">
<h2><?php  echo __('Match');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($match['Match']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Home Team'); ?></dt>
		<dd>
			<?php echo $this->Html->link($match['HomeTeam']['name'], array('controller' => 'teams', 'action' => 'view', $match['HomeTeam']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Visitor Team'); ?></dt>
		<dd>
			<?php echo $this->Html->link($match['VisitorTeam']['name'], array('controller' => 'teams', 'action' => 'view', $match['VisitorTeam']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Date'); ?></dt>
		<dd>
			<?php echo h($match['Match']['start_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Home Points'); ?></dt>
		<dd>
			<?php echo h($match['Match']['home_points']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Visitor Points'); ?></dt>
		<dd>
			<?php echo h($match['Match']['visitor_points']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Normal Spectators'); ?></dt>
		<dd>
			<?php echo h($match['Match']['normal_spectators']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vip Spectators'); ?></dt>
		<dd>
			<?php echo h($match['Match']['vip_spectators']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Finished'); ?></dt>
		<dd>
			<?php echo h($match['Match']['finished']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($match['Match']['type']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Simulate'), array('action' => 'simulate', $match['Match']['id'])); ?></li>
        <li><?php echo $this->Html->link(__('Edit Match'), array('action' => 'edit', $match['Match']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Match'), array('action' => 'delete', $match['Match']['id']), null, __('Are you sure you want to delete # %s?', $match['Match']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Matches'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Match'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Strategies');?></h3>
	<?php if (!empty($match['Strategy'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Team Id'); ?></th>
		<th><?php echo __('Match Id'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Condition'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($match['Strategy'] as $strategy): ?>
		<tr>
			<td><?php echo $strategy['id'];?></td>
			<td><?php echo $strategy['team_id'];?></td>
			<td><?php echo $strategy['match_id'];?></td>
			<td><?php echo $strategy['type'];?></td>
			<td><?php echo $strategy['condition'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'strategies', 'action' => 'view', $strategy['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'strategies', 'action' => 'edit', $strategy['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'strategies', 'action' => 'delete', $strategy['id']), null, __('Are you sure you want to delete # %s?', $strategy['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Strategy'), array('controller' => 'strategies', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Grades Matches');?></h3>
	<?php if (!empty($match['Grading'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Match Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Grade'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($match['Grading'] as $grading): ?>
		<tr>
			<td><?php echo $grading['id'];?></td>
			<td><?php echo $grading['match_id'];?></td>
			<td><?php echo $grading['user_id'];?></td>
			<td><?php echo $grading['grade'];?></td>
			<td><?php echo $grading['created'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'grades_matches', 'action' => 'view', $grading['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'grades_matches', 'action' => 'edit', $grading['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'grades_matches', 'action' => 'delete', $grading['id']), null, __('Are you sure you want to delete # %s?', $grading['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Grading'), array('controller' => 'grades_matches', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Matches Players');?></h3>
	<?php if (!empty($match['PlayersInMatch'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Match Id'); ?></th>
		<th><?php echo __('Player Id'); ?></th>
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
		foreach ($match['PlayersInMatch'] as $playersInMatch): ?>
		<tr>
			<td><?php echo $playersInMatch['id'];?></td>
			<td><?php echo $playersInMatch['match_id'];?></td>
			<td><?php echo $playersInMatch['players_team_id'];?></td>
			<td><?php echo $playersInMatch['position'];?></td>
			<td><?php echo $playersInMatch['at_home'];?></td>
			<td><?php echo $playersInMatch['play_time'];?></td>
			<td><?php echo $playersInMatch['2pts_attempts'];?></td>
			<td><?php echo $playersInMatch['2pts_scored'];?></td>
			<td><?php echo $playersInMatch['3pts_attempts'];?></td>
			<td><?php echo $playersInMatch['3pts_scored'];?></td>
			<td><?php echo $playersInMatch['rebounds_offensive'];?></td>
			<td><?php echo $playersInMatch['rebounds_defensive'];?></td>
			<td><?php echo $playersInMatch['freethrows_attempts'];?></td>
			<td><?php echo $playersInMatch['freethrows_scored'];?></td>
			<td><?php echo $playersInMatch['assists'];?></td>
			<td><?php echo $playersInMatch['steals'];?></td>
			<td><?php echo $playersInMatch['blocks'];?></td>
			<td><?php echo $playersInMatch['fouls'];?></td>
			<td><?php echo $playersInMatch['injury'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'matches_players', 'action' => 'view', $playersInMatch['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'matches_players', 'action' => 'edit', $playersInMatch['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'matches_players', 'action' => 'delete', $playersInMatch['id']), null, __('Are you sure you want to delete # %s?', $playersInMatch['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Players In Match'), array('controller' => 'matches_players', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Actions Matches');?></h3>
	<?php if (!empty($match['ActionsInMatch'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Match Id'); ?></th>
		<th><?php echo __('Player1 Id'); ?></th>
		<th><?php echo __('Player2 Id'); ?></th>
		<th><?php echo __('Action Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($match['ActionsInMatch'] as $actionsInMatch): ?>
		<tr>
			<td><?php echo $actionsInMatch['id'];?></td>
			<td><?php echo $actionsInMatch['match_id'];?></td>
			<td><?php echo $actionsInMatch['player1_id'];?></td>
			<td><?php echo $actionsInMatch['player2_id'];?></td>
			<td><?php echo $actionsInMatch['action_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'actions_matches', 'action' => 'view', $actionsInMatch['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'actions_matches', 'action' => 'edit', $actionsInMatch['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'actions_matches', 'action' => 'delete', $actionsInMatch['id']), null, __('Are you sure you want to delete # %s?', $actionsInMatch['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Actions In Match'), array('controller' => 'actions_matches', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
