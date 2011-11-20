<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('password');
		echo $this->Form->input('validated');
		echo $this->Form->input('lastconnect');
		echo $this->Form->input('email');
		echo $this->Form->input('presentation');
		echo $this->Form->input('birthdate');
		echo $this->Form->input('gender', array('options' => User::genders() ));
		echo $this->Form->input('ip');
		echo $this->Form->input('avatar');
		echo $this->Form->input('inactive');
		echo $this->Form->input('waiting');
		echo $this->Form->input('group', array('options' => User::groups() ));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Grades Matches'), array('controller' => 'grades_matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grades Match'), array('controller' => 'grades_matches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rumors'), array('controller' => 'rumors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rumor'), array('controller' => 'rumors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vips'), array('controller' => 'vips', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vip'), array('controller' => 'vips', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users Goals'), array('controller' => 'users_goals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Goal'), array('controller' => 'users_goals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Friends'), array('controller' => 'friends', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Friend From'), array('controller' => 'friends', 'action' => 'add')); ?> </li>
	</ul>
</div>
