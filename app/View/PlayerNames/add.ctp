<div class="playerNames form">
<?php echo $this->Form->create('PlayerName', array('type' => 'file'));?>
	<fieldset>
		<legend><?php echo __('Add Player Name'); ?></legend>
	<?php
		echo $this->Form->input('name', array('type' => 'file'));
		echo $this->Form->input('country_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Player Names'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
