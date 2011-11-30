<div class="actionDescriptions view">
<h2><?php  echo __('Action Description');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($actionDescription['ActionDescription']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Long Description'); ?></dt>
		<dd>
			<?php echo h($actionDescription['ActionDescription']['long_description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Action'); ?></dt>
		<dd>
			<?php echo $this->Html->link($actionDescription['Action']['id'], array('controller' => 'actions', 'action' => 'view', $actionDescription['Action']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Language'); ?></dt>
		<dd>
			<?php echo $this->Html->link($actionDescription['Language']['language'], array('controller' => 'languages', 'action' => 'view', $actionDescription['Language']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Action Description'), array('action' => 'edit', $actionDescription['ActionDescription']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Action Description'), array('action' => 'delete', $actionDescription['ActionDescription']['id']), null, __('Are you sure you want to delete # %s?', $actionDescription['ActionDescription']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Action Descriptions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Action Description'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Actions'), array('controller' => 'actions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Action'), array('controller' => 'actions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Languages'), array('controller' => 'languages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Language'), array('controller' => 'languages', 'action' => 'add')); ?> </li>
	</ul>
</div>
