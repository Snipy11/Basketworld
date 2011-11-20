<div class="countries form">
<?php echo $this->Form->create('Country');?>
	<fieldset>
		<legend><?php echo __('Edit Country'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('country');
		echo $this->Form->input('flag');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Country.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Country.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Countries'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Divisions'), array('controller' => 'divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Division'), array('controller' => 'divisions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trainers'), array('controller' => 'trainers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trainer'), array('controller' => 'trainers', 'action' => 'add')); ?> </li>
	</ul>
</div>
