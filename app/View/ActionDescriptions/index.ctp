<div class="actionDescriptions index">
	<h2><?php echo __('Action Descriptions');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('long_description');?></th>
			<th><?php echo $this->Paginator->sort('action_id');?></th>
			<th><?php echo $this->Paginator->sort('language_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($actionDescriptions as $actionDescription): ?>
	<tr>
		<td><?php echo h($actionDescription['ActionDescription']['id']); ?>&nbsp;</td>
		<td><?php echo h($actionDescription['ActionDescription']['long_description']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($actionDescription['Action']['id'], array('controller' => 'actions', 'action' => 'view', $actionDescription['Action']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($actionDescription['Language']['language'], array('controller' => 'languages', 'action' => 'view', $actionDescription['Language']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $actionDescription['ActionDescription']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $actionDescription['ActionDescription']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $actionDescription['ActionDescription']['id']), null, __('Are you sure you want to delete # %s?', $actionDescription['ActionDescription']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Action Description'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Actions'), array('controller' => 'actions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Action'), array('controller' => 'actions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Languages'), array('controller' => 'languages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Language'), array('controller' => 'languages', 'action' => 'add')); ?> </li>
	</ul>
</div>
