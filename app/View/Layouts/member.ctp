<?php

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">
		<div id="header">
		</div>
		<div id="menu" class='actions'>
		    <?php echo $this->Html->link(__('Tableau de bord'), '/'); ?>
            <?php echo $this->Html->link(__('Info club'), '/'); ?>
		    <?php echo $this->Html->link(__('Effectif'), '/PlayersTeams'); ?>
		    <?php echo $this->Html->link(__('Entraînement'), '/Trainings'); ?>
            <?php echo $this->Html->link(__('Marché des transferts'), '/'); ?>
		    <?php echo $this->Html->link(__('Calendrier'), '/Matches'); ?>
		    <?php echo $this->Html->link(__('Championnat'), '/Rankings'); ?>
		    <?php echo $this->Html->link(__('Amicaux'), '/'); ?>
            <?php echo $this->Html->link(__('Bureaux du club'), '/'); ?>
            <?php echo $this->Html->link(__('Economie'), '/'); ?>
            <br /><br />
            <?php echo $this->Html->link(__('Personnel et salariés'), '/'); ?>
            <?php echo $this->Html->link(__('Salle'), '/'); ?>
            <?php echo $this->Html->link(__('Centre de formation'), '/'); ?>
            <?php echo $this->Html->link(__('Recherche'), '/'); ?>
		</div>
		<div id="content">
            <div style="text-align:right">
            <?php echo __('Bienvenue ').$current_user['name'].". "; ?> <?php echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); ?>
            </div>
			<?php echo $this->Session->flash(); ?>
            <?php echo $this->Session->flash('auth'); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt'=> $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
