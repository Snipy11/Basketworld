<div class="goals view">
<h2><?php  echo __('Goal');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($goal['Goal']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($goal['Goal']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Visible'); ?></dt>
		<dd>
			<?php echo h($goal['Goal']['visible']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Auto'); ?></dt>
		<dd>
			<?php echo h($goal['Goal']['auto']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Points'); ?></dt>
		<dd>
			<?php echo h($goal['Goal']['points']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Goal'), array('action' => 'edit', $goal['Goal']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Goal'), array('action' => 'delete', $goal['Goal']['id']), null, __('Are you sure you want to delete # %s?', $goal['Goal']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Goals'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Goal'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users Goals'), array('controller' => 'users_goals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Goal User'), array('controller' => 'users_goals', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Users Goals');?></h3>
	<?php if (!empty($goal['GoalUser'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Goal Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Gm Valid User Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($goal['GoalUser'] as $goalUser): ?>
		<tr>
			<td><?php echo $goalUser['id'];?></td>
			<td><?php echo $goalUser['goal_id'];?></td>
			<td><?php echo $goalUser['user_id'];?></td>
			<td><?php echo $goalUser['created'];?></td>
			<td><?php echo $goalUser['gm_valid_user_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users_goals', 'action' => 'view', $goalUser['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users_goals', 'action' => 'edit', $goalUser['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users_goals', 'action' => 'delete', $goalUser['id']), null, __('Are you sure you want to delete # %s?', $goalUser['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Goal User'), array('controller' => 'users_goals', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
