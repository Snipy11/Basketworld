<div class="usersGoals form">
<?php echo $this->Form->create('UsersGoal');?>
	<fieldset>
		<legend><?php echo __('Edit Users Goal'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('goal_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('gm_valid_user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('UsersGoal.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('UsersGoal.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users Goals'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Goals'), array('controller' => 'goals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Goal'), array('controller' => 'goals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
