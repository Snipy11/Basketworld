<div class="playerFirstNames form">
<?php echo $this->Form->create('PlayerFirstName', array('type' => 'file'));?>
	<fieldset>
		<legend><?php echo __('Add Player First Name'); ?></legend>
	<?php
		echo $this->Form->input('first_name', array('type' => 'file'));
		echo $this->Form->input('country_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Player First Names'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
