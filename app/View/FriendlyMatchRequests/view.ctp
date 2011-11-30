<div class="friendlyMatchRequests view">
<h2><?php  echo __('Friendly Match Request');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($friendlyMatchRequest['FriendlyMatchRequest']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Team From'); ?></dt>
		<dd>
			<?php echo $this->Html->link($friendlyMatchRequest['TeamFrom']['name'], array('controller' => 'teams', 'action' => 'view', $friendlyMatchRequest['TeamFrom']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Team To'); ?></dt>
		<dd>
			<?php echo $this->Html->link($friendlyMatchRequest['TeamTo']['name'], array('controller' => 'teams', 'action' => 'view', $friendlyMatchRequest['TeamTo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Confirm'); ?></dt>
		<dd>
			<?php echo h($friendlyMatchRequest['FriendlyMatchRequest']['confirm']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($friendlyMatchRequest['FriendlyMatchRequest']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Home'); ?></dt>
		<dd>
			<?php echo h($friendlyMatchRequest['FriendlyMatchRequest']['home']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Date Match'); ?></dt>
		<dd>
			<?php echo h($friendlyMatchRequest['FriendlyMatchRequest']['date_match']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Friendly Match Request'), array('action' => 'edit', $friendlyMatchRequest['FriendlyMatchRequest']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Friendly Match Request'), array('action' => 'delete', $friendlyMatchRequest['FriendlyMatchRequest']['id']), null, __('Are you sure you want to delete # %s?', $friendlyMatchRequest['FriendlyMatchRequest']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Friendly Match Requests'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Friendly Match Request'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team From'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
