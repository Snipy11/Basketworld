<div class="matchesPlayers form">
<?php echo $this->Form->create('playersTeams');?>
	<fieldset>
		<legend><?php echo __('Add Matches Player'); ?></legend>
	<?php
		echo $this->Form->input('match_id');
		echo $this->Form->input('players_team_id');
		echo $this->Form->input('position', array('options' => MatchesPlayer::positions() ));
		echo $this->Form->input('at_home');
		echo $this->Form->input('play_time');
		echo $this->Form->input('2pts_attempts');
		echo $this->Form->input('2pts_scored');
		echo $this->Form->input('3pts_attempts');
		echo $this->Form->input('3pts_scored');
		echo $this->Form->input('rebounds_offensive');
		echo $this->Form->input('rebounds_defensive');
		echo $this->Form->input('freethrows_attempts');
		echo $this->Form->input('freethrows_scored');
		echo $this->Form->input('assists');
		echo $this->Form->input('steals');
		echo $this->Form->input('blocks');
		echo $this->Form->input('fouls');
		echo $this->Form->input('injury');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Matches Players'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Matches'), array('controller' => 'matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Match'), array('controller' => 'matches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players Teams'), array('controller' => 'players_teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Players Team'), array('controller' => 'players_teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
