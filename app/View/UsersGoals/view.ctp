<div class="usersGoals view">
<h2><?php  echo __('Users Goal');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usersGoal['UsersGoal']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Goal'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usersGoal['Goal']['id'], array('controller' => 'goals', 'action' => 'view', $usersGoal['Goal']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usersGoal['User']['name'], array('controller' => 'users', 'action' => 'view', $usersGoal['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($usersGoal['UsersGoal']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gm Valid User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usersGoal['GmValidUser']['name'], array('controller' => 'users', 'action' => 'view', $usersGoal['GmValidUser']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Users Goal'), array('action' => 'edit', $usersGoal['UsersGoal']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Users Goal'), array('action' => 'delete', $usersGoal['UsersGoal']['id']), null, __('Are you sure you want to delete # %s?', $usersGoal['UsersGoal']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Users Goals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Users Goal'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Goals'), array('controller' => 'goals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Goal'), array('controller' => 'goals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
