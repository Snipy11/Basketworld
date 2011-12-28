<div class="rankings index">
	<h2><?php echo __('Classement'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo __('Place');?></th>
            <th><?php echo __('Equipe');?></th>
			<th><?php echo __('points');?></th>
			<th><?php echo __('joués');?></th>
			<th><?php echo __('victoires');?></th>
			<th><?php echo __('défaites');?></th>
			<th><?php echo __('points marqués');?></th>
			<th><?php echo __('points encaissés');?></th>
	</tr>
	<?php
	foreach ($rankings as $rank => $ranking): ?>
	<tr>
        <td><?php echo $rank + 1 ?></td>
		<td>
			<?php echo $this->Html->link($ranking['Team']['name'], array('controller' => 'teams', 'action' => 'view', $ranking['Team']['id'])); ?>
		</td>
		<td><?php echo $ranking['Ranking']['points']; ?>&nbsp;</td>
		<td><?php echo $ranking['Ranking']['played']; ?>&nbsp;</td>
		<td><?php echo $ranking['Ranking']['victories']; ?>&nbsp;</td>
		<td><?php echo $ranking['Ranking']['defeats']; ?>&nbsp;</td>
		<td><?php echo $ranking['Ranking']['points_scored']; ?>&nbsp;</td>
		<td><?php echo $ranking['Ranking']['points_against']; ?>&nbsp;</td>

	</tr>
<?php endforeach; ?>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Ranking'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Divisions'), array('controller' => 'divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Division'), array('controller' => 'divisions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
