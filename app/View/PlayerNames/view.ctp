<div class="playerNames view">
<h2><?php  echo __('Player Name');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($playerName['PlayerName']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($playerName['PlayerName']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Country'); ?></dt>
		<dd>
			<?php echo $this->Html->link($playerName['Country']['country'], array('controller' => 'countries', 'action' => 'view', $playerName['Country']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Player Name'), array('action' => 'edit', $playerName['PlayerName']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Player Name'), array('action' => 'delete', $playerName['PlayerName']['id']), null, __('Are you sure you want to delete # %s?', $playerName['PlayerName']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Player Names'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player Name'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Countries'), array('controller' => 'countries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Country'), array('controller' => 'countries', 'action' => 'add')); ?> </li>
	</ul>
</div>
