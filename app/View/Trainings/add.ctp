<div class="trainings form">
<?php echo $this->Form->create('Training');?>
	<fieldset>
		<legend><?php echo __('Add Training'); ?></legend>
		<?php for($i = 0; $i < 7; $i++): ?>
		<fieldset>
			<legend><?php echo strftime('%A', strtotime("Monday +$i days")); ?></legend>
	<?php
		echo $this->Form->input("Training.$i.team_id", array('type' => 'hidden', 'value' => $team_id));
		echo $this->Form->input("Training.$i.weekday", array('type' => 'hidden', 'value' => $i));
		echo $this->Form->input("Training.$i.type", array('options' => Training::type() ));
	?>
		</fieldset>
		<?php endfor; ?>
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
