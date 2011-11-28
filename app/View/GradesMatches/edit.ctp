<div class="gradesMatches form">
<?php echo $this->Form->create('GradesMatch');?>
	<fieldset>
		<legend><?php echo __('Edit Grades Match'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('match_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('grade');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('GradesMatch.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('GradesMatch.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Grades Matches'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Matches'), array('controller' => 'matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Match'), array('controller' => 'matches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
