<div class="pressReleases index">
	<h2><?php echo __('Press Releases');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('team_id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($pressReleases as $pressRelease): ?>
	<tr>
		<td><?php echo h($pressRelease['PressRelease']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($pressRelease['Team']['name'], array('controller' => 'teams', 'action' => 'view', $pressRelease['Team']['id'])); ?>
		</td>
		<td><?php echo h($pressRelease['PressRelease']['title']); ?>&nbsp;</td>
		<td><?php echo h($pressRelease['PressRelease']['description']); ?>&nbsp;</td>
		<td><?php echo h($pressRelease['PressRelease']['created']); ?>&nbsp;</td>
		<td><?php echo h($pressRelease['PressRelease']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $pressRelease['PressRelease']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $pressRelease['PressRelease']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $pressRelease['PressRelease']['id']), null, __('Are you sure you want to delete # %s?', $pressRelease['PressRelease']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Press Release'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
