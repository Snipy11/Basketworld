<div class="actionsMatches view">
<h2><?php  echo __('Actions Match');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($actionsMatch['ActionsMatch']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Match'); ?></dt>
		<dd>
			<?php echo $this->Html->link($actionsMatch['Match']['id'], array('controller' => 'matches', 'action' => 'view', $actionsMatch['Match']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Player1'); ?></dt>
		<dd>
			<?php echo $this->Html->link($actionsMatch['Player1']['name'], array('controller' => 'players', 'action' => 'view', $actionsMatch['Player1']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Player2'); ?></dt>
		<dd>
			<?php echo $this->Html->link($actionsMatch['Player2']['name'], array('controller' => 'players', 'action' => 'view', $actionsMatch['Player2']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Action'); ?></dt>
		<dd>
			<?php echo $this->Html->link($actionsMatch['Action']['id'], array('controller' => 'actions', 'action' => 'view', $actionsMatch['Action']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Actions Match'), array('action' => 'edit', $actionsMatch['ActionsMatch']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Actions Match'), array('action' => 'delete', $actionsMatch['ActionsMatch']['id']), null, __('Are you sure you want to delete # %s?', $actionsMatch['ActionsMatch']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Actions Matches'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Actions Match'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Matches'), array('controller' => 'matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Match'), array('controller' => 'matches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Actions'), array('controller' => 'actions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Action'), array('controller' => 'actions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player1'), array('controller' => 'players', 'action' => 'add')); ?> </li>
	</ul>
</div>
