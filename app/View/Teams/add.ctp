<div class="teams form">
<?php echo $this->Form->create('Team');?>
	<fieldset>
		<legend><?php echo __('Add Team'); ?></legend>
	<?php
		echo $this->Form->input('division_id');
		echo $this->Form->input('name');
		echo $this->Form->input('logo');
		echo $this->Form->input('gymnasium_name');
		echo $this->Form->input('places_assises');
		echo $this->Form->input('places_vip');
		echo $this->Form->input('adjoints');
		echo $this->Form->input('attaches');
		echo $this->Form->input('eplucheurs');
		echo $this->Form->input('medecins');
		echo $this->Form->input('kines');
		echo $this->Form->input('chasseurs');
		echo $this->Form->input('stats');
		echo $this->Form->input('confiance');
		echo $this->Form->input('cash');
		echo $this->Form->input('matos');
		echo $this->Form->input('tenues');
		echo $this->Form->input('muscu');
		echo $this->Form->input('supporters');
		echo $this->Form->input('com_politique_gestion', array('options' => Team::comPolitiqueGestion() ));
		echo $this->Form->input('com_ambition', array('options' => Team::comAmbition() ));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Teams'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Divisions'), array('controller' => 'divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Division'), array('controller' => 'divisions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trainers'), array('controller' => 'trainers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trainer'), array('controller' => 'trainers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events'), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event'), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Press Releases'), array('controller' => 'press_releases', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Press Release'), array('controller' => 'press_releases', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rankings'), array('controller' => 'rankings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ranking'), array('controller' => 'rankings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Strategies'), array('controller' => 'strategies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Strategy'), array('controller' => 'strategies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trainings'), array('controller' => 'trainings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Training'), array('controller' => 'trainings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transactions'), array('controller' => 'transactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transaction'), array('controller' => 'transactions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Youth Investments'), array('controller' => 'youth_investments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Youth Investment'), array('controller' => 'youth_investments', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Friendly Match Requests'), array('controller' => 'friendly_match_requests', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Friendly Match Request To'), array('controller' => 'friendly_match_requests', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players Teams'), array('controller' => 'players_teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Players In Team'), array('controller' => 'players_teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Matches'), array('controller' => 'matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Match Home'), array('controller' => 'matches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Transferts'), array('controller' => 'transferts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transfert Buyer'), array('controller' => 'transferts', 'action' => 'add')); ?> </li>
	</ul>
</div>
