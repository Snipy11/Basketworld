<h2>Top 5 des joueurs</h2>

<table cellpadding="0" cellspacing="0">
<tr>
    <th><?php echo(__('Classement')) ?></th>
    <th><?php echo(__('Joueur')) ?></th>
    <th><?php echo(__('Equipe')) ?></th>
    <th><?php echo(__('Evaluation')) ?></th>
</tr>
<?php foreach($players as $rank => $player): ?>
    <tr>
    <td><?php echo $rank+1 ?></td>
    <td><?php echo $this->Html->link(
        $player['Player']['name'] ." ". $player['Player']['first_name'],
        array('controller' => 'Players', 'action' => 'view', $player['Player']['id'])
    ) ?></td>
    <td><?php echo $this->Html->link(
        $player['Team']['name'],
        array('controller' => 'Teams', 'action' => 'view', $player['Team']['id'])
    ) ?></td>
    <td><?php echo $player[0]['global_eval'] ?></td>
    </tr>
<?php endforeach; ?>
</table>
