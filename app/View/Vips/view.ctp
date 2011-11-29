<div class="vips view">
<h2><?php  echo __('Vip');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($vip['Vip']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($vip['User']['name'], array('controller' => 'users', 'action' => 'view', $vip['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($vip['Vip']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('End Date'); ?></dt>
		<dd>
			<?php echo h($vip['Vip']['end_date']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Vip'), array('action' => 'edit', $vip['Vip']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Vip'), array('action' => 'delete', $vip['Vip']['id']), null, __('Are you sure you want to delete # %s?', $vip['Vip']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Vips'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Vip'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
