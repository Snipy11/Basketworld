<div>
	<h2><?php echo __('Classement');?></h2>
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
		<td><?php echo $ranking['Ranking']['points'] ?>&nbsp;</td>
		<td><?php echo $ranking['Ranking']['played'] ?>&nbsp;</td>
		<td><?php echo $ranking['Ranking']['victories'] ?>&nbsp;</td>
		<td><?php echo $ranking['Ranking']['defeats'] ?>&nbsp;</td>
		<td><?php echo $ranking['Ranking']['points_scored'] ?>&nbsp;</td>
		<td><?php echo $ranking['Ranking']['points_against'] ?>&nbsp;</td>
	</tr>
<?php endforeach; ?>
	</table>
</div>
