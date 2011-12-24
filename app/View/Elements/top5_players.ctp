<h3>Top 5 des joueurs</h3>

<table cellpadding="0" cellspacing="0">
<tr>
    <th><?php echo(__('Classement')) ?></th>
    <th><?php echo(__('Joueur')) ?></th>
    <th><?php echo(__('Compétence')) ?></th>
</tr>
<?php foreach($players as $rank => $player): ?>
    <tr>
    <td><?php echo $rank+1 ?></td>
    <td><?php echo $this->Html->link($player['Player']['name'], array('controller' => 'Players', 'action' => 'view', $player['Player']['id'])) ?></td>
    <td><?php echo $player['PlayerSkill']['skill'] ?></td>
    </tr>
<?php endforeach; ?>
</table>
