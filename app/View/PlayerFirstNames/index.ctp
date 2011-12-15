<div class="playerFirstNames index">
	<h2><?php echo __('Player First Names');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('first_name');?></th>
			<th><?php echo $this->Paginator->sort('country_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($playerFirstNames as $playerFirstName): ?>
	<tr>
		<td><?php echo h($playerFirstName['PlayerFirstName']['id']); ?>&nbsp;</td>
		<td><?php echo h($playerFirstName['PlayerFirstName']['first_name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($playerFirstName['Country']['country'], array('controller' => 'countries', 'action' => 'view', $playerFirstName['Country']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $playerFirstName['PlayerFirstName']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $playerFirstName['PlayerFirstName']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $playerFirstName['PlayerFirstName']['id']), null, __('Are you sure you want to delete # %s?', $playerFirstName['PlayerFirstName']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Player First Name'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
