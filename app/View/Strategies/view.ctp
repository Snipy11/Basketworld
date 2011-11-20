<div class="strategies view">
<h2><?php  echo __('Strategy');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($strategy['Strategy']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Team'); ?></dt>
		<dd>
			<?php echo $this->Html->link($strategy['Team']['name'], array('controller' => 'teams', 'action' => 'view', $strategy['Team']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Match'); ?></dt>
		<dd>
			<?php echo $this->Html->link($strategy['Match']['id'], array('controller' => 'matches', 'action' => 'view', $strategy['Match']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($strategy['Strategy']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Condition'); ?></dt>
		<dd>
			<?php echo h($strategy['Strategy']['condition']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Strategy'), array('action' => 'edit', $strategy['Strategy']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Strategy'), array('action' => 'delete', $strategy['Strategy']['id']), null, __('Are you sure you want to delete # %s?', $strategy['Strategy']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Strategies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Strategy'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Matches'), array('controller' => 'matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Match'), array('controller' => 'matches', 'action' => 'add')); ?> </li>
	</ul>
</div>
