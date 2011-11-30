<div class="index">
	<h2><?php echo __('Actions');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th class=""><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($actions as $action): ?>
	<tr>
		<td><?php echo h($action['Action']['id']); ?>&nbsp;</td>
		<td><?php echo h($action['Action']['description']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $action['Action']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $action['Action']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $action['Action']['id']), null, __('Are you sure you want to delete # %s?', $action['Action']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Action'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Action Descriptions'), array('controller' => 'action_descriptions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Action Description'), array('controller' => 'action_descriptions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Actions Matches'), array('controller' => 'actions_matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Actions In Match'), array('controller' => 'actions_matches', 'action' => 'add')); ?> </li>
	</ul>
</div>
