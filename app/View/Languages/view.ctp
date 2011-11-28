<div class="languages view">
<h2><?php  echo __('Language');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($language['Language']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Language'); ?></dt>
		<dd>
			<?php echo h($language['Language']['language']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Language'), array('action' => 'edit', $language['Language']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Language'), array('action' => 'delete', $language['Language']['id']), null, __('Are you sure you want to delete # %s?', $language['Language']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Languages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Language'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Action Descriptions'), array('controller' => 'action_descriptions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Action Description'), array('controller' => 'action_descriptions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Action Descriptions');?></h3>
	<?php if (!empty($language['ActionDescription'])):?>
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
		foreach ($language['ActionDescription'] as $actionDescription): ?>
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
