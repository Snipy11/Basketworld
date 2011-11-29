<div class="trainers view">
<h2><?php  echo __('Trainer');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($trainer['Trainer']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Team'); ?></dt>
		<dd>
			<?php echo $this->Html->link($trainer['Team']['name'], array('controller' => 'teams', 'action' => 'view', $trainer['Team']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($trainer['Trainer']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($trainer['Trainer']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age'); ?></dt>
		<dd>
			<?php echo h($trainer['Trainer']['age']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($trainer['Country']['country'], array('controller' => 'countries', 'action' => 'view', $trainer['Country']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Level'); ?></dt>
		<dd>
			<?php echo h($trainer['Trainer']['level']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Style'); ?></dt>
		<dd>
			<?php echo h($trainer['Trainer']['style']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Salary'); ?></dt>
		<dd>
			<?php echo h($trainer['Trainer']['salary']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($trainer['Trainer']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Available'); ?></dt>
		<dd>
			<?php echo h($trainer['Trainer']['available']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Trainer'), array('action' => 'edit', $trainer['Trainer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Trainer'), array('action' => 'delete', $trainer['Trainer']['id']), null, __('Are you sure you want to delete # %s?', $trainer['Trainer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Trainers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Trainer'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
