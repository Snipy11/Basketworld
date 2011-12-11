<div class="playerFirstNames form">
<?php echo $this->Form->create('PlayerFirstName');?>
	<fieldset>
		<legend><?php echo __('Edit Player First Name'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('first_name');
		echo $this->Form->input('country_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('PlayerFirstName.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('PlayerFirstName.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Player First Names'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
