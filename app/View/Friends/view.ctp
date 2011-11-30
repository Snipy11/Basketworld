<div class="friends view">
<h2><?php  echo __('Friend');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($friend['Friend']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User From'); ?></dt>
		<dd>
			<?php echo $this->Html->link($friend['UserFrom']['name'], array('controller' => 'users', 'action' => 'view', $friend['UserFrom']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User To'); ?></dt>
		<dd>
			<?php echo $this->Html->link($friend['UserTo']['name'], array('controller' => 'users', 'action' => 'view', $friend['UserTo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Confirm'); ?></dt>
		<dd>
			<?php echo h($friend['Friend']['confirm']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($friend['Friend']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Friend'), array('action' => 'edit', $friend['Friend']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Friend'), array('action' => 'delete', $friend['Friend']['id']), null, __('Are you sure you want to delete # %s?', $friend['Friend']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Friends'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Friend'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User From'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
