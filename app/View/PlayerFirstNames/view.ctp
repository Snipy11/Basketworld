<div class="playerFirstNames view">
<h2><?php  echo __('Player First Name');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($playerFirstName['PlayerFirstName']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Name'); ?></dt>
		<dd>
			<?php echo h($playerFirstName['PlayerFirstName']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($playerFirstName['Country']['country'], array('controller' => 'countries', 'action' => 'view', $playerFirstName['Country']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Player First Name'), array('action' => 'edit', $playerFirstName['PlayerFirstName']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Player First Name'), array('action' => 'delete', $playerFirstName['PlayerFirstName']['id']), null, __('Are you sure you want to delete # %s?', $playerFirstName['PlayerFirstName']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Player First Names'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player First Name'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
