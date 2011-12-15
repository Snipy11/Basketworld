<h3>Prochain match au calendrier</h3>

<dl>
	<dt><?php echo __('Date'); ?> : </dt>
	<dd><?php echo utf8_encode(strftime('Le %A %#d %B %Y', strtotime($next_match['Match']['start_date']))) ?></dd>
	<dt><?php echo __('Domicile'); ?> : </dt>
	<dd><?php echo $next_match['HomeTeam']['name'] ?></dd>
	<dt><?php echo __('Visiteur'); ?> : </dt>
	<dd><?php echo $next_match['VisitorTeam']['name'] ?></dd>
</dl>
<?php // Le %A %#d %B %G ?>
