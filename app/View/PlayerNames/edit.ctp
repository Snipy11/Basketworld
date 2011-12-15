<div class="playerNames form">
<?php echo $this->Form->create('PlayerName');?>
	<fieldset>
		<legend><?php echo __('Edit Player Name'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('country_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PlayerName.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PlayerName.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Player Names'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
