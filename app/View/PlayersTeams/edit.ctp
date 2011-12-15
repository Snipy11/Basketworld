<div class="playersTe></div>ams form">
<?php echo $this->Form->create('PlayersTeam');?>
	<fieldset>
		<legend><?php echo __('Edit Players Team'); ?></legend>
		<h3><?php echo $this->data['Player']['first_name'] ." ". $this->data['Player']['name'] ?></h3>
	<?php
		echo $this->Form->input('id', array('type' => 'hidden'));
		echo $this->Form->input('team_id', array('type' => 'hidden'));
		echo $this->Form->input('player_id', array('type' => 'hidden'));
		echo $this->Form->input('default_position', array(
			'options' => PlayersTeam::positions(),
			'label' => 'Position'
		));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PlayersTeam.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PlayersTeam.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Players Teams'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Matches Players'), array('controller' => 'matches_players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Matches Player'), array('controller' => 'matches_players', 'action' => 'add')); ?> </li>
	</ul>
</div>
