<div class="trainings form">
<?php echo $this->Form->create('Training');?>
	<fieldset>
		<legend><?php echo __('Add Training'); ?></legend>
	<?php
		echo $this->Form->input('team_id');
		echo $this->Form->input('weekday');
		echo $this->Form->input('type', array('options' => Training::type() ));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Trainings'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
