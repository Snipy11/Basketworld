<div class="pressReleases view">
<h2><?php  echo __('Press Release');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pressRelease['PressRelease']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Team'); ?></dt>
		<dd>
			<?php echo $this->Html->link($pressRelease['Team']['name'], array('controller' => 'teams', 'action' => 'view', $pressRelease['Team']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($pressRelease['PressRelease']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($pressRelease['PressRelease']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($pressRelease['PressRelease']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($pressRelease['PressRelease']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Press Release'), array('action' => 'edit', $pressRelease['PressRelease']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Press Release'), array('action' => 'delete', $pressRelease['PressRelease']['id']), null, __('Are you sure you want to delete # %s?', $pressRelease['PressRelease']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Press Releases'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Press Release'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
