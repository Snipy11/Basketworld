<div class="rumors form">
<?php echo $this->Form->create('Rumor');?>
	<fieldset>
		<legend><?php echo __('Edit Rumor'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('division_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('title');
		echo $this->Form->input('from');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Rumor.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Rumor.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Rumors'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Divisions'), array('controller' => 'divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Division'), array('controller' => 'divisions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
