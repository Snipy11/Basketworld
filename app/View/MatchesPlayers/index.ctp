<div class="matchesPlayers index">
	<h2><?php echo __('Ordre de match');?></h2>
	<dl>
		<dt><?php echo __('Date'); ?> : </dt>
		<dd><?php echo utf8_encode(strftime('Le %A %#d %B %Y', strtotime($match['Match']['start_date']))) ?></dd>
		<dt><?php echo __('Domicile') ?> :</dt>
		<dd><?php echo $match['HomeTeam']['name'] ?></dd>
		<dt><?php echo __('Visiteur') ?> :</dt>
		<dd><?php echo $match['VisitorTeam']['name'] ?></dd>
	</dl>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Joueur');?></th>
			<th><?php echo $this->Paginator->sort('Position habituelle');?></th>
			<th><?php echo $this->Paginator->sort('Position');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($matchesPlayers as $matchesPlayer): ?>
	<tr>

		<td>
			<?php echo h($matchesPlayer['Player']['first_name'] .' '. $matchesPlayer['Player']['name']); ?>
		</td>
		<td><?php echo h(MatchesPlayer::positions($matchesPlayer['PlayersTeam']['default_position'])); ?>&nbsp;</td>
		<td><?php echo h(MatchesPlayer::positions($matchesPlayer['MatchesPlayer']['position'])); ?>&nbsp;</td>

		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $match['Match']['id'])); ?>
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
		<?php if($this->Paginator->params->paging['MatchesPlayer']['count'] == 0): ?>
		<li><?php echo $this->Html->link(__('Nouvel ordre de match'), array('action' => 'add', $match['Match']['id'])); ?></li>
		<?php endif; ?>
		<li><?php echo $this->Html->link(__('List Matches'), array('controller' => 'matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Match'), array('controller' => 'matches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players Teams'), array('controller' => 'players_teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Players Team'), array('controller' => 'players_teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
