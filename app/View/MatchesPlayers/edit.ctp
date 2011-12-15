<div class="matchesPlayers form">
<?php echo $this->Form->create('MatchesPlayer');?>
	<fieldset>
		<legend><?php echo __('Edit Matches Player'); ?></legend>
		<fieldset>
			<legend><?php echo MatchesPlayer::positions($this->data['MatchesPlayer']['position']); ?></legend>
	<?php
		echo $this->Form->input('players_team_id', array('label' => __('Joueur')));

	?>
		</fieldset>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('MatchesPlayer.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('MatchesPlayer.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Matches Players'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Matches'), array('controller' => 'matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Match'), array('controller' => 'matches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players Teams'), array('controller' => 'players_teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Players Team'), array('controller' => 'players_teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
