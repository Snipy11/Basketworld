<div class="youthInvestments view">
<h2><?php  echo __('Youth Investment');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($youthInvestment['YouthInvestment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Team'); ?></dt>
		<dd>
			<?php echo $this->Html->link($youthInvestment['Team']['name'], array('controller' => 'teams', 'action' => 'view', $youthInvestment['Team']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($youthInvestment['YouthInvestment']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($youthInvestment['YouthInvestment']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($youthInvestment['YouthInvestment']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Youth Investment'), array('action' => 'edit', $youthInvestment['YouthInvestment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Youth Investment'), array('action' => 'delete', $youthInvestment['YouthInvestment']['id']), null, __('Are you sure you want to delete # %s?', $youthInvestment['YouthInvestment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Youth Investments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Youth Investment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Teams'), array('controller' => 'teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Team'), array('controller' => 'teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
