<div class="teams index">
	<h2><?php echo __('Teams');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('division_id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('logo');?></th>
			<th><?php echo $this->Paginator->sort('gymnasium_name');?></th>
			<th><?php echo $this->Paginator->sort('places_assises');?></th>
			<th><?php echo $this->Paginator->sort('places_vip');?></th>
			<th><?php echo $this->Paginator->sort('adjoints');?></th>
			<th><?php echo $this->Paginator->sort('attaches');?></th>
			<th><?php echo $this->Paginator->sort('eplucheurs');?></th>
			<th><?php echo $this->Paginator->sort('medecins');?></th>
			<th><?php echo $this->Paginator->sort('kines');?></th>
			<th><?php echo $this->Paginator->sort('chasseurs');?></th>
			<th><?php echo $this->Paginator->sort('stats');?></th>
			<th><?php echo $this->Paginator->sort('confiance');?></th>
			<th><?php echo $this->Paginator->sort('cash');?></th>
			<th><?php echo $this->Paginator->sort('matos');?></th>
			<th><?php echo $this->Paginator->sort('tenues');?></th>
			<th><?php echo $this->Paginator->sort('muscu');?></th>
			<th><?php echo $this->Paginator->sort('supporters');?></th>
			<th><?php echo $this->Paginator->sort('com_politique_gestion');?></th>
			<th><?php echo $this->Paginator->sort('com_ambition');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($teams as $team): ?>
	<tr>
		<td><?php echo h($team['Team']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($team['User']['name'], array('controller' => 'users', 'action' => 'view', $team['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($team['Division']['name'], array('controller' => 'divisions', 'action' => 'view', $team['Division']['id'])); ?>
		</td>
		<td><?php echo h($team['Team']['name']); ?>&nbsp;</td>
		<td><?php echo h($team['Team']['logo']); ?>&nbsp;</td>
		<td><?php echo h($team['Team']['gymnasium_name']); ?>&nbsp;</td>
		<td><?php echo h($team['Team']['places_assises']); ?>&nbsp;</td>
		<td><?php echo h($team['Team']['places_vip']); ?>&nbsp;</td>
		<td><?php echo h($team['Team']['adjoints']); ?>&nbsp;</td>
		<td><?php echo h($team['Team']['attaches']); ?>&nbsp;</td>
		<td><?php echo h($team['Team']['eplucheurs']); ?>&nbsp;</td>
		<td><?php echo h($team['Team']['medecins']); ?>&nbsp;</td>
		<td><?php echo h($team['Team']['kines']); ?>&nbsp;</td>
		<td><?php echo h($team['Team']['chasseurs']); ?>&nbsp;</td>
		<td><?php echo h($team['Team']['stats']); ?>&nbsp;</td>
		<td><?php echo h($team['Team']['confiance']); ?>&nbsp;</td>
		<td><?php echo h($team['Team']['cash']); ?>&nbsp;</td>
		<td><?php echo h($team['Team']['matos']); ?>&nbsp;</td>
		<td><?php echo h($team['Team']['tenues']); ?>&nbsp;</td>
		<td><?php echo h($team['Team']['muscu']); ?>&nbsp;</td>
		<td><?php echo h($team['Team']['supporters']); ?>&nbsp;</td>
		<td><?php echo h($team['Team']['com_politique_gestion']); ?>&nbsp;</td>
		<td><?php echo h($team['Team']['com_ambition']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $team['Team']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $team['Team']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $team['Team']['id']), null, __('Are you sure you want to delete # %s?', $team['Team']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Team'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Divisions'), array('controller' => 'divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Division'), array('controller' => 'divisions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trainers'), array('controller' => 'trainers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trainer'), array('controller' => 'trainers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Press Releases'), array('controller' => 'press_releases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Press Release'), array('controller' => 'press_releases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rankings'), array('controller' => 'rankings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ranking'), array('controller' => 'rankings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Strategies'), array('controller' => 'strategies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Strategy'), array('controller' => 'strategies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trainings'), array('controller' => 'trainings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Training'), array('controller' => 'trainings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactions'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Youth Investments'), array('controller' => 'youth_investments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Youth Investment'), array('controller' => 'youth_investments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Friendly Match Requests'), array('controller' => 'friendly_match_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Friendly Match Request To'), array('controller' => 'friendly_match_requests', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Matches'), array('controller' => 'matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Match Home'), array('controller' => 'matches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transferts'), array('controller' => 'transferts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transfert Buyer'), array('controller' => 'transferts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
	</ul>
</div>
