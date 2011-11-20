<div class="usersGoals index">
	<h2><?php echo __('Users Goals');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('goal_id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('gm_valid_user_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($usersGoals as $usersGoal): ?>
	<tr>
		<td><?php echo h($usersGoal['UsersGoal']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($usersGoal['Goal']['id'], array('controller' => 'goals', 'action' => 'view', $usersGoal['Goal']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($usersGoal['User']['name'], array('controller' => 'users', 'action' => 'view', $usersGoal['User']['id'])); ?>
		</td>
		<td><?php echo h($usersGoal['UsersGoal']['created']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($usersGoal['GmValidUser']['name'], array('controller' => 'users', 'action' => 'view', $usersGoal['GmValidUser']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $usersGoal['UsersGoal']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $usersGoal['UsersGoal']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $usersGoal['UsersGoal']['id']), null, __('Are you sure you want to delete # %s?', $usersGoal['UsersGoal']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Users Goal'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Goals'), array('controller' => 'goals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Goal'), array('controller' => 'goals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
