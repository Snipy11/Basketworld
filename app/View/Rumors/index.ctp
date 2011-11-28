<div class="rumors index">
	<h2><?php echo __('Rumors');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('division_id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('from');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($rumors as $rumor): ?>
	<tr>
		<td><?php echo h($rumor['Rumor']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($rumor['Division']['name'], array('controller' => 'divisions', 'action' => 'view', $rumor['Division']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($rumor['User']['name'], array('controller' => 'users', 'action' => 'view', $rumor['User']['id'])); ?>
		</td>
		<td><?php echo h($rumor['Rumor']['title']); ?>&nbsp;</td>
		<td><?php echo h($rumor['Rumor']['created']); ?>&nbsp;</td>
		<td><?php echo h($rumor['Rumor']['from']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $rumor['Rumor']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $rumor['Rumor']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $rumor['Rumor']['id']), null, __('Are you sure you want to delete # %s?', $rumor['Rumor']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Rumor'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Divisions'), array('controller' => 'divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Division'), array('controller' => 'divisions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
