<div class="friendlyMatchRequests form">
<?php echo $this->Form->create('FriendlyMatchRequest');?>
	<fieldset>
		<legend><?php echo __('Edit Friendly Match Request'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('from_team_id');
		echo $this->Form->input('to_team_id');
		echo $this->Form->input('confirm');
		echo $this->Form->input('home');
		echo $this->Form->input('date_match');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('FriendlyMatchRequest.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('FriendlyMatchRequest.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Friendly Match Requests'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team From'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
