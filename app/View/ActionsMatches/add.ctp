<div class="actionsMatches form">
<?php echo $this->Form->create('ActionsMatch');?>
	<fieldset>
		<legend><?php echo __('Add Actions Match'); ?></legend>
	<?php
		echo $this->Form->input('match_id');
		echo $this->Form->input('player1_id');
		echo $this->Form->input('player2_id');
		echo $this->Form->input('action_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Actions Matches'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Matches'), array('controller' => 'matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Match'), array('controller' => 'matches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Actions'), array('controller' => 'actions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Action'), array('controller' => 'actions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player1'), array('controller' => 'players', 'action' => 'add')); ?> </li>
	</ul>
</div>
