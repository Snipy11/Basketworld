<div class="users index">
	<h2><?php echo __('Users');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('password');?></th>
			<th><?php echo $this->Paginator->sort('validated');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('lastconnect');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('presentation');?></th>
			<th><?php echo $this->Paginator->sort('birthdate');?></th>
			<th><?php echo $this->Paginator->sort('gender');?></th>
			<th><?php echo $this->Paginator->sort('ip');?></th>
			<th><?php echo $this->Paginator->sort('avatar');?></th>
			<th><?php echo $this->Paginator->sort('inactive');?></th>
			<th><?php echo $this->Paginator->sort('waiting');?></th>
			<th><?php echo $this->Paginator->sort('group');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($users as $user): ?>
	<tr>
		<td><?php echo h($user['User']['id']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['password']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['validated']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['lastconnect']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['presentation']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['birthdate']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['gender']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['ip']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['avatar']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['inactive']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['waiting']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['group']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Grades Matches'), array('controller' => 'grades_matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Grades Match'), array('controller' => 'grades_matches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rumors'), array('controller' => 'rumors', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rumor'), array('controller' => 'rumors', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Vips'), array('controller' => 'vips', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vip'), array('controller' => 'vips', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users Goals'), array('controller' => 'users_goals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Goal'), array('controller' => 'users_goals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Friends'), array('controller' => 'friends', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Friend From'), array('controller' => 'friends', 'action' => 'add')); ?> </li>
	</ul>
</div>
