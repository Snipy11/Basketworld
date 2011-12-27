
<div class="playersTeams index">
	<h2><?php echo __('Effectif');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('player_id');?></th>
			<th><?php echo $this->Paginator->sort('PlayerSkill.skill', 'Compétence');?></th>
            <th><?php echo $this->Paginator->sort('Numéro'); ?></th>
            <th><?php echo $this->Paginator->sort('default_position', 'Position');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($playersTeams as $playersTeam): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($playersTeam['Player']['first_name'] .' '. $playersTeam['Player']['name'], array('controller' => 'playersteams', 'action' => 'view', $playersTeam['PlayersTeam']['id'])); ?>
		</td>
		<td>
			<?php echo $playersTeam['PlayerSkill']['skill']; ?>
		</td>
        <td>
			<?php echo $playersTeam['PlayersTeam']['number']; ?>
		</td>
		<td>
			<?php echo PlayersTeam::positions($playersTeam['PlayersTeam']['default_position']); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('controller' => 'Players', 'action' => 'view', $playersTeam['Player']['id'])); ?>
			<?php echo $this->Html->link(__('Changer position'), array('action' => 'edit', $playersTeam['PlayersTeam']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Players Team'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Matches Players'), array('controller' => 'matches_players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Matches Player'), array('controller' => 'matches_players', 'action' => 'add')); ?> </li>
	</ul>
</div>
