<div class="transferts index">
	<h2><?php echo __('Transferts');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('player_id');?></th>
			<th><?php echo $this->Paginator->sort('acquire_team_id');?></th>
			<th><?php echo $this->Paginator->sort('sell_team_id');?></th>
			<th><?php echo $this->Paginator->sort('gm_watch');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('finish_date');?></th>
			<th><?php echo $this->Paginator->sort('first_price');?></th>
			<th><?php echo $this->Paginator->sort('current_price');?></th>
			<th><?php echo $this->Paginator->sort('sold');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($transferts as $transfert): ?>
	<tr>
		<td><?php echo h($transfert['Transfert']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($transfert['Player']['name'], array('controller' => 'players', 'action' => 'view', $transfert['Player']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transfert['AcquireTeam']['name'], array('controller' => 'teams', 'action' => 'view', $transfert['AcquireTeam']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transfert['SellTeam']['name'], array('controller' => 'teams', 'action' => 'view', $transfert['SellTeam']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($transfert['GmWatch']['name'], array('controller' => 'users', 'action' => 'view', $transfert['GmWatch']['id'])); ?>
		</td>
		<td><?php echo h($transfert['Transfert']['created']); ?>&nbsp;</td>
		<td><?php echo h($transfert['Transfert']['finish_date']); ?>&nbsp;</td>
		<td><?php echo h($transfert['Transfert']['first_price']); ?>&nbsp;</td>
		<td><?php echo h($transfert['Transfert']['current_price']); ?>&nbsp;</td>
		<td><?php echo h($transfert['Transfert']['sold']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $transfert['Transfert']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transfert['Transfert']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transfert['Transfert']['id']), null, __('Are you sure you want to delete # %s?', $transfert['Transfert']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Transfert'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Acquire Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gm Watch'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
