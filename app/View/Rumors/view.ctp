<div class="rumors view">
<h2><?php  echo __('Rumor');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($rumor['Rumor']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Division'); ?></dt>
		<dd>
			<?php echo $this->Html->link($rumor['Division']['name'], array('controller' => 'divisions', 'action' => 'view', $rumor['Division']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($rumor['User']['name'], array('controller' => 'users', 'action' => 'view', $rumor['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($rumor['Rumor']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($rumor['Rumor']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('From'); ?></dt>
		<dd>
			<?php echo h($rumor['Rumor']['from']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Rumor'), array('action' => 'edit', $rumor['Rumor']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Rumor'), array('action' => 'delete', $rumor['Rumor']['id']), null, __('Are you sure you want to delete # %s?', $rumor['Rumor']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rumors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rumor'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Divisions'), array('controller' => 'divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Division'), array('controller' => 'divisions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
