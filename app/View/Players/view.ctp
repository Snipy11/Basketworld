<div class="players view">
<h2><?php  echo __('Player');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($player['Player']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($player['Country']['id'], array('controller' => 'countries', 'action' => 'view', $player['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($player['Player']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($player['Player']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age'); ?></dt>
		<dd>
			<?php echo h($player['Player']['age']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Height'); ?></dt>
		<dd>
			<?php echo h($player['Player']['height']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Salary'); ?></dt>
		<dd>
			<?php echo h($player['Player']['salary']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Skill'); ?></dt>
		<dd>
			<?php echo h($player['Player']['skill']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shoot'); ?></dt>
		<dd>
			<?php echo h($player['Player']['shoot']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('3points'); ?></dt>
		<dd>
			<?php echo h($player['Player']['3points']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dribble'); ?></dt>
		<dd>
			<?php echo h($player['Player']['dribble']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Assist'); ?></dt>
		<dd>
			<?php echo h($player['Player']['assist']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rebound'); ?></dt>
		<dd>
			<?php echo h($player['Player']['rebound']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Block'); ?></dt>
		<dd>
			<?php echo h($player['Player']['block']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Steal'); ?></dt>
		<dd>
			<?php echo h($player['Player']['steal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Defence'); ?></dt>
		<dd>
			<?php echo h($player['Player']['defence']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fatigue'); ?></dt>
		<dd>
			<?php echo h($player['Player']['fatigue']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Form'); ?></dt>
		<dd>
			<?php echo h($player['Player']['form']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Experience'); ?></dt>
		<dd>
			<?php echo h($player['Player']['experience']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Temperament'); ?></dt>
		<dd>
			<?php echo h($player['Player']['temperament']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Injury'); ?></dt>
		<dd>
			<?php echo h($player['Player']['injury']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Speciality'); ?></dt>
		<dd>
			<?php echo h($player['Player']['speciality']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Player'), array('action' => 'edit', $player['Player']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Player'), array('action' => 'delete', $player['Player']['id']), null, __('Are you sure you want to delete # %s?', $player['Player']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Players'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transferts'), array('controller' => 'transferts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transfert'), array('controller' => 'transferts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Matches Players'), array('controller' => 'matches_players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player In Match'), array('controller' => 'matches_players', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Actions Matches'), array('controller' => 'actions_matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player Actionee'), array('controller' => 'actions_matches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Transferts');?></h3>
	<?php if (!empty($player['Transfert'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Player Id'); ?></th>
		<th><?php echo __('Acquire Team Id'); ?></th>
		<th><?php echo __('Sell Team Id'); ?></th>
		<th><?php echo __('Gm Watch'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Finish Date'); ?></th>
		<th><?php echo __('First Price'); ?></th>
		<th><?php echo __('Current Price'); ?></th>
		<th><?php echo __('Sold'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($player['Transfert'] as $transfert): ?>
		<tr>
			<td><?php echo $transfert['id'];?></td>
			<td><?php echo $transfert['player_id'];?></td>
			<td><?php echo $transfert['acquire_team_id'];?></td>
			<td><?php echo $transfert['sell_team_id'];?></td>
			<td><?php echo $transfert['gm_watch'];?></td>
			<td><?php echo $transfert['created'];?></td>
			<td><?php echo $transfert['finish_date'];?></td>
			<td><?php echo $transfert['first_price'];?></td>
			<td><?php echo $transfert['current_price'];?></td>
			<td><?php echo $transfert['sold'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'transferts', 'action' => 'view', $transfert['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'transferts', 'action' => 'edit', $transfert['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'transferts', 'action' => 'delete', $transfert['id']), null, __('Are you sure you want to delete # %s?', $transfert['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Transfert'), array('controller' => 'transferts', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Matches Players');?></h3>
	<?php if (!empty($player['PlayerInMatch'])):?>
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
		foreach ($player['PlayerInMatch'] as $playerInMatch): ?>
		<tr>
			<td><?php echo $playerInMatch['id'];?></td>
			<td><?php echo $playerInMatch['match_id'];?></td>
			<td><?php echo $playerInMatch['player_id'];?></td>
			<td><?php echo $playerInMatch['position'];?></td>
			<td><?php echo $playerInMatch['at_home'];?></td>
			<td><?php echo $playerInMatch['play_time'];?></td>
			<td><?php echo $playerInMatch['2pts_attempts'];?></td>
			<td><?php echo $playerInMatch['2pts_scored'];?></td>
			<td><?php echo $playerInMatch['3pts_attempts'];?></td>
			<td><?php echo $playerInMatch['3pts_scored'];?></td>
			<td><?php echo $playerInMatch['rebounds_offensive'];?></td>
			<td><?php echo $playerInMatch['rebounds_defensive'];?></td>
			<td><?php echo $playerInMatch['freethrows_attempts'];?></td>
			<td><?php echo $playerInMatch['freethrows_scored'];?></td>
			<td><?php echo $playerInMatch['assists'];?></td>
			<td><?php echo $playerInMatch['steals'];?></td>
			<td><?php echo $playerInMatch['blocks'];?></td>
			<td><?php echo $playerInMatch['fouls'];?></td>
			<td><?php echo $playerInMatch['injury'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'matches_players', 'action' => 'view', $playerInMatch['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'matches_players', 'action' => 'edit', $playerInMatch['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'matches_players', 'action' => 'delete', $playerInMatch['id']), null, __('Are you sure you want to delete # %s?', $playerInMatch['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Player In Match'), array('controller' => 'matches_players', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Actions Matches');?></h3>
	<?php if (!empty($player['PlayerActionee'])):?>
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
		foreach ($player['PlayerActionee'] as $playerActionee): ?>
		<tr>
			<td><?php echo $playerActionee['id'];?></td>
			<td><?php echo $playerActionee['match_id'];?></td>
			<td><?php echo $playerActionee['player1_id'];?></td>
			<td><?php echo $playerActionee['player2_id'];?></td>
			<td><?php echo $playerActionee['action_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'actions_matches', 'action' => 'view', $playerActionee['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'actions_matches', 'action' => 'edit', $playerActionee['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'actions_matches', 'action' => 'delete', $playerActionee['id']), null, __('Are you sure you want to delete # %s?', $playerActionee['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Player Actionee'), array('controller' => 'actions_matches', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Actions Matches');?></h3>
	<?php if (!empty($player['PlayerInvolvedInAction'])):?>
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
		foreach ($player['PlayerInvolvedInAction'] as $playerInvolvedInAction): ?>
		<tr>
			<td><?php echo $playerInvolvedInAction['id'];?></td>
			<td><?php echo $playerInvolvedInAction['match_id'];?></td>
			<td><?php echo $playerInvolvedInAction['player1_id'];?></td>
			<td><?php echo $playerInvolvedInAction['player2_id'];?></td>
			<td><?php echo $playerInvolvedInAction['action_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'actions_matches', 'action' => 'view', $playerInvolvedInAction['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'actions_matches', 'action' => 'edit', $playerInvolvedInAction['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'actions_matches', 'action' => 'delete', $playerInvolvedInAction['id']), null, __('Are you sure you want to delete # %s?', $playerInvolvedInAction['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Player Involved In Action'), array('controller' => 'actions_matches', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Teams');?></h3>
	<?php if (!empty($player['Team'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Division Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Logo'); ?></th>
		<th><?php echo __('Gymnasium Name'); ?></th>
		<th><?php echo __('Places Assises'); ?></th>
		<th><?php echo __('Places Vip'); ?></th>
		<th><?php echo __('Adjoints'); ?></th>
		<th><?php echo __('Attaches'); ?></th>
		<th><?php echo __('Eplucheurs'); ?></th>
		<th><?php echo __('Medecins'); ?></th>
		<th><?php echo __('Kines'); ?></th>
		<th><?php echo __('Chasseurs'); ?></th>
		<th><?php echo __('Stats'); ?></th>
		<th><?php echo __('Confiance'); ?></th>
		<th><?php echo __('Cash'); ?></th>
		<th><?php echo __('Matos'); ?></th>
		<th><?php echo __('Tenues'); ?></th>
		<th><?php echo __('Muscu'); ?></th>
		<th><?php echo __('Supporters'); ?></th>
		<th><?php echo __('Com Politique Gestion'); ?></th>
		<th><?php echo __('Com Ambition'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($player['Team'] as $team): ?>
		<tr>
			<td><?php echo $team['id'];?></td>
			<td><?php echo $team['user_id'];?></td>
			<td><?php echo $team['division_id'];?></td>
			<td><?php echo $team['name'];?></td>
			<td><?php echo $team['logo'];?></td>
			<td><?php echo $team['gymnasium_name'];?></td>
			<td><?php echo $team['places_assises'];?></td>
			<td><?php echo $team['places_vip'];?></td>
			<td><?php echo $team['adjoints'];?></td>
			<td><?php echo $team['attaches'];?></td>
			<td><?php echo $team['eplucheurs'];?></td>
			<td><?php echo $team['medecins'];?></td>
			<td><?php echo $team['kines'];?></td>
			<td><?php echo $team['chasseurs'];?></td>
			<td><?php echo $team['stats'];?></td>
			<td><?php echo $team['confiance'];?></td>
			<td><?php echo $team['cash'];?></td>
			<td><?php echo $team['matos'];?></td>
			<td><?php echo $team['tenues'];?></td>
			<td><?php echo $team['muscu'];?></td>
			<td><?php echo $team['supporters'];?></td>
			<td><?php echo $team['com_politique_gestion'];?></td>
			<td><?php echo $team['com_ambition'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'teams', 'action' => 'view', $team['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'teams', 'action' => 'edit', $team['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'teams', 'action' => 'delete', $team['id']), null, __('Are you sure you want to delete # %s?', $team['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
