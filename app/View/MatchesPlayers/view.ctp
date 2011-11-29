<div class="matchesPlayers view">
<h2><?php  echo __('Matches Player');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($matchesPlayer['MatchesPlayer']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Match'); ?></dt>
		<dd>
			<?php echo $this->Html->link($matchesPlayer['Match']['id'], array('controller' => 'matches', 'action' => 'view', $matchesPlayer['Match']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Players Team'); ?></dt>
		<dd>
			<?php echo $this->Html->link($matchesPlayer['PlayersTeam']['id'], array('controller' => 'players_teams', 'action' => 'view', $matchesPlayer['PlayersTeam']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Position'); ?></dt>
		<dd>
			<?php echo h($matchesPlayer['MatchesPlayer']['position']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('At Home'); ?></dt>
		<dd>
			<?php echo h($matchesPlayer['MatchesPlayer']['at_home']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Play Time'); ?></dt>
		<dd>
			<?php echo h($matchesPlayer['MatchesPlayer']['play_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('2pts Attempts'); ?></dt>
		<dd>
			<?php echo h($matchesPlayer['MatchesPlayer']['2pts_attempts']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('2pts Scored'); ?></dt>
		<dd>
			<?php echo h($matchesPlayer['MatchesPlayer']['2pts_scored']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('3pts Attempts'); ?></dt>
		<dd>
			<?php echo h($matchesPlayer['MatchesPlayer']['3pts_attempts']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('3pts Scored'); ?></dt>
		<dd>
			<?php echo h($matchesPlayer['MatchesPlayer']['3pts_scored']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rebounds Offensive'); ?></dt>
		<dd>
			<?php echo h($matchesPlayer['MatchesPlayer']['rebounds_offensive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rebounds Defensive'); ?></dt>
		<dd>
			<?php echo h($matchesPlayer['MatchesPlayer']['rebounds_defensive']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Freethrows Attempts'); ?></dt>
		<dd>
			<?php echo h($matchesPlayer['MatchesPlayer']['freethrows_attempts']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Freethrows Scored'); ?></dt>
		<dd>
			<?php echo h($matchesPlayer['MatchesPlayer']['freethrows_scored']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Assists'); ?></dt>
		<dd>
			<?php echo h($matchesPlayer['MatchesPlayer']['assists']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Steals'); ?></dt>
		<dd>
			<?php echo h($matchesPlayer['MatchesPlayer']['steals']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Blocks'); ?></dt>
		<dd>
			<?php echo h($matchesPlayer['MatchesPlayer']['blocks']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fouls'); ?></dt>
		<dd>
			<?php echo h($matchesPlayer['MatchesPlayer']['fouls']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Injury'); ?></dt>
		<dd>
			<?php echo h($matchesPlayer['MatchesPlayer']['injury']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Matches Player'), array('action' => 'edit', $matchesPlayer['MatchesPlayer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Matches Player'), array('action' => 'delete', $matchesPlayer['MatchesPlayer']['id']), null, __('Are you sure you want to delete # %s?', $matchesPlayer['MatchesPlayer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Matches Players'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Matches Player'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Matches'), array('controller' => 'matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Match'), array('controller' => 'matches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players Teams'), array('controller' => 'players_teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Players Team'), array('controller' => 'players_teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
