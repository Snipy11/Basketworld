<div class="rankings form">
<?php echo $this->Form->create('Ranking');?>
	<fieldset>
		<legend><?php echo __('Edit Ranking'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('division_id');
		echo $this->Form->input('team_id');
		echo $this->Form->input('points');
		echo $this->Form->input('played');
		echo $this->Form->input('victories');
		echo $this->Form->input('defeats');
		echo $this->Form->input('points_scored');
		echo $this->Form->input('points_against');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Ranking.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Ranking.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Rankings'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Divisions'), array('controller' => 'divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Division'), array('controller' => 'divisions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
