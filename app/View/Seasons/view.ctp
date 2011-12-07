<div class="seasons view">
<h2><?php  echo __('Season');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($season['Season']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Year'); ?></dt>
		<dd>
			<?php echo h($season['Season']['year']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Start Date'); ?></dt>
		<dd>
			<?php echo h($season['Season']['start_date']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Activer'), array('action' => 'activate', $season['Season']['id']), null, __('Etes-vous sûr de vouloir activer cette saison ? Cette opération est irréversible.')); ?></li>
		<li><?php echo $this->Html->link(__('Edit Season'), array('action' => 'edit', $season['Season']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Season'), array('action' => 'delete', $season['Season']['id']), null, __('Are you sure you want to delete # %s?', $season['Season']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Seasons'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Season'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Divisions'), array('controller' => 'divisions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Division'), array('controller' => 'divisions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Divisions');?></h3>
	<?php if (!empty($season['Division'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Hierarchy'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Country Id'); ?></th>
		<th><?php echo __('Season Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($season['Division'] as $division): ?>
		<tr>
			<td><?php echo $division['id'];?></td>
			<td><?php echo $division['hierarchy'];?></td>
			<td><?php echo $division['name'];?></td>
			<td><?php echo $division['country_id'];?></td>
			<td><?php echo $division['season_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'divisions', 'action' => 'view', $division['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'divisions', 'action' => 'edit', $division['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'divisions', 'action' => 'delete', $division['id']), null, __('Are you sure you want to delete # %s?', $division['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Division'), array('controller' => 'divisions', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
