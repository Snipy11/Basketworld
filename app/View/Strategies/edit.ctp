<div class="strategies form">
<?php echo $this->Form->create('Strategy');?>
	<fieldset>
		<legend><?php echo __('Edit Strategy'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('team_id');
		echo $this->Form->input('match_id');
		echo $this->Form->input('type', array('options' => Strategy::type() ));
		echo $this->Form->input('condition');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Strategy.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Strategy.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Strategies'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Matches'), array('controller' => 'matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Match'), array('controller' => 'matches', 'action' => 'add')); ?> </li>
	</ul>
</div>
