<div class="friendlyMatchRequests index">
	<h2><?php echo __('Friendly Match Requests');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('from_team_id');?></th>
			<th><?php echo $this->Paginator->sort('to_team_id');?></th>
			<th><?php echo $this->Paginator->sort('confirm');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('home');?></th>
			<th><?php echo $this->Paginator->sort('date_match');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($friendlyMatchRequests as $friendlyMatchRequest): ?>
	<tr>
		<td><?php echo h($friendlyMatchRequest['FriendlyMatchRequest']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($friendlyMatchRequest['TeamFrom']['name'], array('controller' => 'teams', 'action' => 'view', $friendlyMatchRequest['TeamFrom']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($friendlyMatchRequest['TeamTo']['name'], array('controller' => 'teams', 'action' => 'view', $friendlyMatchRequest['TeamTo']['id'])); ?>
		</td>
		<td><?php echo h($friendlyMatchRequest['FriendlyMatchRequest']['confirm']); ?>&nbsp;</td>
		<td><?php echo h($friendlyMatchRequest['FriendlyMatchRequest']['created']); ?>&nbsp;</td>
		<td><?php echo h($friendlyMatchRequest['FriendlyMatchRequest']['home']); ?>&nbsp;</td>
		<td><?php echo h($friendlyMatchRequest['FriendlyMatchRequest']['date_match']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $friendlyMatchRequest['FriendlyMatchRequest']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $friendlyMatchRequest['FriendlyMatchRequest']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $friendlyMatchRequest['FriendlyMatchRequest']['id']), null, __('Are you sure you want to delete # %s?', $friendlyMatchRequest['FriendlyMatchRequest']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Friendly Match Request'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team From'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
