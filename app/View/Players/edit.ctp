<div class="players form">
<?php echo $this->Form->create('Player');?>
	<fieldset>
		<legend><?php echo __('Edit Player'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('country_id');
		echo $this->Form->input('first_name');
		echo $this->Form->input('name');
		echo $this->Form->input('age');
		echo $this->Form->input('height');
		echo $this->Form->input('salary');
		echo $this->Form->input('skill');
		echo $this->Form->input('shoot');
		echo $this->Form->input('3points');
		echo $this->Form->input('dribble');
		echo $this->Form->input('assist');
		echo $this->Form->input('rebound');
		echo $this->Form->input('block');
		echo $this->Form->input('steal');
		echo $this->Form->input('defence');
		echo $this->Form->input('fatigue');
		echo $this->Form->input('form');
		echo $this->Form->input('experience');
		echo $this->Form->input('temperament');
		echo $this->Form->input('injury');
		echo $this->Form->input('speciality');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Player.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Player.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Players'), array('action' => 'index'));?></li>
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
