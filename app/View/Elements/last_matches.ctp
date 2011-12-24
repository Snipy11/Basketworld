<h3>Derniers matches de la division 1A en France</h3>

<dl>
<?php foreach($last_matches as $match): ?>
    <dt>Domicile : <?php echo $match['HomeTeam']['name'] ?></dt>
    <dd><?php echo $match['Match']['home_points'] ?></dd>
    <dt>Visiteur : <?php echo $match['VisitorTeam']['name'] ?></dt>
    <dd><?php echo $match['Match']['visitor_points'] ?></dd>
<?php endforeach; ?>
</dl>
