<div class="form">
<?php echo $this->Form->create('Action');?>
	<fieldset>
		<legend><?php echo __('Add Action'); ?></legend>
	<?php
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Actions'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Action Descriptions'), array('controller' => 'action_descriptions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Action Description'), array('controller' => 'action_descriptions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Actions Matches'), array('controller' => 'actions_matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Actions In Match'), array('controller' => 'actions_matches', 'action' => 'add')); ?> </li>
	</ul>
</div>
