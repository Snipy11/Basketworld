<h2>Bienvenue sur Basket World !</h2>
<p>N'attendez plus pour rejoindre notre jeu.</p>
<?php 
echo $this->element('user_add'); 
echo $this->element('last_matches', $this->requestAction('matches/lastResults'));
echo $this->element('top5_players', $this->requestAction('players/top5'));

?>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Friends'), array('controller' => 'friends', 'action' => 'index')); ?> </li>
	</ul>
</div>
