<div class="view">
<h2><?php  echo __('Action');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($action['Action']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($action['Action']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Action'), array('action' => 'edit', $action['Action']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Action'), array('action' => 'delete', $action['Action']['id']), null, __('Are you sure you want to delete # %s?', $action['Action']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Actions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Action'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Action Descriptions'), array('controller' => 'action_descriptions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Action Description'), array('controller' => 'action_descriptions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Actions Matches'), array('controller' => 'actions_matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Actions In Match'), array('controller' => 'actions_matches', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Action Descriptions');?></h3>
	<?php if (!empty($action['ActionDescription'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Long Description'); ?></th>
		<th><?php echo __('Action Id'); ?></th>
		<th><?php echo __('Language Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($action['ActionDescription'] as $actionDescription): ?>
		<tr>
			<td><?php echo $actionDescription['id'];?></td>
			<td><?php echo $actionDescription['long_description'];?></td>
			<td><?php echo $actionDescription['action_id'];?></td>
			<td><?php echo $actionDescription['language_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'action_descriptions', 'action' => 'view', $actionDescription['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'action_descriptions', 'action' => 'edit', $actionDescription['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'action_descriptions', 'action' => 'delete', $actionDescription['id']), null, __('Are you sure you want to delete # %s?', $actionDescription['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Action Description'), array('controller' => 'action_descriptions', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Actions Matches');?></h3>
	<?php if (!empty($action['ActionsInMatch'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Match Id'); ?></th>
		<th><?php echo __('Player1 Id'); ?></th>
		<th><?php echo __('Player2 Id'); ?></th>
		<th><?php echo __('Action Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($action['ActionsInMatch'] as $actionsInMatch): ?>
		<tr>
			<td><?php echo $actionsInMatch['id'];?></td>
			<td><?php echo $actionsInMatch['match_id'];?></td>
			<td><?php echo $actionsInMatch['player1_id'];?></td>
			<td><?php echo $actionsInMatch['player2_id'];?></td>
			<td><?php echo $actionsInMatch['action_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'actions_matches', 'action' => 'view', $actionsInMatch['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'actions_matches', 'action' => 'edit', $actionsInMatch['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'actions_matches', 'action' => 'delete', $actionsInMatch['id']), null, __('Are you sure you want to delete # %s?', $actionsInMatch['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Actions In Match'), array('controller' => 'actions_matches', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
