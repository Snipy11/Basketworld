<div class="gradesMatches index">
	<h2><?php echo __('Grades Matches');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('match_id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('grade');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($gradesMatches as $gradesMatch): ?>
	<tr>
		<td><?php echo h($gradesMatch['GradesMatch']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($gradesMatch['Match']['id'], array('controller' => 'matches', 'action' => 'view', $gradesMatch['Match']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($gradesMatch['User']['name'], array('controller' => 'users', 'action' => 'view', $gradesMatch['User']['id'])); ?>
		</td>
		<td><?php echo h($gradesMatch['GradesMatch']['grade']); ?>&nbsp;</td>
		<td><?php echo h($gradesMatch['GradesMatch']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $gradesMatch['GradesMatch']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $gradesMatch['GradesMatch']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $gradesMatch['GradesMatch']['id']), null, __('Are you sure you want to delete # %s?', $gradesMatch['GradesMatch']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Grades Match'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Matches'), array('controller' => 'matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Match'), array('controller' => 'matches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
