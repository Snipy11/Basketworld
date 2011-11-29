<div class="trainings view">
<h2><?php  echo __('Training');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($training['Training']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Team'); ?></dt>
		<dd>
			<?php echo $this->Html->link($training['Team']['name'], array('controller' => 'teams', 'action' => 'view', $training['Team']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($training['Training']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Weekday'); ?></dt>
		<dd>
			<?php echo h($training['Training']['weekday']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($training['Training']['type']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Training'), array('action' => 'edit', $training['Training']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Training'), array('action' => 'delete', $training['Training']['id']), null, __('Are you sure you want to delete # %s?', $training['Training']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Trainings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Training'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
