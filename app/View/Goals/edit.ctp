<div class="goals form">
<?php echo $this->Form->create('Goal');?>
	<fieldset>
		<legend><?php echo __('Edit Goal'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('description');
		echo $this->Form->input('visible');
		echo $this->Form->input('auto');
		echo $this->Form->input('points');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Goal.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Goal.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Goals'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users Goals'), array('controller' => 'users_goals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Goal User'), array('controller' => 'users_goals', 'action' => 'add')); ?> </li>
	</ul>
</div>
