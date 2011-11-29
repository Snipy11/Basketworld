<div class="languages form">
<?php echo $this->Form->create('Language');?>
	<fieldset>
		<legend><?php echo __('Add Language'); ?></legend>
	<?php
		echo $this->Form->input('language');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Languages'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Action Descriptions'), array('controller' => 'action_descriptions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Action Description'), array('controller' => 'action_descriptions', 'action' => 'add')); ?> </li>
	</ul>
</div>
