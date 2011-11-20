<div class="transferts form">
<?php echo $this->Form->create('Transfert');?>
	<fieldset>
		<legend><?php echo __('Add Transfert'); ?></legend>
	<?php
		echo $this->Form->input('player_id');
		echo $this->Form->input('acquire_team_id');
		echo $this->Form->input('sell_team_id');
		echo $this->Form->input('gm_watch');
		echo $this->Form->input('finish_date');
		echo $this->Form->input('first_price');
		echo $this->Form->input('current_price');
		echo $this->Form->input('sold');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Transferts'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Acquire Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gm Watch'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
