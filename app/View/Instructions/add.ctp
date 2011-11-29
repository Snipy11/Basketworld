<div class="instructions form">
<?php echo $this->Form->create('Instruction');?>
	<fieldset>
		<legend><?php echo __('Add Instruction'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Instructions'), array('action' => 'index'));?></li>
	</ul>
</div>
