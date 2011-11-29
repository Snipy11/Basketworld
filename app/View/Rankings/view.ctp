<div class="rankings view">
<h2><?php  echo __('Ranking');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ranking['Ranking']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Division'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ranking['Division']['name'], array('controller' => 'divisions', 'action' => 'view', $ranking['Division']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Team'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ranking['Team']['name'], array('controller' => 'teams', 'action' => 'view', $ranking['Team']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Points'); ?></dt>
		<dd>
			<?php echo h($ranking['Ranking']['points']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Played'); ?></dt>
		<dd>
			<?php echo h($ranking['Ranking']['played']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Victories'); ?></dt>
		<dd>
			<?php echo h($ranking['Ranking']['victories']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Defeats'); ?></dt>
		<dd>
			<?php echo h($ranking['Ranking']['defeats']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Points Scored'); ?></dt>
		<dd>
			<?php echo h($ranking['Ranking']['points_scored']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Points Against'); ?></dt>
		<dd>
			<?php echo h($ranking['Ranking']['points_against']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ranking'), array('action' => 'edit', $ranking['Ranking']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ranking'), array('action' => 'delete', $ranking['Ranking']['id']), null, __('Are you sure you want to delete # %s?', $ranking['Ranking']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rankings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ranking'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Divisions'), array('controller' => 'divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Division'), array('controller' => 'divisions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
