<div class="trainers form">
<?php echo $this->Form->create('Trainer');?>
	<fieldset>
		<legend><?php echo __('Edit Trainer'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('team_id');
		echo $this->Form->input('first_name');
		echo $this->Form->input('name');
		echo $this->Form->input('age');
		echo $this->Form->input('country_id');
		echo $this->Form->input('level');
		echo $this->Form->input('style', array('options' => Trainer::style() ));
		echo $this->Form->input('salary');
		echo $this->Form->input('price');
		echo $this->Form->input('available');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Trainer.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Trainer.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Trainers'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
