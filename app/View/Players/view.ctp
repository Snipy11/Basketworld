<div class="players view">
<h2><?php  echo __('Player');?></h2>
	<dl>
		<dt><?php echo __('Pays'); ?></dt>
		<dd>
			<?php echo $this->Html->link($player['Country']['country'], array('controller' => 'countries', 'action' => 'view', $player['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo $player['Player']['first_name']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo $player['Player']['name']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age'); ?></dt>
		<dd>
			<?php echo $player['Player']['age']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Height'); ?></dt>
		<dd>
			<?php echo $player['Player']['height']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Salary'); ?></dt>
		<dd>
			<?php echo $player['Player']['salary']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Skill'); ?></dt>
		<dd>
			<?php echo $player['PlayerSkill']['skill']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shoot'); ?></dt>
		<dd>
			<?php echo $player['PlayerSkill']['shoot']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('3points'); ?></dt>
		<dd>
			<?php echo $player['PlayerSkill']['3points']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dribble'); ?></dt>
		<dd>
			<?php echo $player['PlayerSkill']['dribble']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Assist'); ?></dt>
		<dd>
			<?php echo $player['PlayerSkill']['assist']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rebound'); ?></dt>
		<dd>
			<?php echo $player['PlayerSkill']['rebound']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Block'); ?></dt>
		<dd>
			<?php echo $player['PlayerSkill']['block']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Steal'); ?></dt>
		<dd>
			<?php echo $player['PlayerSkill']['steal']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Defense'); ?></dt>
		<dd>
			<?php echo $player['PlayerSkill']['defense']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Form'); ?></dt>
		<dd>
			<?php echo $player['PlayerSkill']['form']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Experience'); ?></dt>
		<dd>
			<?php echo $player['PlayerSkill']['experience']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Spirit'); ?></dt>
		<dd>
			<?php echo Player::spirits($player['Player']['spirit']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Injury'); ?></dt>
		<dd>
			<?php echo $player['Player']['injury']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Speciality'); ?></dt>
		<dd>
			<?php echo Player::specialities($player['Player']['speciality']); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Dernier match'); ?></dt>
		<dd>
			<?php echo $lastMatch['Match']['start_date'] ." : ". 
                $lastMatch['HomeTeam']['name'] ." - ". $lastMatch['VisitorTeam']['name']; ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Meilleur match'); ?></dt>
		<dd>
			<?php echo $bestMatch['Match']['start_date'] ." : ". 
                $bestMatch['HomeTeam']['name'] ." - ". $bestMatch['VisitorTeam']['name']; ?>
			&nbsp;
		</dd>
	</dl>
<h2><?php  echo __('Statistiques de la saison en cours');?></h2>
    <?php if(!empty($seasonStats[0]['2pts_attempts'])): ?>
        <dl>
            <dt><?php echo __('Tir 2pts tentés'); ?></dt>
            <dd><?php echo $seasonStats[0]['2pts_attempts'] ?></dd>
            <dt><?php echo __('Tir 2pts marqués'); ?></dt>
            <dd><?php echo $seasonStats[0]['2pts_scored'] ?></dd>
            <dt><?php echo __('Tir 3pts tentés'); ?></dt>
            <dd><?php echo $seasonStats[0]['3pts_attempts'] ?></dd>
            <dt><?php echo __('Tir 3pts marqués'); ?></dt>
            <dd><?php echo $seasonStats[0]['3pts_scored'] ?></dd>
            <dt><?php echo __('Rebonds offensifs'); ?></dt>
            <dd><?php echo $seasonStats[0]['rebounds_offensive'] ?></dd>
            <dt><?php echo __('Rebonds défensifs'); ?></dt>
            <dd><?php echo $seasonStats[0]['rebounds_defensive'] ?></dd>
            <dt><?php echo __('Lancer-francs tentés'); ?></dt>
            <dd><?php echo $seasonStats[0]['freethrows_attempts'] ?></dd>
            <dt><?php echo __('Lancer-francs marqués'); ?></dt>
            <dd><?php echo $seasonStats[0]['freethrows_scored'] ?></dd>
            <dt><?php echo __('Passes décisives'); ?></dt>
            <dd><?php echo $seasonStats[0]['assists'] ?></dd>
            <dt><?php echo __('Interception'); ?></dt>
            <dd><?php echo $seasonStats[0]['steals'] ?></dd>
            <dt><?php echo __('Contres'); ?></dt>
            <dd><?php echo $seasonStats[0]['blocks'] ?></dd>
            <dt><?php echo __('Pertes de balles'); ?></dt>
            <dd><?php echo $seasonStats[0]['turnovers'] ?></dd>
            <dt><?php echo __('Evaluation globale'); ?></dt>
            <dd><?php echo $seasonStats[0]['evaluation'] ?></dd>
        </dl>
    <?php else: ?>
        <?php echo __("Aucune statistique pour la saison en cours..."); ?>
    <?php endif; ?>
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
		<li><?php echo $this->Html->link(__('List Actions Matches'), array('controller' => 'actions_matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player Actionee'), array('controller' => 'actions_matches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players Teams'), array('controller' => 'players_teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player In Team'), array('controller' => 'players_teams', 'action' => 'add')); ?> </li>
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
	<h3><?php echo __('Related Players Teams');?></h3>
	<?php if (!empty($player['PlayerInTeam'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Team Id'); ?></th>
		<th><?php echo __('Player Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($player['PlayerInTeam'] as $playerInTeam): ?>
		<tr>
			<td><?php echo $playerInTeam['id'];?></td>
			<td><?php echo $playerInTeam['team_id'];?></td>
			<td><?php echo $playerInTeam['player_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'players_teams', 'action' => 'view', $playerInTeam['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'players_teams', 'action' => 'edit', $playerInTeam['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'players_teams', 'action' => 'delete', $playerInTeam['id']), null, __('Are you sure you want to delete # %s?', $playerInTeam['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Player In Team'), array('controller' => 'players_teams', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
