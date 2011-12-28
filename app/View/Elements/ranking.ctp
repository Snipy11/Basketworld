<div>
	<h2><?php echo __('Classement');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo 'team_id';?></th>
			<th><?php echo 'points';?></th>
			<th><?php echo 'played';?></th>
			<th><?php echo 'victories';?></th>
			<th><?php echo 'defeats';?></th>
			<th><?php echo 'points_scored';?></th>
			<th><?php echo 'points_against';?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($rankings as $ranking): ?>
	<tr>
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
