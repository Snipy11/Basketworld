<div class="matches form">
<?php echo $this->Form->create('Match');?>
	<fieldset>
		<legend><?php echo __('Add Match'); ?></legend>
	<?php
		echo $this->Form->input('home_team_id');
		echo $this->Form->input('visitor_team_id');
		echo $this->Form->input('start_date');
		echo $this->Form->input('home_points');
		echo $this->Form->input('visitor_points');
		echo $this->Form->input('normal_spectators');
		echo $this->Form->input('vip_spectators');
		echo $this->Form->input('finished');
		echo $this->Form->input('type', array('options' => Match::types() ));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Matches'), array('action' => 'index'));?></li>
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
