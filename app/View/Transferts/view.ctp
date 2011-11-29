<div class="transferts view">
<h2><?php  echo __('Transfert');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transfert['Transfert']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Player'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transfert['Player']['name'], array('controller' => 'players', 'action' => 'view', $transfert['Player']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Acquire Team'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transfert['AcquireTeam']['name'], array('controller' => 'teams', 'action' => 'view', $transfert['AcquireTeam']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sell Team'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transfert['SellTeam']['name'], array('controller' => 'teams', 'action' => 'view', $transfert['SellTeam']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gm Watch'); ?></dt>
		<dd>
			<?php echo $this->Html->link($transfert['GmWatch']['name'], array('controller' => 'users', 'action' => 'view', $transfert['GmWatch']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($transfert['Transfert']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Finish Date'); ?></dt>
		<dd>
			<?php echo h($transfert['Transfert']['finish_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('First Price'); ?></dt>
		<dd>
			<?php echo h($transfert['Transfert']['first_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Current Price'); ?></dt>
		<dd>
			<?php echo h($transfert['Transfert']['current_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sold'); ?></dt>
		<dd>
			<?php echo h($transfert['Transfert']['sold']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transfert'), array('action' => 'edit', $transfert['Transfert']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transfert'), array('action' => 'delete', $transfert['Transfert']['id']), null, __('Are you sure you want to delete # %s?', $transfert['Transfert']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transferts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transfert'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Players'), array('controller' => 'players', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('controller' => 'players', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Acquire Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gm Watch'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
