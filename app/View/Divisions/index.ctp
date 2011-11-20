<div class="divisions index">
	<h2><?php echo __('Divisions');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('hierarchy');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('country_id');?></th>
			<th><?php echo $this->Paginator->sort('season_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($divisions as $division): ?>
	<tr>
		<td><?php echo h($division['Division']['id']); ?>&nbsp;</td>
		<td><?php echo h($division['Division']['hierarchy']); ?>&nbsp;</td>
		<td><?php echo h($division['Division']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($division['Country']['id'], array('controller' => 'countries', 'action' => 'view', $division['Country']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($division['Season']['year'], array('controller' => 'seasons', 'action' => 'view', $division['Season']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $division['Division']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $division['Division']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $division['Division']['id']), null, __('Are you sure you want to delete # %s?', $division['Division']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Division'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Seasons'), array('controller' => 'seasons', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Season'), array('controller' => 'seasons', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rankings'), array('controller' => 'rankings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ranking'), array('controller' => 'rankings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rumors'), array('controller' => 'rumors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rumor'), array('controller' => 'rumors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
