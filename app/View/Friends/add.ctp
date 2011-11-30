<div class="friends form">
<?php echo $this->Form->create('Friend');?>
	<fieldset>
		<legend><?php echo __('Add Friend'); ?></legend>
	<?php
		echo $this->Form->input('from_user_id');
		echo $this->Form->input('to_user_id');
		echo $this->Form->input('confirm');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Friends'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User From'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
