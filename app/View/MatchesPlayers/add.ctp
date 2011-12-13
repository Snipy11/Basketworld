<div class="matchesPlayers form">
<?php echo $this->Form->create('MatchesPlayer');?>
	<fieldset>
		<legend><?php echo __('Add Matches Player'); ?></legend>
		<fieldset>
			<legend><?php echo MatchesPlayer::positions(MatchesPlayer::MENEUR); ?></legend>
	<?php
		echo $this->Form->input('MatchesPlayer.0.match_id', array('type' => 'hidden', 'value' => $match_id));
		echo $this->Form->input('MatchesPlayer.0.players_team_id', array('label' => __('Joueur')));
		echo $this->Form->input('MatchesPlayer.0.position', array('type' => 'hidden', 'value' => MatchesPlayer::MENEUR));
	?>
		</fieldset>
		<fieldset>
			<legend><?php echo MatchesPlayer::positions(MatchesPlayer::ARRIERE); ?></legend>
	<?php
		echo $this->Form->input('MatchesPlayer.1.match_id', array('type' => 'hidden', 'value' => $match_id));
		echo $this->Form->input('MatchesPlayer.1.players_team_id', array('label' => __('Joueur')));
		echo $this->Form->input('MatchesPlayer.1.position', array('type' => 'hidden', 'value' => MatchesPlayer::ARRIERE));
	?>
		</fieldset>
		<fieldset>
			<legend><?php echo MatchesPlayer::positions(MatchesPlayer::AILIER_SHOOTER); ?></legend>
	<?php
		echo $this->Form->input('MatchesPlayer.2.match_id', array('type' => 'hidden', 'value' => $match_id));
		echo $this->Form->input('MatchesPlayer.2.players_team_id', array('label' => __('Joueur')));
		echo $this->Form->input('MatchesPlayer.2.position', array('type' => 'hidden', 'value' => MatchesPlayer::AILIER_SHOOTER));
	?>
		</fieldset>
		<fieldset>
			<legend><?php echo MatchesPlayer::positions(MatchesPlayer::AILIER_FORT); ?></legend>
	<?php
		echo $this->Form->input('MatchesPlayer.3.match_id', array('type' => 'hidden', 'value' => $match_id));
		echo $this->Form->input('MatchesPlayer.3.players_team_id', array('label' => __('Joueur')));
		echo $this->Form->input('MatchesPlayer.3.position', array('type' => 'hidden', 'value' => MatchesPlayer::AILIER_FORT));
	?>
		</fieldset>
		<fieldset>
			<legend><?php echo MatchesPlayer::positions(MatchesPlayer::PIVOT); ?></legend>
	<?php
		echo $this->Form->input('MatchesPlayer.4.match_id', array('type' => 'hidden', 'value' => $match_id));
		echo $this->Form->input('MatchesPlayer.4.players_team_id', array('label' => __('Joueur')));
		echo $this->Form->input('MatchesPlayer.4.position', array('type' => 'hidden', 'value' => MatchesPlayer::PIVOT));
	?>
		</fieldset>
		<fieldset>
			<legend><?php echo MatchesPlayer::positions(MatchesPlayer::RESERVE); ?></legend>
	<?php
		echo $this->Form->input('MatchesPlayer.5.match_id', array('type' => 'hidden', 'value' => $match_id));
		echo $this->Form->input('MatchesPlayer.5.players_team_id', array('label' => __('Joueur'), 'multiple' => true, 'size' => '10'));
		echo $this->Form->input('MatchesPlayer.5.position', array('type' => 'hidden', 'value' => MatchesPlayer::RESERVE));
	?>
		</fieldset>
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
