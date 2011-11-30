<div class="actionsMatches index">
	<h2><?php echo __('Actions Matches');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('match_id');?></th>
			<th><?php echo $this->Paginator->sort('player1_id');?></th>
			<th><?php echo $this->Paginator->sort('player2_id');?></th>
			<th><?php echo $this->Paginator->sort('action_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($actionsMatches as $actionsMatch): ?>
	<tr>
		<td><?php echo h($actionsMatch['ActionsMatch']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($actionsMatch['Match']['id'], array('controller' => 'matches', 'action' => 'view', $actionsMatch['Match']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($actionsMatch['Player1']['name'], array('controller' => 'players', 'action' => 'view', $actionsMatch['Player1']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($actionsMatch['Player2']['name'], array('controller' => 'players', 'action' => 'view', $actionsMatch['Player2']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($actionsMatch['Action']['id'], array('controller' => 'actions', 'action' => 'view', $actionsMatch['Action']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $actionsMatch['ActionsMatch']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $actionsMatch['ActionsMatch']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $actionsMatch['ActionsMatch']['id']), null, __('Are you sure you want to delete # %s?', $actionsMatch['ActionsMatch']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Actions Match'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Matches'), array('controller' => 'matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Match'), array('controller' => 'matches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Actions'), array('controller' => 'actions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Action'), array('controller' => 'actions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player1'), array('controller' => 'players', 'action' => 'add')); ?> </li>
	</ul>
</div>
