<?php debug($match) ?>
<div class="view" style="width:65%;">
	<h2>Simulation de match</h2>
	<p>Version alpha 1.0</p>

	<dl style="width:80%;">
	<?php 
	foreach($matchDescriptions as $key => $description): ?>
		<dt><?php echo $key ?></dt>
		<dd><?php echo $description ?></dd>
	<?php endforeach; ?>
	</dl>
</div>

<div class="actions" style="width:25%;">
	<ul>
		<li><?php echo $this->Html->link(__('List Matches'), array('action' => 'index')); ?></li>
	</ul>
	<h3><?php echo __("Statistiques des joueurs"); ?></h3>
	<h2><?php echo $match['HomeTeam']['name']; ?></h2>
	<?php foreach($match['Players'] as $player): 
		$playerStat = $player['PlayersInMatch'];
		if($player['PlayersTeam']['team_id'] != $match['HomeTeam']['id']):
			continue; 
		endif; ?>
		<h5><?php echo $player['Player']['name']; ?></h5>
		<table>
			<tr><td><?php echo __("Tentatives 2 points"); ?></td><td><?php echo $playerStat['2pts_attempts']; ?></td></tr>
			<tr><td><?php echo __("2 points marqués"); ?></td><td><?php echo $playerStat['2pts_scored']; ?></td></tr>
			<tr><td><?php echo __("Tentatives 3 points"); ?></td><td><?php echo $playerStat['3pts_attempts']; ?></td></tr>
			<tr><td><?php echo __("3 points marqués"); ?></td><td><?php echo $playerStat['3pts_scored']; ?></td></tr>
			<tr><td><?php echo __("Rebonds offensifs"); ?></td><td><?php echo $playerStat['rebounds_offensive']; ?></td></tr>
			<tr><td><?php echo __("Rebonds défensifs"); ?></td><td><?php echo $playerStat['rebounds_defensive']; ?></td></tr>
			<tr><td><?php echo __("Tentatives lancer francs"); ?></td><td><?php echo $playerStat['freethrows_attempts']; ?></td></tr>
			<tr><td><?php echo __("Lancer francs marqués"); ?></td><td><?php echo $playerStat['freethrows_scored']; ?></td></tr>
			<tr><td><?php echo __("Passes décisives"); ?></td><td><?php echo $playerStat['assists']; ?></td></tr>
			<tr><td><?php echo __("Interceptions"); ?></td><td><?php echo $playerStat['steals']; ?></td></tr>
			<tr><td><?php echo __("Contres"); ?></td><td><?php echo $playerStat['blocks']; ?></td></tr>
			<tr><td><?php echo __("Fautes commises"); ?></td><td><?php echo $playerStat['fouls']; ?></td></tr>
		</table>
	<?php endforeach; ?>
	
	<h2><?php echo $match['VisitorTeam']['name']; ?></h2>
	<?php foreach($match['Players'] as $player): 
		$playerStat = $player['PlayersInMatch'];
		if($player['PlayersTeam']['team_id'] != $match['VisitorTeam']['id']):
			continue; 
		endif; ?>
		<h5><?php echo $player['Player']['name']; ?></h5>
		<table>
			<tr><td><?php echo __("Tentatives 2 points"); ?></td><td><?php echo $playerStat['2pts_attempts']; ?></td></tr>
			<tr><td><?php echo __("2 points marqués"); ?></td><td><?php echo $playerStat['2pts_scored']; ?></td></tr>
			<tr><td><?php echo __("Tentatives 3 points"); ?></td><td><?php echo $playerStat['3pts_attempts']; ?></td></tr>
			<tr><td><?php echo __("3 points marqués"); ?></td><td><?php echo $playerStat['3pts_scored']; ?></td></tr>
			<tr><td><?php echo __("Rebonds offensifs"); ?></td><td><?php echo $playerStat['rebounds_offensive']; ?></td></tr>
			<tr><td><?php echo __("Rebonds défensifs"); ?></td><td><?php echo $playerStat['rebounds_defensive']; ?></td></tr>
			<tr><td><?php echo __("Tentatives lancer francs"); ?></td><td><?php echo $playerStat['freethrows_attempts']; ?></td></tr>
			<tr><td><?php echo __("Lancer francs marqués"); ?></td><td><?php echo $playerStat['freethrows_scored']; ?></td></tr>
			<tr><td><?php echo __("Passes décisives"); ?></td><td><?php echo $playerStat['assists']; ?></td></tr>
			<tr><td><?php echo __("Interceptions"); ?></td><td><?php echo $playerStat['steals']; ?></td></tr>
			<tr><td><?php echo __("Contres"); ?></td><td><?php echo $playerStat['blocks']; ?></td></tr>
			<tr><td><?php echo __("Fautes commises"); ?></td><td><?php echo $playerStat['fouls']; ?></td></tr>
		</table>
	<?php endforeach; ?>
</div>



<?php

