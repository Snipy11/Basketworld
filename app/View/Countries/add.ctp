<div class="countries form">
<?php echo $this->Form->create('Country');?>
	<fieldset>
		<legend><?php echo __('Add Country'); ?></legend>
	<?php
		echo $this->Form->input('country');
		echo $this->Form->input('flag');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Countries'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Divisions'), array('controller' => 'divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Division'), array('controller' => 'divisions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Player First Names'), array('controller' => 'player_first_names', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Ajouter fichier de prénoms'), array('controller' => 'player_first_names', 'action' => 'addFromFile')); ?></li>
        <li><?php echo $this->Html->link(__('New Player First Name'), array('controller' => 'player_first_names', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Player Names'), array('controller' => 'player_names', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Ajouter un fichier de noms'), array('controller' => 'player_names', 'action' => 'addFromFile')); ?></li>
        <li><?php echo $this->Html->link(__('New Player Name'), array('controller' => 'player_names', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trainers'), array('controller' => 'trainers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trainer'), array('controller' => 'trainers', 'action' => 'add')); ?> </li>
	</ul>
</div>
